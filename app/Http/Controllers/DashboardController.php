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

		// $results = DB::select( DB::raw("SELECT * FROM some_table WHERE some_col = '$someVariable'") );
		// $value = session('user') ? session('user') : [];

		// if (sizeof($value)>0) {
		// 	return redirect('dashboard');
		// } else {
			return view('pengurus_dashboard',with($data));
		// }
    }
}