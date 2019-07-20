<?php

namespace App\Http\Controllers;

use App\Http\Helpers\Api;
use App\Http\Helpers\RestCurl;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TravelController extends Controller
{ 
	public function index()
	{
		$data = array('title' => 'Ticketing');
		return view("travel/order")->with($data);
	}
}