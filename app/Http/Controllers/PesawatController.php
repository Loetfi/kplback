<?php

namespace App\Http\Controllers;

use App\Http\Helpers\Api;
use App\Http\Helpers\RestCurl;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PesawatController extends Controller
{ 
	public function list(Request $request)
	{
		// echo env('URL_API').'data/order_pesawat';
		$r = (object) RestCurl::exec('GET',env('URL_API').'data/order_pesawat?start=0&length=1000',$request->input());
		$list =  @$r->data->data->data;

		// print($list)
		// dd($list);
		// $list = DB::table('student')->get();
		return view("travel/pesawat")->with('list',$list);

		// $r = (object) RestCurl::exec('GET',env('URL_API').'data/order_pesawat',$request->input());
		// return response()->json(@$r->data->data);
	}
}


// @foreach ($users as $user)
//     <p>This is user {{ $user->id }}</p>
// @endforeach
