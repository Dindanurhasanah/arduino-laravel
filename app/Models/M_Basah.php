<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class M_Basah extends Model
{
    protected $table = 'basah';
    
    public function allData(){
        return DB::table('tb_basah')->get();
    }

    public function detailData($no){
        return DB::table('tb_basah')->where('no',$no)->first();
    }

    public function addData($data){
        DB::table('tb_basah')->insert($data);
    }

    public function editData($no, $data){
        DB::table('tb_basah')->where('no',$no)->update($data);
    }

    public function deleteData($no){
        DB::table('tb_basah')->where('no',$no)->delete();
    }
    public static function no_baru()
    {
    	$nomax = DB::table('tb_basah')->max('no');
    	$addNol = '';
    	$nomax = str_replace("PEG", "", $nomax);
    	$nomax = (int) $nomax + 1;
        $incrementKode = $nomax;

    	if (strlen($nomax) == 1) {
    		$addNol = "000";
    	} elseif (strlen($nomax) == 2) {
    		$addNol = "00";
    	} elseif (strlen($nomax == 3)) {
    		$addNol = "0";
    	}

    	$nobaru = "PEG".$addNol.$incrementKode;
    	return $nobaru;
    }
}