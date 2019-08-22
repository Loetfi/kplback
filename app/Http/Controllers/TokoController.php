<?php

namespace App\Http\Controllers;

use App\Http\Helpers\Api;
use App\Http\Helpers\RestCurl;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TokoController extends Controller
{ 
	
	public $title = 'Toko';
	
	public function __construct()
	{
		$this->title;
	}
	
	
	public function index()
	{
		$res = (object) RestCurl::exec('GET',env('LINK_API').'/backend/tokolist?id_layanan=2&id_kategori=7');
		
		if ($res->status == 200) {
			$d = $res->data->data;
		} else {
			$d = [];
		}
		
		$data = array(
			'title' => $this->title, 
			'desc'	=> 'Manajemen Promo, Mulai dari Tambah, Edit, Hapus ',
			'data'	=> $d
		);
		
		return view('toko/toko')->with($data);
	}
	
	
	// edit
	public function edit($id = null)
	{ 
		$id = $id ? $id : 0;
		
		$res = (object) RestCurl::exec('GET',env('LINK_API').'/backend/toko/detailData?id_layanan=2&id_kategori=7&id_order='.$id);
		
		if ($res->status == 200) {
			
			if($res->data->data->header != NULL) {
				$d = $res->data->data;
			} else {
				$data = array('error' => 'ID Toko tidak ditemukan');
				return redirect('toko')->with($data);
			}

		} else{
			return redirect('toko');
		}
		
		$data = array(
			'title' => 'Edit '.$this->title, 
			'desc'	=> 'Manajemen '.$this->title.', Mulai dari Tambah, Edit, Hapus ',
			// data
			'data'	=> $d
		);
		
		return view('toko/edit')->with($data);
	}
	
	// proses edit 
	public function prosesedit($id_order = 0, $id = 0){
		
		$id_order = $id_order ? $id_order : 0;
		$id = $id ? $id : 0;
		
		$data = array(
			'id_order' => $id_order,
			'status' => $id,
			'kategori' => 'Toko'
		);

		$res = (object) RestCurl::exec('POST',env('LINK_API').'/backend/toko/approval',$data);
		
		if ($res->status == 200) {
			return redirect('toko/detail/'.$id_order)->with(['success' => 'Update Status Approval Berhasil']);
		} else {
			return redirect('promo');
		}
		

		// return [$id_order , $id];
	}
	
	
	// hapus
	public function delete($id = null)
	{
		if ($id>0) {
			$parse = array(
				'id_promo'	=> $id ? $id : 10000
			);
			$res = (object) RestCurl::exec('POST','http://kpl.awanesia.com/public/promo/delete',$parse);
			
			if ($res->status == 200) {
				$data = $res->data;
			} else {
				return redirect('promo');
			}
		}
		
		return redirect('promo');
		
	}
	
	
	// add
	public function add(){
		
		$list =  @$r->data->data->data;
		return view("promo/add")->with('list',$list);
	}
	
	public function prosesadd(Request $request){
		
		$this->validate($request, [
			'file' 			=> 'required',
			'keterangan' 	=> 'required',
			]);
			
			// menyimpan data file yang diupload ke variabel $file
			$file = $request->file('file');
			$tujuan_upload = 'data_file';
			// upload file
			$file->move($tujuan_upload,time().'.jpg');
			
			$url = url('data_file/'.time().'.jpg');
			
			$insert = array(
				'link' 	=> $url,
				'nama'	=> $request->keterangan
			);
			$res = (object) RestCurl::exec('POST','http://kpl.awanesia.com/public/promo/add',$insert);
			dd($res);
			if ($res->status == 200) {
				$data = $res->data;
				// echo $data->message;
			} else {
				$data = $res->data;
				// echo $data->message;
			}
			
			return redirect('promo');
		}
	}
	
	
	// @foreach ($users as $user)
	//     <p>This is user {{ $user->id }}</p>
	// @endforeach
	