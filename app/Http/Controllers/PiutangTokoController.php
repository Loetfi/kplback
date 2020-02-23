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

class PiutangTokoController extends Controller
{ 
	function index(){ 

		$kat_piutang = 'piutang 2019';
		$piutang_toko = DB::select(DB::raw("SELECT * from apps_list_toko where namakategori = '$kat_piutang' "));

		$data = array(
			'title' => 'Piutang Toko '.strtoupper($kat_piutang),
			'piutang_toko' => $piutang_toko,
		);
 
		return view('dashboard_mobile/dash_piutang_toko')->with($data);
	}
}
