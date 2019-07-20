<?php

namespace App\Http\Controllers;

use App\Http\Helpers\Api;
use App\Http\Helpers\RestCurl;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
// use Carbon\Carbon;

class DashboardController extends Controller
{ 
	function web(){
		$data = array('title' => 'Dashboard');
		return view('dashboard')->with($data);
	}
	public function index(Request $request){
		// $value = session('user') ? session('user') : [];

		// if (sizeof($value)>0) {
		// 	return redirect('dashboard');
		// } else {
			return view('pengurus_dashboard');
		// }
    }
}