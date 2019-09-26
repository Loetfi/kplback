<?php

namespace App\Http\Controllers;

use App\Http\Helpers\Api;
use App\Http\Helpers\RestCurl;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PromoController extends Controller
{ 

	public function index()
	{ 
		$res = (object) RestCurl::exec('GET', env('LINK_API').'promo/list');

		if ($res->status == 200) {
			$d = $res->data->data;
		} else {
			$d = [];
		}
		// dd();

		$data = array(
			'title' => 'Promo', 
			'desc'	=> 'Manajemen Promo, Mulai dari Tambah, Edit, Hapus ',
			// data
			'data'	=> $d
		);

		return view('promo/promo')->with($data);
	}


	// edit
	public function edit($id = null)
	{ 
		$id = $id ? $id : 0;

		$res = (object) RestCurl::exec('GET',env('LINK_API').'promo/detail?id_promo='.$id);

		if ($res->status == 200) {
			$d = $res->data->data;
		} else {
			$data = array('error' => 'ID Promo tidak ditemukan');
			return redirect('promo')->with($data);
		}

		$data = array(
			'title' => 'Edit Promo', 
			'desc'	=> 'Manajemen Promo, Mulai dari Tambah, Edit, Hapus ',
			// data
			'data'	=> $d
		);

		return view('promo/edit')->with($data);
	}

	// proses edit 
	public function prosesedit(Request $request , $id = 0){

		$this->validate($request, [
			// 'file' 			=> 'required',
			'nama_promo'	=> 'required',
			'status'	=> 'required',
			'position'	=> 'required'
		]);

		// menyimpan data file yang diupload ke variabel $file
		$file = $request->file('file') ? $request->file('file') : false;

		if ($file) {
			
			$tujuan_upload = 'data_file';
			// upload file
			$file->move($tujuan_upload,time().'.jpg');

			$url = url('data_file/'.time().'.jpg');
		} else {
			$url = 'no-image';
		}



		$update = array(
			'link' 	=> $url,
			'nama'	=> $request->nama_promo,
			'status'	=> $request->status,
			'position'	=> $request->position,
			'id'		=> $id
		);

		$res = (object) RestCurl::exec('POST',env('LINK_API').'/promo/update',$update);

		if ($res->status == 200) {
			$data = $res->data;
			// echo $data->message;
		} else {
			$data = array('error' => 'Terjadi kesalahan saat melakukan edit');
			return redirect('promo')->with($data);
		}

		$data = array('success' => 'Berhasil melakukan perubahan');
		return redirect('promo')->with($data);
	}


	// hapus
	public function delete($id = null)
	{
		if ($id>0) {
			$parse = array(
				'id_promo'	=> $id ? $id : 10000
			);
			$res = (object) RestCurl::exec('POST',env('LINK_API').'promo/delete',$parse);

			if ($res->status == 200) {
				$data = $res->data;
			} else {
				$data = array('error' => 'Terjadi kesalahan saat melakukan hapus');
			return redirect('promo')->with($data);
			}
		}

		$data = array('success' => 'Berhasil melakukan penghapusan');
		return redirect('promo')->with($data);

	}


	// add
	public function add(){

		$list =  array(
			'list' => @$r->data->data->data,
			'title'	=> 'Promo'
		);
		return view("promo/add")->with($list);
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
		$res = (object) RestCurl::exec('POST',env('LINK_API').'promo/add',$insert);
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
