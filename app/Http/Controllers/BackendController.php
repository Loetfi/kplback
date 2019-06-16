<?php

namespace App\Http\Controllers;

use App\Http\Helpers\Api;
use App\Http\Helpers\RestCurl;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BackendController extends Controller
{ 
	public function getDataPesawat(Request $request)
	{
		$r = (object) RestCurl::exec('GET',env('URL_API').'data/order_pesawat',$request->input());
		return response()->json(@$r->data->data);
	}
}
