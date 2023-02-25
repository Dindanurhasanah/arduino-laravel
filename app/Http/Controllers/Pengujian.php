<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_Pengujian;
use Illuminate\Support\Facades\DB;
use PDF;


class Pengujian extends Controller
{
    public function __construct()
{
    $this->middleware('auth');
     $this->M_Pengujian = new M_Pengujian;
}

public function index(){

    $data2 = $this->M_Pengujian->allData();
    
   
    return view('laporan',$data2);
}
   
 public function add()
        {
            
            $nobaru = ['no' => $this->M_Pengujian->no_baru()];
            //$id_baru2 = implode(" ",$id_baru);
            //echo $id_baru2;
            return view('addpengujian',$nobaru);
        }

public function detail($no)
        {
            if(!$this->M_Pengujian->detailData($no))
            {abort(404);
            }
            $data = ['pengujian' => $this->M_Pengujian->detailData($no)
            ];
            return view('laporan',$data);
        }
     


    public function insert()
    {
        request()->validate([
            'no' => 'required',
            'nominal_uang' => 'required',
            'jumlah_percobaan' => 'required',
            'terdeteksi' => 'required',
            'tidak_terdeteksi' => 'required',
            'presentase' => 'required',
        ]
        ,[//ini adalah konversi keterangan validasi form NIP dalam bahasa indonesia
            'no.required' => 'No wajib diisi !',
            'no.unique' => 'No ini sudah ada !',
            'nominal_uang.required' => 'Nominal Uang wajib di isi !',
            'jumlah_percobaan.required' => 'Jumlah Percobaan wajib diisi !',
            'terdeteksi.required' => 'Jumlah Terdeteksi wajib diisi !',
            'tidak_deteksi.required' => 'Jumlah Tidak Terdeteksi wajib diisi !',
            'presentase.required' => 'Presentase wajib diisi !',
           
            ]);
            //jika validasi tidak ada maka lakukan simpan data
            $data = [
                'no' => Request()->no,
                'nominal_uang' => Request()->nominal_uang,
                'jumlah_percobaan' => Request()->jumlah_percobaan,
                'terdeteksi' => Request()->terdeteksi,
                'tidak_terdeteksi' => Request()->tidak_terdeteksi,
                'presentase' => Request()->presentase,
               
            ];
            $this->M_Pengujian->addData($data);
            return redirect()->route('laporan');
    }

    public function cetak_pdf()
    {
        $rapi = DB::table('tb_pengujian')->get();
       

        $pdf = PDF::loadview('rapi-pdf', ['rapi' =>$rapi])->setPaper('a4','Potrait');
        $pdf->setOptions(
            [
                'dpi' => 150,
                'defaultFont' => 'arial',
                'isHtml5ParserEnabled' => true,
                'isRemoteEnabled' => true
            ]
            );
        return $pdf->download('pengujian_rapi.pdf');
    }

    public function delete($no)
    {
     
    $this->M_Pengujian->deleteData($no);
    return redirect()->route('laporan')->with('pesan', 'Data berhasil dihapus !');
    // Laporan::find($no)->delete();
  
    // return back();
    }

    public function edit($no)
    {
        if(!$this->M_Pengujian->detaildata($no))
        {abort(404);
        }

        $data2 = ['pengujian' => $this->M_Pengujian->detailData($no)
    ];
    return view('editrapi', $data2);

    }

    public function update($no)
    {
        request()->validate([
            'no' => 'required',
            'nominal_uang' => 'required',
            'jumlah_percobaan' => 'required',
            'terdeteksi' => 'required',
            'tidak_terdeteksi' => 'required',
            'presentase' => 'required',
           
        ],[//ini adalah konversi keterangan validasi form NIP dalam bahasa indonesia
            'no.required' => 'No wajib diisi !',
            'no.unique' => 'No ini sudah ada !',
            'nominal_uang.required' => 'Nominal Uang wajib diisi !',
            'jumlah_percobaan.required' => 'Jumlah Percobaan wajib diisi !',
            'terdeteksi.required' => 'Jumlah terdeteksi wajib diisi !',
            'tidak_terdeteksi.required' => 'Jumlah tidak terdeteksi wajib diisi !',
            'presentase.required' => 'Tanggal wajib di isi !',

            
          
            ]);
            //jika validasi tidak ada maka lakukan simpan data
           
            $data2 = [
                'no' => Request()->no,
                'nominal_uang' => Request()->nominal_uang,
                'jumlah_percobaan' => Request()->jumlah_percobaan,
                'terdeteksi' => Request()->terdeteksi,
                'tidak_terdeteksi' => Request()->tidak_terdeteksi,
                'presentase' => Request()->presentase,
                
            ];
            $this->M_Pengujian->editData($no,$data2);
            return redirect()->route('laporan')->with('pesan', 'Data berhasil diubah !');
    }


}

//     public function delete($id_dosen)
//     {
//         //hapus atau delete foto
//         $dosen = $this->M_Pengujian->detailData($id_dosen);
//         if ($dosen->foto_dosen <> "") {
//             unlink(public_path('foto_dosen'). '/' . $dosen->foto_dosen);
//     }
//     $this->M_Pengujian->deleteData($id_dosen);
//     return redirect()->route('dosen')->with('pesan', 'Data berhasil dihapus !');
//     }