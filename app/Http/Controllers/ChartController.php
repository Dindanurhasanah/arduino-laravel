<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;
use Carbon\Carbon;
use App\Models\M_Pengujian;

class ChartController extends Controller
{
    public function __construct()
{
    $this->middleware('auth');
   
    $this->M_Pengujian = new M_Pengujian;

}

public function index(){

    $data = $this->M_Pengujian->allData();
    
   
    return view('v_chart',$data);
}
}