<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Tag;
use DB;

class Pertanyaan extends Model
{
    protected $table = "pertanyaan";
    protected $fillable = ['judul','isi','user_id'];

    public static function simpan($request,$user_id)
    {
    	//membuat pertanyaan
    	$data = Pertanyaan::create([
    		'judul' => $request->judul ,
    		'isi' => $request->isi,
    		'user_id' =>$user_id
    	]);

    	$tagArr = explode(',', $request->tag);
        $tagsMulti  = [];
        foreach($tagArr as $strTag){
            $tagArrAssc["name"] = $strTag;
            $tagArrAssc["display"] = $strTag;
            $tagsMulti[] = $tagArrAssc;
        }
        foreach($tagsMulti as $tagCheck){
        	//membuat tag
            $tag = Tag::firstOrCreate($tagCheck);
            //memasukkan ke relasi pertanyaan_tag
            $data->tag()->attach($tag->id);
        }


    }

    public static function uptodate($id,$request)
    {
    	$data = Pertanyaan::findOrFail($id);
    	$data->update([
    		'judul' =>$request->judul,
    		'isi' =>$request->isi
    	]);
    	$data->tag()->detach();

    	$tagArr = explode(',', $request->tag);
        $tagsMulti  = [];
        foreach($tagArr as $strTag){
            $tagArrAssc["name"] = $strTag;
            $tagArrAssc["display"] = $strTag;
            $tagsMulti[] = $tagArrAssc;
        }
        foreach($tagsMulti as $tagCheck){
        	//membuat tag
            $tag = Tag::firstOrCreate($tagCheck);
            //memasukkan ke relasi pertanyaan_tag
            $data->tag()->attach($tag->id);
        }

    }

    public function tag(){
    	return $this->belongsToMany(Tag::class, 'pertanyaan_tag', 'pertanyaan_id', 'tag_id');
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function jawaban()
    {
        return $this->hasMany(Jawaban::class);
    }

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }
}
