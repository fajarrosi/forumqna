<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = "tag";
    protected $fillable =['name','display'];

    public function pertanyaan()
    {
    	return $this->belongsToMany(Pertanyaan::class,'pertanyaan_tag','pertanyaan_id','tag_id');
    }
}
