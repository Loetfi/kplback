<?php

namespace App\Http\Controllers;

use App\Http\Helpers\Api;
use App\Http\Helpers\RestCurl;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AuthController extends Controller
{ 
	public function login(Request $request)
	{
		$value = session('user') ? session('user') : [];

		if (sizeof($value)>0) {
			return redirect('dashboard');
		} else {
			return view('auth/login');
		}
	}

	public function proses(Request $request)
	{
		try {

			$request->validate([
				'username' 	=> 'required',
				'password' 	=> 'required',
			]);

			$data = array(
				'username'	=> $request->username,
				'password'	=> $request->password,
			);

			$r = (object) RestCurl::exec('POST',env('URL_API').'login-backend',$data);
			$res = $r->data;

			if ($res->status === 1) {
				session(['user' => $res->data]);
				return redirect('dashboard');
			} else {
				return redirect('login');
			}
			// $value = session('user');
			// $value->username_backend;
			// $value->status;


		} catch (Exception $e) {

			return 'something error';
			
		}
	}

	// logout

	public function logout(Request $request)
	{
		$value = session('user') ? session('user') : [];

		// dd($value);
		$request->session()->forget('user');
		return redirect('login');
	}
}
