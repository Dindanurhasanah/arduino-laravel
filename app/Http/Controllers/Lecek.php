<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_Lecek;
use Illuminate\Support\Facades\DB;
use PDF;


class Lecek extends Controller
{
    public function __construct()
{
    $this->middleware('auth');
     $this->M_Lecek = new M_Lecek;
}

public function index(){

    $data3 = $this->M_Lecek->allData();
    
   
    return view('laporan',$data3);
}
   
 public function add()
        {
            
            $nobaru = ['no' => $this->M_Lecek->no_baru()];
            //$id_baru2 = implode(" ",$id_baru);
            //echo $id_baru2;
            return view('addlecek',$nobaru);
        }

public function detail($no)
        {
            if(!$this->M_Lecek->detailData($no))
            {abort(404);
            }
            $data = ['lecek' => $this->M_Lecek->detailData($no)
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
            $this->M_Lecek->addData($data);
            return redirect()->route('laporan');
    }

    public function cetak_pdf()
    {
        $leceks = DB::table('tb_lecek')->get();
       

        $pdf = PDF::loadview('lecek-pdf', ['leceks' =>$leceks])->setPaper('a4','Potrait');
        $pdf->setOptions(
            [
                'dpi' => 150,
                'defaultFont' => 'arial',
                'isHtml5ParserEnabled' => true,
                'isRemoteEnabled' => true
            ]
            );
        return $pdf->download('pengujian_lecek.pdf');
    }

    public function edit($no)
    {
        if(!$this->M_Lecek->detaildata($no))
        {abort(404);
        }

        $data3 = ['lecek' => $this->M_Lecek->detailData($no)
    ];
    return view('editlecek', $data3);

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
           
            $data3 = [
                'no' => Request()->no,
                'nominal_uang' => Request()->nominal_uang,
                'jumlah_percobaan' => Request()->jumlah_percobaan,
                'terdeteksi' => Request()->terdeteksi,
                'tidak_terdeteksi' => Request()->tidak_terdeteksi,
                'presentase' => Request()->presentase,
                
            ];
            $this->M_Lecek->editData($no,$data3);
            return redirect()->route('laporan')->with('pesan', 'Data berhasil diubah !');
    }


}

//     public function delete($id_dosen)
//     {
//         //hapus atau delete foto
//         $dosen = $this->M_Lecek->detailData($id_dosen);
//         if ($dosen->foto_dosen <> "") {
//             unlink(public_path('foto_dosen'). '/' . $dosen->foto_dosen);
//     }
//     $this->M_Lecek->deleteData($id_dosen);
//     return redirect()->route('dosen')->with('pesan', 'Data berhasil dihapus !');
//     }