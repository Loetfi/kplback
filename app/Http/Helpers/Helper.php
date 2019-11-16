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

}

/* End of file Helper.php */
/* Location: .//Applications/MAMP/htdocs/Projekan/kplback/app/Http/Helpers/Helper.php */
