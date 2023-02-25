<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\imageUpload; 


class imageuploadController extends Controller
{
    public function index()
    {
       
// get all datas from table


    $files = imageUpload::all();
    // see all datas in index.blade.php
    return view('infografis', compact('files'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {   // this is for create.blade.php
        return view('create');
    }

    public function store(Request $request)
    {   // save all new upload in table
        $image = $request->file('file');
        $FileName = $image->getClientOriginalName();
        
        $image->move(public_path('images'), $FileName); // save all image in a file to name images in laravel app

        $imageUpload = new imageUpload();
        $imageUpload->filename = $FileName;
        $imageUpload->save();
        return response()->json(['success' => $FileName]);
    }

    public function destroy($id)
    {
        // remove or delete from table 
        $fileUpload = imageUpload::find($id);

        $fileUpload->delete();

        return redirect()->back()
            ->with('success', 'File deleted successfully');
    }

}
