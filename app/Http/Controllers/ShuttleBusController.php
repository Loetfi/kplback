<?php

namespace App\Http\Controllers;

use App\Http\Helpers\Api;
use App\Http\Helpers\RestCurl;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ShuttleBusController extends Controller
{ 
    public $title = 'Tiketing Shuttle Bus';
    public $layanan = 'shuttle';
	
	public function __construct()
	{
        $this->title;
        $this->layanan;
	}

	public function list(Request $request)
	{
		// echo env('URL_API').'data/order_pesawat';
		// die;
		$r = (object) RestCurl::exec('GET',env('LINK_API').'data/orderlist?start=0&length=1000&id_kategori=5');
        $list =  @$r->data->data;

		$data = array(
			'list'	=> $list,
			'title'	=> $this->title,
		);

		// dd($data);
		return view("travel/".$this->layanan)->with($data); 
	}

	// edit
	public function edit($id = null)
	{ 
		$id = $id ? $id : 0;
		
        $res = (object) RestCurl::exec('GET',env('LINK_API').'/backend/toko/detailData?id_layanan=1&id_kategori=5&id_order='.$id);

		if ($res->status == 200) {
			
			if($res->data->data->header != NULL) {
				$d = $res->data->data;
			} else {
				$data = array('error' => 'ID Bus tidak ditemukan');
				return redirect('travel/'.$this->layanan)->with($data);
			}

		} else{
			return redirect('travel/'.$this->layanan);
		}
		
		$data = array(
			'title' => 'Edit '.$this->title, 
			'desc'	=> 'Manajemen '.$this->title.', Mulai dari Tambah, Edit, Hapus ',
			// data
			'data'	=> $d
		);
		
		return view('travel/'.$this->layanan.'_edit')->with($data);
	}

	// proses edit 
	public function prosesedit($id_order = 0, $id = 0){
		
		$id_order = $id_order ? $id_order : 0;
		$id = $id ? $id : 0;
		
		$data = array(
			'id_order' => $id_order,
			'status' => $id,
			'kategori' => 'Shuttle Bus'
		);
        $res = (object) RestCurl::exec('POST',env('LINK_API').'/backend/toko/approval',$data);
		
		if ($res->status == 200) {
			return redirect('travel/'.$this->layanan.'/detail/'.$id_order)->with(['success' => 'Update Status Approval Berhasil']);
		} else {
			return redirect('travel/'.$this->layanan);
		}
		

		// return [$id_order , $id];
	}
} 