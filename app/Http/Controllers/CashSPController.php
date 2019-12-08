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
			YEAR(a.tanggal) as tanggal
			from pinjaman a 
						inner join pinjjenis b on a.jenisid = b.id
						left join jaminan c on a.jaminanid = c.id
						left join kantor d on a.kantorid = d.id
						where YEAR(a.tanggal) = '$tahun_shu'
			group by namapinjaman "));

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

		// dd($lunasbelum_by_jenis);
		// dd($alljenis);

		// dd($pinjaman_by_nama);

		// $laba_toko_all = DB::select(DB::raw("SELECT sum(hargajual - hargastok) as labatoko from penjualan a 
		// 	inner join penjualandetail b on a.id = b.id
		// 	left join barang c on c.id  = b.barangid
		// 	where  year(tanggal) = '$date'"));
		// // dd($sumber);

		// // grafik cashflow toko 
		// $penjualan_toko = DB::select(DB::raw("SELECT tanggal, sum(bayar-kembalian) as belanja from penjualan where tanggal >= '$tanggal' group by tanggal"));
		// // dd($penjualan_toko);

		// $top_barang_laku = DB::select(DB::raw("SELECT * from (SELECT sum(a.kuantitas) as banyak , barangid from penjualandetail a join barang b on a.barangid = b.id group by barangid) tbl order by banyak desc limit 10"));
		
		// dd($top_barang_laku);

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
}
