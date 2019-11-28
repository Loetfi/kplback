<?php
namespace App\Http\Helpers;

use DB;

class Helper {

	public static function getDetailPenjualan($id='')
	{
		try {
			$res =  DB::select(DB::raw("SELECT sum(harga * kuantitas) as totalbelanja from penjualandetail where id = '$id'"));

			return $res[0]->totalbelanja;

		} catch (\Exception $e) {
			return '0';
		}
	}

	public static function hitungUmur($tanggal_lahir = '') {
	    list($year,$month,$day) = explode("-",$tanggal_lahir);
	    $year_diff  = date("Y") - $year;
	    $month_diff = date("m") - $month;
	    $day_diff   = date("d") - $day;
	    if ($month_diff < 0) $year_diff--;
	        elseif (($month_diff==0) && ($day_diff < 0)) $year_diff--;
	    return $year_diff;
	}

	public static function getNamaBarang($id = '') {
	  try {
			$res =  DB::select(DB::raw("SELECT nama from barang where id = '$id'"));

			return $res[0]->nama;

		} catch (\Exception $e) {
			return '0';
		}
	}

}

/* End of file Helper.php */
/* Location: .//Applications/MAMP/htdocs/Projekan/kplback/app/Http/Helpers/Helper.php */
