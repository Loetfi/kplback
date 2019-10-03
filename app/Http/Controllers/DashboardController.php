<?php

namespace App\Http\Controllers;

use App\Http\Helpers\Api;
use App\Http\Helpers\RestCurl;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use DB;
// use Carbon\Carbon;

class DashboardController extends Controller
{ 
	function web(){
		$data = array('title' => 'Dashboard');
		return view('dashboard')->with($data);
	}
	public function index(Request $request){

		$data['penjualan'] = DB::table('penjualan')->where('pelangganid',$request->anggotaid)
		->orderBy('tanggal','desc')
		->get(); 
		// where pelangganid = '20190101-151754195'");
		// dd($data);
		

		$data['anggota'] = DB::table('anggota')->where('id',$request->anggotaid)->get()->first(); 

		$data['pinjaman'] = DB::select(DB::raw("SELECT d.nama as namakantor, b.nama as namapinjaman, c.nama as namajaminan,   a.* from pinjaman a 
			inner join pinjjenis b on a.jenisid = b.id
			left join jaminan c on a.jaminanid = c.id
			left join kantor d on a.kantorid = d.id
			where anggotaid = '".$request->anggotaid."'"));

		// shu laba toko 
		$date = date('Y');
		// $d['laba_toko_per_orang'] = DB::select(DB::raw("SELECT sum(bayar), sum(kembalian) , sum(bayar-kembalian) as labatoko from penjualan
		// 	where pelangganid = '".$request->anggotaid."'
		// 	group by year(tanggal) = '$date' "));

		$d['laba_toko_per_orang'] = DB::select(DB::raw("SELECT sum(hargajual - hargastok) as labatoko from penjualan a 
			inner join penjualandetail b on a.id = b.id
			left join barang c on c.id  = b.barangid
			where pelangganid = '".$request->anggotaid."' and year(a.tanggal) = '".$date."'
			group by year(a.tanggal) = '".$date."' 
			"));

		// presentase laba toko 25% dari total laba toko, sp, cad
		$presentase_laba_toko = ceil(76763170 * (30 / 100) ); // = N4

		// mencari presentase untuk laba toko 
		$laba_toko_pertahun_semua_anggota = DB::select(DB::raw("SELECT sum(hargajual - hargastok) as labatoko from penjualan a 
			inner join penjualandetail b on a.id = b.id
			left join barang c on c.id  = b.barangid
			where  year(tanggal) = '$date' "));
		// echo $laba_toko_pertahun_semua_anggota;
		// dd($laba_toko_pertahun_semua_anggota);
		$result_laba_toko_pertahun_semua_anggota = $laba_toko_pertahun_semua_anggota[0]->labatoko;

		// prsentase laba toko 30%
		$hasil = ($result_laba_toko_pertahun_semua_anggota / $presentase_laba_toko ) * 100;

		$hasil_presentase_laba_toko = round($hasil,2);

		// laba toko dari anggota ini 
		$data['laba_toko_per_orang'] = $d['laba_toko_per_orang'][0]->labatoko;
		// nilai shu perorang
		$data['final_laba_toko_per_orang'] = number_format(ceil(($hasil_presentase_laba_toko * $data['laba_toko_per_orang'] ) / 100));

		// echo 'presentase' . $hasil_presentase_laba_toko;
		// echo '    laba ' . $data['laba_toko_per_orang'];
		// die;


		// simpanan
		$simpanan_pokok = DB::select(DB::raw("SELECT a.norekening, b.nama from tabungan a 
			inner join tabjenis b on a.jenisid = b.id
			where anggotaid = '".$request->anggotaid."'" ));

		foreach ($simpanan_pokok as $simpanan) {
					// echo $simpanan->norekening;
					$cari_simpanan_tabungan = DB::select(DB::raw("SELECT saldo from accjurnal a 
			left join accjurnaldetail b on a.id = b.id
			left join tabtransaksi c on a.id = c.jurnalid
			where a.keterangan like '%".$simpanan->norekening."%' order by a.tanggal desc 
			limit 1  "));

					$ddd['simpanan'] = ['simpanan' => $simpanan->nama , 'saldo' => number_format($cari_simpanan_tabungan[0]->saldo)];
					$simpananasli[] = $ddd['simpanan'];
		}

		$data['simpanan'] = $simpananasli;






		// jika pengurus lebih banyak lagi informasinya
		if($data['anggota']->pengurus == 1){
			// echo " Pengurus ";
		}


		// $results = DB::select( DB::raw("SELECT * FROM some_table WHERE some_col = '$someVariable'") );
		// $value = session('user') ? session('user') : [];

		// if (sizeof($value)>0) {
		// 	return redirect('dashboard');
		// } else {
		return view('pengurus_dashboard',with($data));
		// }
	}
}
