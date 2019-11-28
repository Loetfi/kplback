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

class CashTokoController extends Controller
{ 
	function index(){
		$date = date('Y');
		$tanggal = date('d')-7;
		$tanggal = date('Y-m-'.$tanggal);
		// sumber pendapatan

		$tahun_shu = 2018;
		$sumber = DB::select(DB::raw("SELECT * from apps_kolektif_data where tahun = $tahun_shu "));

		$laba_toko = DB::select(DB::raw("SELECT sum(hargajual - hargastok) as labatoko from penjualan a 
			inner join penjualandetail b on a.id = b.id
			left join barang c on c.id  = b.barangid
			where  year(tanggal) = '$date' 
			and a.pelangganid not in (SELECT id as total from anggota where (noanggota not like 'P2.%' )) "));

		$laba_toko_all = DB::select(DB::raw("SELECT sum(hargajual - hargastok) as labatoko from penjualan a 
			inner join penjualandetail b on a.id = b.id
			left join barang c on c.id  = b.barangid
			where  year(tanggal) = '$date'"));
		// dd($sumber);

		// grafik cashflow toko 
		$penjualan_toko = DB::select(DB::raw("SELECT tanggal, sum(bayar-kembalian) as belanja from penjualan where tanggal >= '$tanggal' group by tanggal"));
		// dd($penjualan_toko);

		$top_barang_laku = DB::select(DB::raw("SELECT * from (SELECT sum(a.kuantitas) as banyak , barangid from penjualandetail a join barang b on a.barangid = b.id group by barangid) tbl order by banyak desc limit 10"));
		
		// dd($top_barang_laku);

		$data = array(
			'title' => 'Dashboard',
			'jasa_pinjam' => $sumber[0]->total_jasa_pinjaman,
			'jasa_sp' => $sumber[0]->total_simpanan_pokok,
			'laba_toko' => $laba_toko[0]->labatoko,
			'laba_toko_all'	=> $laba_toko_all[0]->labatoko,
			'penjualan_toko' => $penjualan_toko,
			'top_barang_laku' => $top_barang_laku
		);
 
		return view('dashboard_mobile/dash_cashflow_toko')->with($data);
	}
}
