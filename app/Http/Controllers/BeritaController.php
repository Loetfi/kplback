<?php

namespace App\Http\Controllers;

use App\Http\Helpers\Api;
use App\Http\Helpers\RestCurl;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BeritaController extends Controller
{
	public function index()
	{ 
        $res = (object) RestCurl::exec('GET',env('LINK_API').'/backend/beritalist');

		if ($res->status == 200) {
			$d = $res->data->data;
		} else {
			$d = [];
		}

		$data = array(
			'title' => 'Berita', 
			'desc'	=> 'Manajemen Berita, Mulai dari Tambah, Edit, Hapus ',
			// data
			'data'	=> $d
		);

		return view('berita/berita')->with($data);
	}


	// edit
	public function edit($id = null)
	{
		
		$id = $id ? $id : 0;

		$res = (object) RestCurl::exec('GET','http://localhost/projekan/kpl4pps/public/promo/detail?id_promo='.$id);

		if ($res->status == 200) {
			$d = $res->data->data;
		} else {
			return redirect('promo');
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

		$res = (object) RestCurl::exec('POST','http://localhost/projekan/kpl4pps/public/promo/update',$update);

		if ($res->status == 200) {
			$data = $res->data;
			// echo $data->message;
		} else {
			// $data = $res->data;
			return redirect('promo');
		}

		return redirect('promo');
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
		return view("berita/add")->with('list',$list);
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
