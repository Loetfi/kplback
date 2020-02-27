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

class DashboardController extends Controller
{ 
	function web(){
		$date = date('Y');
		$tanggal = date('d')-7;
		$tanggal = date('Y-m-'.$tanggal);


		$anggota_p = DB::select(DB::raw("SELECT count(id) as total from anggota where noanggota like '%P.%'"));

		$anggota_p2 = DB::select(DB::raw("SELECT count(id) as total from anggota where noanggota like '%P2.%'"));

		$anggota_aktif = DB::select(DB::raw("SELECT count(id) as total from anggota where ( noanggota not like '%P.%' and noanggota not like '%P2.%' and noanggota not like '%ALB.%' )"));
		$anggota_luar_biasa = DB::select(DB::raw("SELECT count(id) as total from anggota where noanggota like '%ALB.%' "));

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

		$penjualan_toko = DB::select(DB::raw("SELECT tanggal, sum(bayar-kembalian) as belanja from penjualan where tanggal >= '$tanggal' group by tanggal"));

		$data = array(
			'title' => 'Dashboard',
			'anggota_p' => $anggota_p[0]->total,
			'anggota_p2' => $anggota_p2[0]->total,
			'anggota_aktif' => $anggota_aktif[0]->total,
			'anggota_luar_biasa'	=> $anggota_luar_biasa[0]->total,
			'jasa_pinjam' => $sumber[0]->total_jasa_pinjaman,
			'jasa_sp' => $sumber[0]->total_simpanan_pokok,
			'laba_toko' => $laba_toko[0]->labatoko,
			'laba_toko_all'	=> $laba_toko_all[0]->labatoko,
			'penjualan_toko' => $penjualan_toko
		);

		return view('dashboard')->with($data);
	}

	function mobile(){
		$date = date('Y');
		$tanggal = date('d')-7;
		$tanggal = date('Y-m-'.$tanggal);

		$anggota_p = DB::select(DB::raw("SELECT count(id) as total from anggota where noanggota like '%P.%'"));

		$anggota_p2 = DB::select(DB::raw("SELECT count(id) as total from anggota where noanggota like '%P2.%'"));

		$anggota_aktif = DB::select(DB::raw("SELECT count(id) as total from anggota where ( noanggota not like '%P.%' and noanggota not like '%P2.%' and noanggota not like '%ALB.%'  )"));

		$anggota_luar_biasa = DB::select(DB::raw("SELECT count(id) as total from anggota where noanggota like '%ALB.%' "));

		// sumber pendapatan

		$tahun_shu = date('Y');
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

		$penjualan_toko = DB::select(DB::raw("SELECT tanggal, sum(bayar-kembalian) as belanja from penjualan where tanggal >= '$tanggal' group by tanggal"));

		$data = array(
			'title' => 'Dashboard',
			'anggota_p' => $anggota_p[0]->total,
			'anggota_p2' => $anggota_p2[0]->total,
			'anggota_aktif' => $anggota_aktif[0]->total,
			'anggota_luar_biasa'	=> $anggota_luar_biasa[0]->total,
			'jasa_pinjam' => $sumber[0]->total_jasa_pinjaman,
			'jasa_sp' => $sumber[0]->total_simpanan_pokok,
			'laba_toko' => $laba_toko[0]->labatoko,
			'laba_toko_all'	=> $laba_toko_all[0]->labatoko,
			'penjualan_toko' => $penjualan_toko
		);

		return view('dashboard_mobile')->with($data);
	}


	public function index(Request $request){
		
		$date_jasa = date('Y')-1;
		$date_jasa_dua = date('Y')-2;
		$date = date('Y');
		$simpananasli = [];
		$tahun_shu = 2019;
		$sumber = DB::select(DB::raw("SELECT * from apps_kolektif_data where tahun = $tahun_shu "));
		// angka static dari jasa 25 % seharusnya 
		// N3
		$angka_hasil_pertahun = $sumber[0]->shu_toko_sp;
		$data['anggota'] = DB::table('anggota')->where('id',$request->anggotaid)->get()->first(); 
		if ($data['anggota']->pengurus == 1) {
			$data['full_access'] = true;
		} else {
			$data['full_access'] = false;
		}
		// 76763170

		


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
		

		


		



		$data['anggotaid'] = $request->anggotaid;

		$data['penjualan'] = DB::table('penjualan')->where('pelangganid',$request->anggotaid)
		->orderBy('tanggal','desc')
		->get(); 
		// where pelangganid = '20190101-151754195'");
		// dd($data);
		

		

		$data['pinjaman'] = DB::select(DB::raw("SELECT d.nama as namakantor, b.nama as namapinjaman, c.nama as namajaminan,   a.* from pinjaman a 
			inner join pinjjenis b on a.jenisid = b.id
			left join jaminan c on a.jaminanid = c.id
			left join kantor d on a.kantorid = d.id
			where anggotaid = '".$request->anggotaid."'"));

		// shu laba toko 
		
		// $d['laba_toko_per_orang'] = DB::select(DB::raw("SELECT sum(bayar), sum(kembalian) , sum(bayar-kembalian) as labatoko from penjualan
		// 	where pelangganid = '".$request->anggotaid."'
		// 	group by year(tanggal) = '$date' "));



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
			where pelangganid = '".$request->anggotaid."' and year(a.tanggal) = '".$date."'
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



		// laba toko dari anggota ini 
		$data['laba_toko_per_orang'] = @$d['laba_toko_per_orang'][0]->labatoko;
		// dd($data['laba_toko_per_orang']);
		// nilai shu perorang
		$data['final_laba_toko_per_orang'] = number_format(ceil(($hasil_presentase_laba_toko * $data['laba_toko_per_orang'] ) / 100));


		// number_format(ceil(($hasil_presentase_shu_modal * $total_modal_usaha ) / 100));

		// dd([
		// 	'presentase_laba_toko N4' => $presentase_laba_toko, 
		// 	'hasil N5' => $hasil, 
		// 	'final_laba_toko_per_orang' => $data['final_laba_toko_per_orang'] , 
		// 	'result_laba_toko_pertahun_semua_anggota' => $result_laba_toko_pertahun_semua_anggota
		// 	// 'hasil_presentase_laba_toko' => $hasil_presentase_laba_toko
		// ]);

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

		$total_modal_usaha = @$data['simpanan'][1]['saldo_real']+@$data['simpanan'][0]['saldo_real']; // h37
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
		// 61410536
		$presentase_shu_modal = ($sumber[0]->shu_modal / $total) * 100; // angka yang perlu ditanyakan;
		$hasil_presentase_shu_modal = round($presentase_shu_modal,2);
		// dd($hasil_presentase_shu_modal);

		$data['final_hasil_presentase_shu_modal'] = number_format(ceil(($hasil_presentase_shu_modal * $total_modal_usaha ) / 100));







		// jika pengurus lebih banyak lagi informasinya

		$pengurus_pengawas = array(
			'20190101-151754195',
			'20190101-151753154',
			'20190101-151757276',
			'20190101-151757272',
			'20190101-151755229',
			'20190101-151752141',
			'20190101-151752136'
		);

		$anggotaid = $request->anggotaid ?? 0;
		if (in_array($anggotaid, $pengurus_pengawas)) {
			$data['pengurus'] = true;
		} else {
			$data['pengurus'] = false;
		}

		// get SHU 2018 
		$shu_2018 = DB::select(DB::raw("SELECT  b.* from anggota a 
			inner join apps_shu_summary_temporary b on a.noanggota=b.noanggota
			where id = '".$request->anggotaid."' and shu_year = '2018' " ));

		$data['shu_2018'] = $shu_2018[0] ?? array();

		return view('pengurus_dashboard',with($data));
		// }
	}

	// pinjaman detail
	function detailPinjaman($pinjamanid = null, Request $request)
	{
		// $start_date = '2015-01-01';
		// $end_date = '2016-01-10';

		// while (strtotime($start_date) <= strtotime($end_date)) {
		// 	$start_date = date ("Y-m-d", strtotime("+1 month", strtotime($start_date)));
		// 	echo "$start_date";
		// }
		// die;

		$pinjaman = $pinjamanid ?? 0;
		$pinjaman = DB::select(DB::raw("SELECT * from pinjtransaksi where pinjamanid = '$pinjaman'"));
		$data['head_pinjaman'] = DB::select(DB::raw("SELECT d.nama as namakantor, b.nama as namapinjaman, c.nama as namajaminan,   a.* from pinjaman a 
			inner join pinjjenis b on a.jenisid = b.id
			left join jaminan c on a.jaminanid = c.id
			left join kantor d on a.kantorid = d.id
			where anggotaid = '".$request->anggotaid."' and a.id = '$pinjamanid' "));

		// $data['head_pinjaman'][0]->
		$data['anggotaid'] = $request->anggotaid;
		$data['bunga_pinjaman_bulanan']  = ( ( $data['head_pinjaman'][0]->plafon * 1.25 ) / 100 );

		$data['bagi_hasil_pertama'] = $data['bunga_pinjaman_bulanan'] * 24;

		$data['bunga_pinjaman_bulanan_summary']  = ( ( $data['head_pinjaman'][0]->plafon * 1.25 ) / 100 ) * $data['head_pinjaman'][0]->angsuranke;
		$data['bunga_pinjaman']  = ( ( $data['head_pinjaman'][0]->plafon * 1.25 ) / 100 ) *  $data['head_pinjaman'][0]->jangkawaktu;

		// dd($data['head_pinjaman']);

		$first = $pinjaman[1]->debet ?? 0;
		$i = 0;
		$total_debet_kedua=0;
		$total_bagihasil_kedua=0;
		foreach ($pinjaman as $d) {
			$i++;
			if($i == 1) {
				$res['tanggal'] = $d->tanggal;
				$res['nobukti'] = $d->nobukti;
				$res['keterangan'] = $d->keterangan;
				$res['debet'] = $d->debet;

				if ($first == $d->debet) {
					$res['bagi_hasil'] = $data['bagi_hasil_pertama'];
				} else {
					$res['bagi_hasil'] = $data['bunga_pinjaman_bulanan'];	
				}

				$res['kredit'] = $d->kredit;
				$res['tipe'] = $d->tipe;
				$res['user'] = $d->user;

				$total_debet_kedua = $d->debet;
				$total_bagihasil_kedua = $res['bagi_hasil'];

				$results_one[] = $res;
				continue;
			}
			
			if($i == 2) {
				$res['tanggal'] = $d->tanggal;
				$res['nobukti'] = $d->nobukti;
				$res['keterangan'] = $d->keterangan;
				$res['debet'] = $d->debet;

				if ($first == $d->debet) {
					$res['bagi_hasil'] = $data['bagi_hasil_pertama'];
				} else {
					$res['bagi_hasil'] = $data['bunga_pinjaman_bulanan'];	
				}

				$res['kredit'] = $d->kredit;
				$res['tipe'] = $d->tipe;
				$res['user'] = $d->user;

				$total_debet_kedua = $d->debet;
				$total_bagihasil_kedua = $res['bagi_hasil'];

				$results[] = $res;
				continue;
			}

			
		}

		// dd($results_one);

		$count=0;
		$total_debet=0;
		$total_bagihasil=0;
		$result = [];
		foreach (array_slice($pinjaman, 2) as $d) {

			$res['tanggal'] = $d->tanggal;
			$res['nobukti'] = $d->nobukti;
			$res['keterangan'] = $d->keterangan;
			$res['debet'] = $d->debet;

			if ($first == $d->debet) {
				$res['bagi_hasil'] = $data['bagi_hasil_pertama'];
			} else {
				$res['bagi_hasil'] = $data['bunga_pinjaman_bulanan'];	
			}

			$res['kredit'] = $d->kredit;
			$res['tipe'] = $d->tipe;
			$res['user'] = $d->user;

			$total_debet += $d->debet;
			$total_bagihasil += $res['bagi_hasil'];
			$res['user'] = $d->user;

			$result[] = $res;
		}

		$total_debet;
		$total_bagihasil;

		$angsuran = $data['head_pinjaman'][0]->nangsuran;
		$total_berjalan = $total_debet + $total_bagihasil;
		$angsuran_berjalan = $total_berjalan / $angsuran;

		$total_berjalan_kedua = $total_debet_kedua + $total_bagihasil_kedua;
		$hasil_total_berjalan_kedua = ($total_berjalan_kedua / $angsuran) - 1;
		
		$resultss = [];
		for ($i=0; $i < $hasil_total_berjalan_kedua; $i++) { 
			$res['keterangan'] = '';
			$res['nobukti'] = '';
			$res['tanggal'] = '';
			$res['debet'] = $res['debet'] > 0 ? $res['debet'] : 0;
			$resultss[] = $res;
		}

		// dd(array_merge($results_one , $resultss ,  $result));
		$data['pinjaman'] = array_merge($results_one, $resultss ,  $result);
		// dd($data['pinjaman']);
		return view('pinjaman_dashboard',with($data));
	}
}
