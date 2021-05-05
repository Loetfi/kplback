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

class AnggotaController extends Controller
{ 
	function index(){
		$anggota_p = DB::select(DB::raw("SELECT count(id) as total from anggota where noanggota like '%P.%'"));

		$anggota_p2 = DB::select(DB::raw("SELECT count(id) as total from anggota where noanggota like '%P2.%'"));

		$anggota_aktif = DB::select(DB::raw("SELECT count(id) as total from anggota where ( noanggota not like '%P.%' and noanggota not like '%P2.%' and noanggota not like '%ALB.%'  )"));

		$anggota_luar_biasa = DB::select(DB::raw("SELECT count(id) as total from anggota where noanggota like '%ALB.%' "));

		$data = array(
			'title' => 'Dashboard Anggota',
			'anggota_p' => $anggota_p[0]->total,
			'anggota_p2' => $anggota_p2[0]->total,
			'anggota_aktif' => $anggota_aktif[0]->total,
			'anggota_luar_biasa'	=> $anggota_luar_biasa[0]->total
		);

		return view('dashboard_mobile/dash_anggota')->with($data);
	}

	function list($tipe = null){
		$date = date('Y');

		if ($tipe == 'aktif') {
			$anggota = DB::select(DB::raw("SELECT * from anggota where ( noanggota not like '%P.%' and noanggota not like '%P2.%' and  noanggota not like '%ALB.%')"));
		} elseif($tipe == 'pasif'){
			$anggota = DB::select(DB::raw("SELECT * from anggota where noanggota like '%P.%'"));
		} elseif($tipe == 'pegawai'){
			$anggota = DB::select(DB::raw("SELECT * from anggota where noanggota like '%P2.%'"));
		} elseif($tipe == 'luarbiasa'){
			$anggota = DB::select(DB::raw("SELECT * from anggota where noanggota like '%ALB.%' "));
		} else {
			$anggota = [];
		}

		$data = array(
			'title' => 'Dashboard',
			'anggota' => $anggota
		);

		return view('dashboard_mobile/anggota')->with($data);
	}

	function detail($noanggota = null){

		$data['anggota'] = DB::table('anggota')->where('id',$noanggota)->get()->first();
		$data['anggotaid'] = $noanggota ?? 0;

		$date_jasa = date('Y')-1;
		$date_jasa_dua = date('Y')-2;
		$date = date('Y');
		$simpananasli = [];
		$tahun_shu = 2020;
		$sumber = DB::select(DB::raw("SELECT * from apps_kolektif_data where tahun = $tahun_shu "));

		// angka static dari jasa 25 % seharusnya 
		// N3
		$angka_hasil_pertahun = $sumber[0]->shu_toko_sp;
		// 76763170 
		$jumlah_jasa_pinjaman_all = DB::select(DB::raw("SELECT * from apps_kolektif_data"));

		$final_jumlah_jasa_pinjaman_all = $jumlah_jasa_pinjaman_all[0]->total_jasa_pinjaman;

		// jasa perorangannya :
		$cari_jasa_pinjaman = DB::select(DB::raw("SELECT a.plafon, f.jasa
				from pinjaman a 
			inner join pinjjenis b on a.jenisid = b.id
			inner join apps_jasa_pinjaman f on b.kode = f.kode
			where anggotaid = '".$noanggota."'  and  year(a.tanggal) in ( $date_jasa, $date_jasa_dua )
			limit 1 "));

		$res_jasa = ( ( @$cari_jasa_pinjaman[0]->jasa * @$cari_jasa_pinjaman[0]->plafon ) / 100 ) * 12 ;
		// angka O4
		$hasil_angka_hasil_pertahun_shu_sp = ( $angka_hasil_pertahun * 70 ) / 100;

		
		$presentase_hasil_angka_hasil_pertahun_shu_sp  = round(( $hasil_angka_hasil_pertahun_shu_sp / $final_jumlah_jasa_pinjaman_all ) * 100 );
		$final_shu_orang = ceil(( $presentase_hasil_angka_hasil_pertahun_shu_sp * $res_jasa  ) / 100) ;

		$data['final_shu_orang'] = !empty($final_shu_orang) ? $final_shu_orang : 0;

		$data['penjualan'] = DB::table('penjualan')->where('pelangganid',$noanggota)
		->orderBy('tanggal','desc')
		->get();

		$data['pinjaman'] = DB::select(DB::raw("SELECT d.nama as namakantor, b.nama as namapinjaman, c.nama as namajaminan,   a.* from pinjaman a 
			inner join pinjjenis b on a.jenisid = b.id
			left join jaminan c on a.jaminanid = c.id
			left join kantor d on a.kantorid = d.id
			where anggotaid = '".$noanggota."'"));
 


		// mencari presentase untuk laba toko  
		$laba_toko_pertahun_semua_anggota = DB::select(DB::raw("SELECT sum(hargajual - hargastok) as labatoko from penjualan a 
			inner join penjualandetail b on a.id = b.id
			left join barang c on c.id  = b.barangid
			where  year(tanggal) = '$date' 
			and a.pelangganid not in (SELECT id as total from anggota where (noanggota not like '%P2.%' )) "));
		// echo $laba_toko_pertahun_semua_anggota;
		// dd($laba_toko_pertahun_semua_anggota);
		$result_laba_toko_pertahun_semua_anggota = $laba_toko_pertahun_semua_anggota[0]->labatoko;


		$d['laba_toko_per_orang'] = DB::select(DB::raw("SELECT sum(hargajual - hargastok) as labatoko from penjualan a 
			inner join penjualandetail b on a.id = b.id
			left join barang c on c.id  = b.barangid
			where pelangganid = '".$noanggota."' and year(a.tanggal) = '".$date."'
			group by year(a.tanggal) = '".$date."' 
			"));

		// dd($angka_hasil_pertahun);
		// presentase laba toko 25% dari total laba toko, sp, cad
		$presentase_laba_toko = ( $angka_hasil_pertahun * 25 / 100);
		// ($angka_hasil_pertahun * (30 / 100) ); // = N4

		// dd($presentase_laba_toko);

		// prsentase laba toko 30%
		// n5
		if ($presentase_laba_toko < $result_laba_toko_pertahun_semua_anggota  ) {
			// $presentase_laba_toko = 0; 
			$hasil = ($presentase_laba_toko / $result_laba_toko_pertahun_semua_anggota ) * 100;
		} else {
			$hasil = ($result_laba_toko_pertahun_semua_anggota / $presentase_laba_toko) * 100;
		}
		// $hasil = ($result_laba_toko_pertahun_semua_anggota / $presentase_laba_toko ) * 100;

		$hasil_presentase_laba_toko = round($hasil,2);

		// dd($hasil_presentase_laba_toko);



		// laba toko dari anggota ini 
		$data['laba_toko_per_orang'] = @$d['laba_toko_per_orang'][0]->labatoko;
		// dd($data['laba_toko_per_orang']);
		// nilai shu perorang
		$data['final_laba_toko_per_orang'] = number_format(ceil(($hasil_presentase_laba_toko * $data['laba_toko_per_orang'] ) / 100));
 
		// simpanan
		$simpanan_pokok = DB::select(DB::raw("SELECT a.norekening, b.nama from tabungan a 
			inner join tabjenis b on a.jenisid = b.id
			where anggotaid = '".$noanggota."'" ));

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

		$total_modal_usaha = @$data['simpanan'][1]['saldo_real']+@$data['simpanan'][0]['saldo_real']; // h37
		// dd($data['simpanan']);

 
		$total = $jumlah_jasa_pinjaman_all[0]->total_simpanan_pokok; 

		// shu modal

		// presentase shu modal
		// 61410536
		$presentase_shu_modal = ($sumber[0]->shu_modal / $total) * 100; // angka yang perlu ditanyakan;
		$hasil_presentase_shu_modal = round($presentase_shu_modal,2);
		// dd($hasil_presentase_shu_modal);

		$data['final_hasil_presentase_shu_modal'] = number_format(ceil(($hasil_presentase_shu_modal * $total_modal_usaha ) / 100)); 

		$pengurus_pengawas = array(
			'20190101-151754195',
			'20190101-151753154',
			'20190101-151757276',
			'20190101-151757272',
			'20190101-151755229',
			'20190101-151752141',
			'20190101-151752136'
		);

		$anggotaid = $data['anggotaid'] ?? 0;
		if (in_array($anggotaid, $pengurus_pengawas)) {
			$data['pengurus'] = true;
			$data['button_back'] = true;
		} else {
			$data['pengurus'] = false;
			$data['button_back'] = false;
		}


		// get SHU 2018 
		$shu_2018 = DB::select(DB::raw("SELECT  b.* from anggota a 
			inner join apps_shu_summary_temporary b on a.noanggota=b.noanggota
			where id = '".$data['anggotaid']."' and shu_year = '2018' " ));

		$data['shu_2018'] = $shu_2018[0] ?? array();


		$shu_2019 = DB::select(DB::raw("SELECT  b.* from anggota a 
			inner join apps_shu_summary_temporary b on a.noanggota=b.noanggota
			where id = '".$data['anggotaid']."' and shu_year = '2019' " ));

		$data['shu_2019'] = $shu_2019[0] ?? array();


		$shu_2020 = DB::select(DB::raw("SELECT  b.* from anggota a 
			inner join apps_shu_summary_temporary b on a.noanggota=b.noanggota
			where id = '".$data['anggotaid']."' and shu_year = '2020' " ));

		$data['shu_2020'] = $shu_2020[0] ?? array();
 
		return view('pengurus_dashboard',with($data));
	}
}
