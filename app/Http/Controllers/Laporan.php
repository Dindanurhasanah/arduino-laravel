<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_Laporan;
use App\Models\M_Lecek;
use App\Models\M_Pengujian;
use App\Models\M_Basah;
use App\Models\M_Pudar;
use App\Models\M_Range;
use Illuminate\Support\Facades\DB;
use PDF;


class Laporan extends Controller
{
    public function __construct()
{
    $this->middleware('auth');
    $this->M_Laporan = new M_Laporan;
    $this->M_Pengujian = new M_Pengujian;
    $this->M_Lecek = new M_Lecek;
    $this->M_Basah = new M_Basah;
    $this->M_Pudar = new M_Pudar;
    $this->M_Range = new M_Range;
    
}


public function index(){

    $data = $this->M_Laporan->allData();
    $data2 = $this->M_Pengujian->allData();
    $data3 = $this->M_Lecek->allData();
    $data4 = $this->M_Basah->allData();
    $data5 = $this->M_Pudar->allData();
    $data6 = $this->M_Range->allData();

    // $tot2 = 0;
    // foreach ($data2 as $data) {
    //     $persentase = (int) $data->presentase;
    //     $tot2 += $persentase;
    // }
    // $persen2 = round($tot2/$data2->count());
   
    return view('laporan',compact('data','data2','data3','data4','data5','data6'));
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
            $data = ['laporan' => $this->M_Laporan->detailData($no)
            ];
            return view('detaillaporan',$data);
        }
     


    public function insert()
    {
        request()->validate([
            'no' => 'required',
            'nama_pengguna' => 'required',
            'kondisi_uang' => 'required',
            // 'kondisi_uang2' => 'required',
            'hasil_deteksi' => 'required',
            // 'hasil_deteksi2' => 'required',
            'kegiatan' => 'required',
            'tanggal' => 'required',
            'uang_diberikan' =>'required',
            // 'uang_kembalian' =>'required',
        ]
        ,[//ini adalah konversi keterangan validasi form NIP dalam bahasa indonesia
            'no.required' => 'No wajib diisi !',
            'no.unique' => 'No ini sudah ada !',
            'nama_pengguna.required' => 'Nama pengguna wajib diisi !',
            'kondisi_uang.required' => 'Kondisi Uang wajib diisi !',
            // 'kondisi_uang2.required' => 'Kondisi Uang wajib diisi !',
            'hasil_deteksi.required' => 'Hasil Deteksi wajib diisi !',
            // 'hasil_deteksi2.required' => 'Hasil Deteksi wajib diisi !',
            'kegiatan.required' => 'Hasil Deteksi wajib diisi !',
            'tanggal.required' => 'Tanggal wajib di isi !',
            'uang_diberikan' =>'Uang yang diberikan wajib diisi !',
            // 'uang_kembalian' =>'Uang Kembalian wajib diisi',
            
            ]);
            //jika validasi tidak ada maka lakukan simpan data
            $data = [
                'no' => Request()->no,
                'nama_pengguna' => Request()->nama_pengguna,
                'kondisi_uang' => Request()->kondisi_uang,
                'hasil_deteksi' => Request()->hasil_deteksi,
                // 'kondisi_uang2' => Request()->kondisi_uang2,
                // 'hasil_deteksi2' => Request()->hasil_deteksi2,
                'kegiatan' => Request()->kegiatan,
                'tanggal' => Request()->tanggal,
                'uang_diberikan' => Request()->uang_diberikan,
                // 'uang_kembalian' => Request()->uang_kembalian,
               
            ];
            $this->M_Laporan->addData($data);
            return redirect()->route('laporan');
            
    }

public function edit($no)
    {
        if(!$this->M_Laporan->detaildata($no))
        {abort(404);
        }

        $data = ['laporan' => $this->M_Laporan->detailData($no)
    ];
    return view('editlaporan', $data);

    }

    public function update($no)
    {
        request()->validate([
            'no' => 'required',
            'nama_pengguna' => 'required',
            'kondisi_uang' => 'required',
            'hasil_deteksi' => 'required',
            // 'kondisi_uang2' => 'required',
            // 'hasil_deteksi2' => 'required',
            'kegiatan' => 'required',
            'tanggal' => 'required',
            'uang_diberikan' =>'required',
            // 'uang_kembalian' =>'required',
        ],[//ini adalah konversi keterangan validasi form NIP dalam bahasa indonesia
            'no.required' => 'No wajib diisi !',
            'no.unique' => 'No ini sudah ada !',
            'nama_pengguna.required' => 'Nama pengguna wajib diisi !',
            'kondisi_uang.required' => 'Kondisi Uang wajib diisi !',
            'hasil_deteksi.required' => 'Hasil Deteksi wajib diisi !',
            // 'kondisi_uang2.required' => 'Kondisi Uang wajib diisi !',
            // 'hasil_deteksi2.required' => 'Hasil Deteksi wajib diisi !',
            'kegiatan.required' => 'Hasil Deteksi wajib diisi !',
            'tanggal.required' => 'Tanggal wajib di isi !',
            'uang_diberikan' =>'Uang yang diberikan wajib diisi !',
            // 'uang_kembalian' =>'Uang Kembalian wajib diisi',
            
          
            ]);
            //jika validasi tidak ada maka lakukan simpan data
           
            $data = [
                'no' => Request()->no,
                'nama_pengguna' => Request()->nama_pengguna,
                'kondisi_uang' => Request()->kondisi_uang,
                'hasil_deteksi' => Request()->hasil_deteksi,
                // 'kondisi_uang2' => Request()->kondisi_uang2,
                // 'hasil_deteksi2' => Request()->hasil_deteksi2,
                'kegiatan' => Request()->kegiatan,
                'tanggal' => Request()->tanggal,
                'uang_diberikan' => Request()->uang_diberikan,
                // 'uang_kembalian' => Request()->uang_kembalian,
            ];
            $this->M_Laporan->editData($no,$data);
            return redirect()->route('laporan')->with('pesan', 'Data berhasil diubah !');
    }

    public function delete($no)
    {
     
    $this->M_Laporan->deleteData($no);
    return redirect()->route('laporan')->with('pesan', 'Data berhasil dihapus !');
    // Laporan::find($no)->delete();
  
    // return back();
    }

    public function cetak_pdf()
    {
        $laporan = DB::table('tb_laporan')->get();
       

        $pdf = PDF::loadview('laporan-pdf', ['laporan' =>$laporan])->setPaper('a4','Potrait');
        $pdf->setOptions(
            [
                'dpi' => 150,
                'defaultFont' => 'arial',
                'isHtml5ParserEnabled' => true,
                'isRemoteEnabled' => true
            ]
            );
        return $pdf->download('laporan_pemakaian_alat.pdf');
    }

    

 
}

//     public function delete($no)
//     {
//         //hapus atau delete foto
//         $dosen = $this->M_Laporan->detailData($no);
//         if ($dosen->foto_dosen <> "") {
//             unlink(public_path('foto_dosen'). '/' . $dosen->foto_dosen);
//     }
//     $this->M_Laporan->deleteData($no);
//     return redirect()->route('dosen')->with('pesan', 'Data berhasil dihapus !');
//     }