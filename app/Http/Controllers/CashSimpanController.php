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

class CashSimpanController extends Controller
{

	public function index()
	{

		$date = date('Y');
		$tanggal = date('d')-7;
		$tanggal = date('Y-m-'.$tanggal);
		// sumber pendapatan

		$tahun_shu = date('Y');
		// $sumber = DB::select(DB::raw("SELECT * from apps_kolektif_data where tahun = $tahun_shu "));

		// $name_jenis = DB::select(DB::raw("SELECT id, nama from pinjjenis where id = '$id_jenis' "));

		// $by_lunas = DB::select(DB::raw("SELECT  
		// 	a.*,
		// 	IF(a.jangkawaktu = a.angsuranke , 'Lunas' ,'Belum') as statuslunas,
		// 	b.nama as namapinjaman,
		// 	b.id,
		// 	f.nama
		// 	from pinjaman a 
		// 	inner join pinjjenis b on a.jenisid = b.id
		// 	left join jaminan c on a.jaminanid = c.id
		// 	left join kantor d on a.kantorid = d.id
		// 	inner join anggota f on a.anggotaid = f.id
		// 	where YEAR(a.tanggal) = '$date'
		// 	having statuslunas = '$lunas'
		// 	and a.jenisid = '$id_jenis'
		// 	"));


		

		

		// TB20171227-141955

		$data = array(
			'title' => 'Dashboard',
			'total_simpanan_wajib' => 2621840600,
			'total_simpanan_pokok' => 21235000,
			'total_simpanan_sukarela' => 248266500
			// 'name_jenis' => $name_jenis ?? null,
			// 'by_lunas' => $by_lunas,
			// 'tahun_shu' => $tahun_shu,
			// 'status' => strtoupper($lunas)
		);

		dd($data);
		// return view('dashboard_mobile/status_pinjaman')->with($data);

		
	}

	public function JobsParsingSimpananSukarela()
	{
		$simpanan_sukarela = DB::select(DB::raw("SELECT a.norekening, b.nama from tabungan a 
			inner join tabjenis b on a.jenisid = b.id 
			where a.jenisid = 'TB20171227-141955' "));
		$total_simpanan_sukarela = 0;
		foreach ($simpanan_sukarela as $simpanan) {
			$cari_simpanan_tabungan = DB::select(DB::raw("SELECT saldo from accjurnal a 
				left join accjurnaldetail b on a.id = b.id
				left join tabtransaksi c on a.id = c.jurnalid
				where a.keterangan like '%".$simpanan->norekening."%' order by a.tanggal desc 
				limit 1  "));
			$saldo = !empty($cari_simpanan_tabungan[0]->saldo) ? $cari_simpanan_tabungan[0]->saldo : 0;
			$total_simpanan_sukarela +=$saldo;
		}
	}


	public function JobsParsingSimpananPokok()
	{
		$simpanan_pokok = DB::select(DB::raw("SELECT a.norekening, b.nama from tabungan a 
			inner join tabjenis b on a.jenisid = b.id 
			where a.jenisid = 'TB20171116-164815' "));
		$total_simpanan_pokok = 0;
		foreach ($simpanan_pokok as $simpanan) {
			$cari_simpanan_tabungan = DB::select(DB::raw("SELECT saldo from accjurnal a 
				left join accjurnaldetail b on a.id = b.id
				left join tabtransaksi c on a.id = c.jurnalid
				where a.keterangan like '%".$simpanan->norekening."%' order by a.tanggal desc 
				limit 1  "));
			$saldo = !empty($cari_simpanan_tabungan[0]->saldo) ? $cari_simpanan_tabungan[0]->saldo : 0;
			$total_simpanan_pokok +=$saldo;
		}
	}

	public function JobsParsingSimpananWajib()
	{
		$simpanan_wajib = DB::select(DB::raw("SELECT a.norekening, b.nama from tabungan a 
			inner join tabjenis b on a.jenisid = b.id 
			where a.jenisid = 'TB20171222-170253' "));
		$total_simpanan_wajib = 0;
		foreach ($simpanan_wajib as $simpanan) {
			$cari_simpanan_tabungan = DB::select(DB::raw("SELECT saldo from accjurnal a 
				left join accjurnaldetail b on a.id = b.id
				left join tabtransaksi c on a.id = c.jurnalid
				where a.keterangan like '%".$simpanan->norekening."%' order by a.tanggal desc 
				limit 1  "));
			$saldo = !empty($cari_simpanan_tabungan[0]->saldo) ? $cari_simpanan_tabungan[0]->saldo : 0;
			$total_simpanan_wajib +=$saldo;
		}
	}





}
