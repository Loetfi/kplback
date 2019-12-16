<?php

namespace App\Http\Controllers;

use App\Http\Helpers\Api;
use App\Http\Helpers\RestCurl;
use App\Http\Helpers\Helper;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use DB;
// use Carbon\Carbon;

class CashSPController extends Controller
{ 
	function index(){
		$date = date('Y');
		$tanggal = date('d')-7;
		$tanggal = date('Y-m-'.$tanggal);
		// sumber pendapatan

		$tahun_shu = date('Y');
		$sumber = DB::select(DB::raw("SELECT * from apps_kolektif_data where tahun = $tahun_shu "));

		$pinjaman_by_nama = DB::select(DB::raw("SELECT 
			sum(plafon) as jumlahplafon,
			b.nama as namapinjaman,
			YEAR(a.tanggal) as tanggal,
			a.jenisid
			from pinjaman a 
			inner join pinjjenis b on a.jenisid = b.id
			left join jaminan c on a.jaminanid = c.id
			left join kantor d on a.kantorid = d.id
			where YEAR(a.tanggal) = '$tahun_shu'
			group by namapinjaman "));

		// dd($pinjaman_by_nama);

		// lunas dan belum 

		$alljenis = DB::select(DB::raw("SELECT id, nama from pinjjenis"));

		foreach ($alljenis as $aj) {

			$lunasbelum_by_jenis[] = DB::select(DB::raw("
				SELECT sum(lunas) as lunas , sum(belumlunas) as belumlunas 
				from (SELECT count(statuslunas) as lunas , '' as belumlunas from (
				SELECT  
				a.jangkawaktu,
				a.angsuranke,
				IF(a.jangkawaktu = a.angsuranke , 'Lunas' ,'Belum Lunas') as statuslunas,
				b.nama as namapinjaman,
				b.id
				from pinjaman a 
				inner join pinjjenis b on a.jenisid = b.id
				left join jaminan c on a.jaminanid = c.id
				left join kantor d on a.kantorid = d.id
				where YEAR(a.tanggal) = '2019'
				) tbl
				where statuslunas = 'Lunas'
				and id = '".$aj->id."'
				UNION ALL
				SELECT '' as lunas, count(statuslunas) as belumlunas from (
				SELECT  
				a.jangkawaktu,
				a.angsuranke,
				IF(a.jangkawaktu = a.angsuranke , 'Lunas' ,'Belum Lunas') as statuslunas,
				b.nama as namapinjaman,
				b.id
				from pinjaman a 
				inner join pinjjenis b on a.jenisid = b.id
				left join jaminan c on a.jaminanid = c.id
				left join kantor d on a.kantorid = d.id
				where YEAR(a.tanggal) = '2019'
				) tbl
				where statuslunas = 'Belum Lunas'
				and id = '".$aj->id."'
			) tblbaru "));
		}

		$data = array(
			'title' => 'Dashboard',
			'jasa_pinjam' => $sumber[0]->total_jasa_pinjaman,
			'jasa_sp' => $sumber[0]->total_simpanan_pokok,
			'pinjaman_by_nama' => $pinjaman_by_nama,
			'tahun_shu' => $tahun_shu,

			'alljenis'	=> $alljenis,
			'lunasbelum_by_jenis' => $lunasbelum_by_jenis
			// 'laba_toko_all'	=> $laba_toko_all[0]->labatoko,
			// 'penjualan_toko' => $penjualan_toko,
			// 'top_barang_laku' => $top_barang_laku
		);

		return view('dashboard_mobile/dash_cashflow_sp')->with($data);
	}

	// 
	public function detailPinjamanbyName($id_jenis)
	{

		$date = date('Y');
		$tanggal = date('d')-7;
		$tanggal = date('Y-m-'.$tanggal);
		// sumber pendapatan

		$tahun_shu = date('Y');
		$sumber = DB::select(DB::raw("SELECT * from apps_kolektif_data where tahun = $tahun_shu "));

		$name_jenis = DB::select(DB::raw("SELECT id, nama from pinjjenis where id = '$id_jenis' "));

		$pinjaman_by_nama = DB::select(DB::raw("SELECT
			b.nama as namapinjaman,
			a.*,
			f.nama
			from pinjaman a 
			inner join pinjjenis b on a.jenisid = b.id
			left join jaminan c on a.jaminanid = c.id
			left join kantor d on a.kantorid = d.id
			left join anggota f on a.anggotaid = f.id
			where YEAR(a.tanggal) = '$date'
			and a.jenisid = '$id_jenis' 
			order by a.jam desc
			"));

		// dd($pinjaman_by_nama);

		$data = array(
			'title' => 'Dashboard',
			'name_jenis' => $name_jenis ?? null,
			// 'jasa_sp' => $sumber[0]->total_simpanan_pokok,
			'pinjaman_by_nama' => $pinjaman_by_nama,
			'tahun_shu' => $tahun_shu
		);

		return view('dashboard_mobile/detail_pinjaman')->with($data);
	}

	public function detailByStatus($id_jenis , $lunas)
	{

		$date = date('Y');
		$tanggal = date('d')-7;
		$tanggal = date('Y-m-'.$tanggal);
		// sumber pendapatan

		$tahun_shu = date('Y');
		$sumber = DB::select(DB::raw("SELECT * from apps_kolektif_data where tahun = $tahun_shu "));

		$name_jenis = DB::select(DB::raw("SELECT id, nama from pinjjenis where id = '$id_jenis' "));

		$by_lunas = DB::select(DB::raw("SELECT  
			a.*,
			IF(a.jangkawaktu = a.angsuranke , 'Lunas' ,'Belum') as statuslunas,
			b.nama as namapinjaman,
			b.id,
			f.nama
			from pinjaman a 
			inner join pinjjenis b on a.jenisid = b.id
			left join jaminan c on a.jaminanid = c.id
			left join kantor d on a.kantorid = d.id
			inner join anggota f on a.anggotaid = f.id
			where YEAR(a.tanggal) = '$date'
			having statuslunas = '$lunas'
			and a.jenisid = '$id_jenis'
			"));


		$simpanan_pokok = DB::select(DB::raw("SELECT a.norekening, b.nama from tabungan a 
			inner join tabjenis b on a.jenisid = b.id limit 100 "));
		// where anggotaid = '".$request->anggotaid."'

		foreach ($simpanan_pokok as $simpanan) {
			// echo $simpanan->norekening;
			$cari_simpanan_tabungan = DB::select(DB::raw("SELECT saldo from accjurnal a 
			left join accjurnaldetail b on a.id = b.id
			left join tabtransaksi c on a.id = c.jurnalid
			where a.keterangan like '%".$simpanan->norekening."%' order by a.tanggal desc 
			limit 1  "));

					$ddd['simpanan'] = [
						'simpanan' => $simpanan->nama , 
						'saldo' => !empty($cari_simpanan_tabungan[0]->saldo) ? number_format($cari_simpanan_tabungan[0]->saldo) : 0,
						'saldo_real' => !empty($cari_simpanan_tabungan[0]->saldo) ? $cari_simpanan_tabungan[0]->saldo : 0,
					];
					$simpananasli[] = $ddd['simpanan'];
		}

		// $data['simpanan'] = $simpananasli;

		// dd($simpananasli)

		$data = array(
			'title' => 'Dashboard',
			'name_jenis' => $name_jenis ?? null,
			'by_lunas' => $by_lunas,
			'tahun_shu' => $tahun_shu,
			'status' => strtoupper($lunas)
		);

		return view('dashboard_mobile/status_pinjaman')->with($data);

		
	}





}
