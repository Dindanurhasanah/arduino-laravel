<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_Basah;
use Illuminate\Support\Facades\DB;
use PDF;


class Basah extends Controller
{
    public function __construct()
{
    $this->middleware('auth');
     $this->M_Basah = new M_Basah;
}

public function index(){

    $data4 = $this->M_Basah->allData();
    
   
    return view('laporan',$data4);
}
   
 public function add()
        {
            
            $nobaru = ['no' => $this->M_Basah->no_baru()];
            //$id_baru2 = implode(" ",$id_baru);
            //echo $id_baru2;
            return view('addbasah',$nobaru);
        }

public function detail($no)
        {
            if(!$this->M_Basah->detailData($no))
            {abort(404);
            }
            $data = ['basah' => $this->M_Basah->detailData($no)
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
            $this->M_Basah->addData($data);
            return redirect()->route('laporan');
    }

    public function cetak_pdf()
    {
        $basahs = DB::table('tb_basah')->get();
       

        $pdf = PDF::loadview('basah-pdf', ['basahs' =>$basahs])->setPaper('a4','Potrait');
        $pdf->setOptions(
            [
                'dpi' => 150,
                'defaultFont' => 'arial',
                'isHtml5ParserEnabled' => true,
                'isRemoteEnabled' => true
            ]
            );
        return $pdf->download('pengujian_basah.pdf');
    }

    public function edit($no)
    {
        if(!$this->M_Basah->detaildata($no))
        {abort(404);
        }

        $data4 = ['basah' => $this->M_Basah->detailData($no)
    ];
    return view('editbasah', $data4);

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
           
            $data4 = [
                'no' => Request()->no,
                'nominal_uang' => Request()->nominal_uang,
                'jumlah_percobaan' => Request()->jumlah_percobaan,
                'terdeteksi' => Request()->terdeteksi,
                'tidak_terdeteksi' => Request()->tidak_terdeteksi,
                'presentase' => Request()->presentase,
                
            ];
            $this->M_Basah->editData($no,$data4);
            return redirect()->route('laporan')->with('pesan', 'Data berhasil diubah !');
    }
}

//     public function delete($id_dosen)
//     {
//         //hapus atau delete foto
//         $dosen = $this->M_Basah->detailData($id_dosen);
//         if ($dosen->foto_dosen <> "") {
//             unlink(public_path('foto_dosen'). '/' . $dosen->foto_dosen);
//     }
//     $this->M_Basah->deleteData($id_dosen);
//     return redirect()->route('dosen')->with('pesan', 'Data berhasil dihapus !');
//     }