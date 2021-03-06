<?php

namespace App\Http\Controllers;

use App\Http\Helpers\Api;
use App\Http\Helpers\RestCurl;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SimpananController extends Controller
{ 
    public $title = 'Simpanan';
    public $layanan = 'simpanan';
	
	public function __construct()
	{
        $this->title;
        $this->layanan;
	}

	public function list(Request $request)
	{
		$r = (object) RestCurl::exec('GET',env('LINK_API').'data/orderlist?start=0&length=1000&id_kategori=13');
        $list =  @$r->data->data;
        // dd($list);

		$data = array(
			'list'	=> $list,
			'title'	=> $this->title,
		);

		// dd($data);
		return view("simpanan/".$this->layanan)->with($data); 
	}

	// edit
	public function edit($id = null)
	{ 
		$id = $id ? $id : 0;
		
		$res = (object) RestCurl::exec('GET',env('LINK_API').'/backend/toko/detailData?id_layanan=3&id_kategori=13&id_order='.$id);
        // dd($res);
		if ($res->status == 200) {
			
			if($res->data->data->header != NULL) {
				$d = $res->data->data;
			} else {
				$data = array('error' => 'ID Bus tidak ditemukan');
				return redirect('simpanan/'.$this->layanan)->with($data);
			}

		} else{
			return redirect($this->layanan);
		}
		
		$data = array(
			'title' => 'Edit '.$this->title, 
			'desc'	=> 'Manajemen '.$this->title.', Mulai dari Tambah, Edit, Hapus ',
			// data
			'data'	=> $d
		);
		
		return view('simpanan/'.$this->layanan.'_edit')->with($data);
	}

	// proses edit 
	public function prosesedit($id_order = 0, $id = 0){
		
		$id_order = $id_order ? $id_order : 0;
		$id = $id ? $id : 0;
		
		$data = array(
			'id_order' => $id_order,
			'status' => $id,
			'kategori' => 'Simpanan'
		);
        $res = (object) RestCurl::exec('POST',env('LINK_API').'/backend/toko/approval',$data);
		
		if ($res->status == 200) {
			return redirect($this->layanan.'/detail/'.$id_order)->with(['success' => 'Update Status Approval Berhasil']);
		} else {
			return redirect($this->layanan);
		}
		

		// return [$id_order , $id];
	}
} 