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
		$date_jasa = date('Y')-1;
		$date_jasa_dua = date('Y')-2;
		$date = date('Y');

		// angka static dari jasa 25 % seharusnya 
		// N3
		$angka_hasil_pertahun = 76763170;

		


		// jasa pinjaman all anggota
		/*$cari_jasa_pinjaman_all = DB::select(DB::raw("SELECT anggotaid from pinjaman a
		inner join pinjjenis b on a.jenisid = b.id
		inner join apps_jasa_pinjaman f on b.kode = f.kode
		where year(tanggal) = $date_jasa ")); 

		$jumlah_jasa_pinjaman_all = 0;
		foreach ($cari_jasa_pinjaman_all as $jasa_all) {
			$cari_jasa_pinjaman_all_dua = DB::select(DB::raw("SELECT a.anggotaid, a.tanggal, a.jangkawaktu, a.angsuranke, a.plafon, f.jasa
				from pinjaman a 
			inner join pinjjenis b on a.jenisid = b.id
			inner join apps_jasa_pinjaman f on b.kode = f.kode
			where anggotaid = '".$jasa_all->anggotaid."' 
			limit 1 "));

			$res_all = ( ( $cari_jasa_pinjaman_all_dua[0]->jasa * $cari_jasa_pinjaman_all_dua[0]->plafon ) / 100 ) * 12 ;

			$jumlah_jasa_pinjaman_all += $res_all;
		}*/

		// dd($jumlah_jasa_pinjaman_all);
		// end



		$jumlah_jasa_pinjaman_all = DB::select(DB::raw("SELECT * from apps_kolektif_data"));

		$final_jumlah_jasa_pinjaman_all = $jumlah_jasa_pinjaman_all[0]->total_jasa_pinjaman;

		// jasa perorangannya :
		$cari_jasa_pinjaman = DB::select(DB::raw("SELECT a.plafon, f.jasa
				from pinjaman a 
			inner join pinjjenis b on a.jenisid = b.id
			inner join apps_jasa_pinjaman f on b.kode = f.kode
			where anggotaid = '".$request->anggotaid."'  and  year(a.tanggal) in ( $date_jasa, $date_jasa_dua )
			limit 1 "));
		// dd($cari_jasa_pinjaman);

		$res_jasa = ( ( @$cari_jasa_pinjaman[0]->jasa * @$cari_jasa_pinjaman[0]->plafon ) / 100 ) * 12 ;
		

		// angka O4
		$hasil_angka_hasil_pertahun_shu_sp = ( $angka_hasil_pertahun * 70 ) / 100;
		$presentase_hasil_angka_hasil_pertahun_shu_sp  = round(( $hasil_angka_hasil_pertahun_shu_sp / $final_jumlah_jasa_pinjaman_all ) * 100 );
		$final_shu_orang = ceil(( $presentase_hasil_angka_hasil_pertahun_shu_sp * $res_jasa  ) / 100) ;

		$data['final_shu_orang'] = !empty($final_shu_orang) ? $final_shu_orang : 0;
		// dd([$final_jumlah_jasa_pinjaman_all, $res_jasa, @$presentase_hasil_angka_hasil_pertahun_shu_sp, $final_shu_orang]);
		// die;
		

		


		




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
		$presentase_laba_toko = ceil($angka_hasil_pertahun * (30 / 100) ); // = N4

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
		$data['laba_toko_per_orang'] = @$d['laba_toko_per_orang'][0]->labatoko;
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

					$ddd['simpanan'] = [
						'simpanan' => $simpanan->nama , 
						'saldo' => !empty($cari_simpanan_tabungan[0]->saldo) ? number_format($cari_simpanan_tabungan[0]->saldo) : 0,
						'saldo_real' => !empty($cari_simpanan_tabungan[0]->saldo) ? $cari_simpanan_tabungan[0]->saldo : 0,
					];
					$simpananasli[] = $ddd['simpanan'];
		}

		$data['simpanan'] = $simpananasli;

		$total_modal_usaha = $data['simpanan'][1]['saldo_real']+$data['simpanan'][0]['saldo_real']; // h37
		// dd($data['simpanan']);



/*
		$simpanan_pokok_all = DB::select(DB::raw("SELECT a.norekening, b.nama, c.nama as namaanggota from tabungan a 
			inner join tabjenis b on a.jenisid = b.id
			inner join anggota c on a.anggotaid = c.id
			where 
			jenis in (1,2)")); 
		$total = 0;
		// echo "<table border='1'>";
		foreach ($simpanan_pokok_all as $simpanan_all) {
			// echo $simpanan->norekening;
			$cari_simpanan_tabungan_all = DB::select(DB::raw("
				SELECT saldo from accjurnal a 
			inner join accjurnaldetail b on a.id = b.id
			inner join tabtransaksi c on a.id = c.jurnalid
			where a.keterangan like '%".$simpanan_all->norekening."%'
			group by a.id, saldo
			order by a.tanggal desc 
			limit 1 ")); 
			if(!empty($cari_simpanan_tabungan_all[0])){
				$total += $cari_simpanan_tabungan_all[0]->saldo;		
			}
		
		}
		// echo "</table>";
		*/
		$total = $jumlah_jasa_pinjaman_all[0]->total_simpanan_pokok; 

		// shu modal

		// presentase shu modal
		$presentase_shu_modal = (61410536 / $total) * 100; // angka yang perlu ditanyakan;
		$hasil_presentase_shu_modal = round($presentase_shu_modal,2);

		$data['final_hasil_presentase_shu_modal'] = number_format(ceil(($hasil_presentase_shu_modal * $total_modal_usaha ) / 100));







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
