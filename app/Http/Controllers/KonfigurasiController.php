<?php

namespace App\Http\Controllers;

use App\Http\Helpers\Api;
use App\Http\Helpers\RestCurl;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;

class KonfigurasiController extends Controller
{ 
	public $title = 'Konfigurasi';
	public $layanan = 'konfigurasi';
	
	public function __construct()
	{
		$this->title;
		$this->layanan;
	}

	public function index(Request $request)
	{
		$r = (object) RestCurl::exec('GET',env('LINK_API').'data/orderlist?start=0&length=1000&id_kategori=4');
		$list =  @$r->data->data;


		$tahun_shu = !empty($request->tahun) ? $request->tahun : date('Y');

		$sumber = DB::select(DB::raw("SELECT * from apps_kolektif_data where tahun = '$tahun_shu' "));

		$data = array(
			'tahun' => $tahun_shu,
			'list'	=> $list,
			'title'	=> $this->title,
			'sumber' => $sumber[0] ?? []
		);

		return view($this->layanan.'/angka_pertahun')->with($data); 
	}



	public function update(Request $request)
	{
		$data = $request->post();

		$res = (object) RestCurl::exec('POST',env('URL_API').'kolektif/update',$data);

		if ($res->status == 200) {
			$data = array('success' => 'Sukses Update');
		} else {
			$data = array('error' => 'Gagal Update');
		}
		return redirect($this->layanan.'/angka-pertahun')->with($data);

	}

}
