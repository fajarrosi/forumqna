<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pertanyaan;
use Auth;
use Illuminate\Support\Facades\Session;
use App\User;
use App\Jawaban;
class PertanyaanController extends Controller
{
    public function tambah()
    {
    	return view('pertanyaan.tambah');
    }

    public function simpan(Request $request)
    {
    	$data = Pertanyaan::simpan($request,Auth::user()->id);
    	Session::flash('flash_message', '<P><h3>Pertanyaan Berhasil Ditambahkan</h3></P>');
    	return redirect('/pertanyaan/tampil/'.Auth::user()->id); //redirect ke show semua pertanyaan
    } 

    public function tampil($id)
    {
    	$data = Pertanyaan::where('user_id',$id)->orderBy('id','ASC')->paginate(10);
    	return view('pertanyaan.tampil',compact('data'));
    }

    public function edit($id)
    {	
    	$data = Pertanyaan::findOrFail($id);
    	$new_tag = [];
    	foreach ($data->tag as $tag) {
    		$new_tag[] = $tag->name;
    	}
    	$tag = implode(',',$new_tag);
    	return view('pertanyaan.edit',compact('data','tag'));
    }

    public function ubah($id, Request $request)
    {
    	Pertanyaan::uptodate($id,$request);

    	Session::flash('flash_message', '<P><h3>Pertanyaan Berhasil Dirubah</h3></P>');
    	return redirect('/pertanyaan/tampil/'.Auth::user()->id);
    }

    public function hapus($id)
    {
    	$data = Pertanyaan::findOrFail($id);

        //jika ada tag maka detach
    	$data->tag()->detach();

        //jika pertanyaannya ad jawaban maka delete semua jawaban
        $data->jawaban()->delete();
    	$data->delete();
    	Session::flash('flash_message', '<P><h3>Pertanyaan Berhasil Dihapus</h3></P>');
    	return redirect('/pertanyaan/tampil/'.Auth::user()->id);
    }

    //untuk jawab pertanyaan
    public function jawab($id)
    {
    	$data = Pertanyaan::findOrFail($id);
    	return view('pertanyaan.jawab',compact('data'));
    }

    public function terbaru()
    {
       $data = Pertanyaan::orderBy('created_at', 'desc')->paginate(10);
       return view('pertanyaan.terbaru',compact('data'));
    }
}
