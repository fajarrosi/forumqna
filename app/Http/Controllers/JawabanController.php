<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jawaban;
use Auth;
use Illuminate\Support\Facades\Session;

class JawabanController extends Controller
{
    public function simpan(Request $request)
    {
    	// dd($request);
    	$data = Jawaban::simpan($request,Auth::user()->id);
    	Session::flash('flash_message', '<P><h3>Jawaban Berhasil Ditambahkan</h3></P>');
    	return redirect('/pertanyaan/jawab/'.$request->pertanyaan_id); //redirect ke pertanyaan yang tadi
    }

    public function edit($prtid,$id)	
    {
    	$data = Jawaban::findOrFail($id);
    	return view('jawaban.edit',compact('data','prtid'));
    }
    public function ubah($id,Request $request)
    {
    	Jawaban::uptodate($id,$request);
    	Session::flash('flash_message', '<P><h3>Jawaban Berhasil Dirubah</h3></P>');
    	return redirect('/pertanyaan/jawab/'.$request->prtid);
    }

    public function hapus($prtid,$id)
    {
    	Jawaban::findOrFail($id)->delete();	
    	Session::flash('flash_message', '<P><h3>Jawaban Berhasil Dihapus</h3></P>');
    	return redirect()->back();
    }

    public function tampil($id)
    {
    	$data = Jawaban::where('user_id',$id)->orderBy('id','ASC')->paginate(10);
    	// dd($data);
    	return view('jawaban.jawabanku',compact('data'));
    }
}
