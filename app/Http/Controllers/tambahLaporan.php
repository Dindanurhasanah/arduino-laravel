<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_Laporan;


class tambahLaporan extends Controller
{
    public function __construct()
{
    $this->middleware('auth');
     $this->M_Laporan = new M_Laporan;
}

public function index(){

    $data = ['laporan' => $this->M_Laporan->allData()
    ];
    return view('laporan',$data);
}
   
 public function add()
        {
            
            $nobaru = ['no' => $this->M_Laporan->no_baru()];
            //$id_baru2 = implode(" ",$id_baru);
            //echo $id_baru2;
            return view('addlaporan',$nobaru);
        }

public function detail($no)
        {
            if(!$this->M_Laporan->detailData($no))
            {abort(404);
            }
            $data = ['laporan' => $this->M_Dosen->detailData($no)
            ];
            return view('laporan',$data);
        }
     


    public function insert()
    {
        request()->validate([
            'no' => 'required',
            'nama_pengguna' => 'required',
            'kondisi_uang' => 'required',
            'hasil_deteksi' => 'required',
            'kegiatan' => 'required',
            'tanggal' => 'required',
        ]
        ,[//ini adalah konversi keterangan validasi form NIP dalam bahasa indonesia
            'no.required' => 'No wajib diisi !',
            'no.unique' => 'No ini sudah ada !',
            'nama_pengguna.required' => 'Nama pengguna wajib diisi !',
            'kondisi_uang.required' => 'Kondisi Uang wajib diisi !',
            'hasil_deteksi.required' => 'Hasil Deteksi wajib diisi !',
            'kegiatan.required' => 'Hasil Deteksi wajib diisi !',
            'tanggal.required' => 'Tanggal wajib di isi !',
            ]);
            //jika validasi tidak ada maka lakukan simpan data
            $data = [
                'no' => Request()->no,
                'nama_pengguna' => Request()->nama_pengguna,
                'kondisi_uang' => Request()->kondisi_uang,
                'hasil_deteksi' => Request()->hasil_deteksi,
                'kegiatan' => Request()->kegiatan,
                'tanggal' => Request()->tanggal,
               
            ];
            $this->M_Laporan->addData($data);
            return redirect()->route('laporan')->with('pesan', 'Data berhasil ditambahkan !');
    }


}

//     public function delete($id_dosen)
//     {
//         //hapus atau delete foto
//         $dosen = $this->M_Laporan->detailData($id_dosen);
//         if ($dosen->foto_dosen <> "") {
//             unlink(public_path('foto_dosen'). '/' . $dosen->foto_dosen);
//     }
//     $this->M_Laporan->deleteData($id_dosen);
//     return redirect()->route('dosen')->with('pesan', 'Data berhasil dihapus !');
//     }