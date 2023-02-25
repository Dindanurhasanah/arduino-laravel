<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_Range;
use Illuminate\Support\Facades\DB;
use PDF;


class Range extends Controller
{
    public function __construct()
{
    $this->middleware('auth');
     $this->M_Range = new M_Range;
}

public function index(){

    $data6= $this->M_Range->allData();
    
   
    return view('laporan',$data6);
}
   
 public function add()
        {
            
            $nobaru = ['no' => $this->M_Range->no_baru()];
            //$id_baru2 = implode(" ",$id_baru);
            //echo $id_baru2;
            return view('addrange',$nobaru);
        }

public function detail($no)
        {
            if(!$this->M_Range->detailData($no))
            {abort(404);
            }
            $data = ['range' => $this->M_Range->detailData($no)
            ];
            return view('laporan',$data);
        }
     


    public function insert()
    {
        request()->validate([
            'no' => 'required',
            'nominal' => 'required',
            'merah' => 'required',
            'hijau' => 'required',
            'biru' => 'required',
           
        ]
        ,[//ini adalah konversi keterangan validasi form NIP dalam bahasa indonesia
            'no.required' => 'No wajib diisi !',
            'no.unique' => 'No ini sudah ada !',
            'nominal.required' => 'Nominal Uang wajib di isi !',
            'merah.required' => 'Range Warna Merah wajib diisi !',
            'hijau.required' => 'Range Warna Hijau wajib diisi !',
            'biru.required' => 'Range Warna Biru wajib diisi !',
            
           
            ]);
            //jika validasi tidak ada maka lakukan simpan data
            $data = [
                'no' => Request()->no,
                'nominal' => Request()->nominal,
                'merah' => Request()->merah,
                'hijau' => Request()->hijau,
                'biru' => Request()->biru,
               
            ];
            $this->M_Range->addData($data);
            return redirect()->route('laporan');
    }

    public function cetak_pdf()
    {
        $ranges = DB::table('tb_range')->get();
       

        $pdf = PDF::loadview('ranges-pdf', ['ranges' =>$ranges])->setPaper('a4','Potrait');
        $pdf->setOptions(
            [
                'dpi' => 150,
                'defaultFont' => 'arial',
                'isHtml5ParserEnabled' => true,
                'isRemoteEnabled' => true
            ]
            );
        return $pdf->download('range_warna.pdf');
    }


}

//     public function delete($id_dosen)
//     {
//         //hapus atau delete foto
//         $dosen = $this->M_Range->detailData($id_dosen);
//         if ($dosen->foto_dosen <> "") {
//             unlink(public_path('foto_dosen'). '/' . $dosen->foto_dosen);
//     }
//     $this->M_Range->deleteData($id_dosen);
//     return redirect()->route('dosen')->with('pesan', 'Data berhasil dihapus !');
//     }