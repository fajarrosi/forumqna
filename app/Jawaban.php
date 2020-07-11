<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
     protected $table = "jawaban";
     protected $fillable = ['judul','isi','user_id','pertanyaan_id'];

     public static function simpan($request,$user_id)
     {
     	$data = Jawaban::create([
     		'judul' =>$request->judul,
     		'isi' =>$request->isi,
     		'user_id'=>$user_id,
     		'pertanyaan_id' =>$request->pertanyaan_id
     	]);
     }

     public static function uptodate($id,$request)
     {
     	$data = Jawaban::findOrFail($id);
     	$data->update([
     		'judul' =>$request->judul,
    		'isi' =>$request->isi
    	]);
     }

     public function user()
     {
     	return $this->belongsTo(User::class);
     }

     public function pertanyaan()
     {
     	return $this->belongsTo(Pertanyaan::class);
     }

     public function votes()
    {
        return $this->hasMany(Vote::class);
    }


}
