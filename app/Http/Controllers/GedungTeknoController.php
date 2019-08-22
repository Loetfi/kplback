<?php

namespace App\Http\Controllers;

use App\Http\Helpers\Api;
use App\Http\Helpers\RestCurl;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Carbon\Carbon;

class GedungTeknoController extends Controller
{ 
    public $title = 'Gedung Tekno - ';
    public $layanan = 'gedungtekno';
	
	public function __construct()
	{
        $this->title;
        $this->layanan;
	}

	public function list($id = null ,  $nama = null)
	{
		$r = (object) RestCurl::exec('GET',env('LINK_API').'data/orderlist?start=0&length=1000&id_kategori='.$id);
        $list =  @$r->data->data;
        // dd($list);

		$data = array(
			'list'	=> $list,
			'title'	=> $this->title . $nama,
		);

		// dd($data);
		return view("gedungtekno/".$this->layanan)->with($data); 
	}

	// edit
	public function edit($id = null, $id_kat = null , $nama = null)
	{ 
		$id = $id ? $id : 0;
		
		$res = (object) RestCurl::exec('GET',env('LINK_API').'/backend/toko/detailData?id_layanan=6&id_kategori='.$id_kat.'&id_order='.$id);
        
		if ($res->status == 200) {
			
			if($res->data->data->header != NULL) {
                $d = $res->data->data;
			} else {
                $data = array('error' => 'ID Serba Usaha Ruang Meeting tidak ditemukan');
				return redirect($this->layanan)->with($data);
			}

		} else{
			return redirect($this->layanan.'id_kat/'.$id_kat.'/'.$nama);
		}
		
		$data = array(
			'title' => 'Edit '.$this->title . ' - '.$nama, 
			'desc'	=> 'Manajemen '.$this->title.', Mulai dari Tambah, Edit, Hapus ',
			// data
            'data'	=> @$d,
            'nama'  => $nama,
            'id_kat'  => $id_kat
		);
		
		return view('gedungtekno/'.$this->layanan.'_edit')->with($data);
	}

	// proses edit 
	public function prosesedit($id_order = 0, $id = '', $id_kat = null, $nama = ''){
		
		$id_order = $id_order ? $id_order : 0;
		$id = $id ? $id : 0;
		
		$data = array(
			'id_order' => $id_order,
			'status' => $id,
			'kategori' => 'Gedung Teknologi - '.$nama
		);
        $res = (object) RestCurl::exec('POST',env('LINK_API').'/backend/toko/approval',$data);
		
		if ($res->status == 200) {
			return redirect($this->layanan.'/detail/'.$id_order.'/'.$id_kat.'/'.$nama)->with(['success' => 'Update Status Approval Berhasil']);
		} else {
			return redirect($this->layanan);
		}
		

		// return [$id_order , $id];
	}
} 