<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\VoteEvent;
use DB;
use App\Pertanyaan;
use App\Jawaban;
class Vote extends Model
{
	protected $table ="vote";
    
	protected $fillable = [
        'user_id',
        'jawaban_id',
        'pertanyaan_id',
        'jumlah_vote',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function jawaban()
    {
        return $this->belongsTo(Jawaban::class);
    }

    public function pertanyaan()
    {
        return $this->belongsTo(Pertanyaan::class);
    }
    
   public static function get_vote($user_id, $id, $vote, $column,$prt)
    {
        $voted = self::where('user_id', $user_id)->where($column, $id)->first();
        //jika vote nya di unklik  
        if (isset($voted->jumlah_vote) && $voted->jumlah_vote == $vote) {
            self::destroy($voted->id);
            //jika upvote
            if($vote == 1){
                if($column == 'pertanyaan_id'){
                Pertanyaan::findOrFail($id)->user()->decrement('reputasi',10);
                }else{
                    $uprtid = Pertanyaan::findOrFail($prt);
                    if($user_id == $uprtid->user_id){
                      Jawaban::findOrFail($id)->user()->decrement('reputasi',15);
                    }else{
                      Jawaban::findOrFail($id)->user()->decrement('reputasi',10);
                    }   
                }
            //jika downvote
            }else{
                if ($column == 'pertanyaan_id') {
                    //yang nanya kurang 1
                    Pertanyaan::findOrFail($id)->user()->increment('reputasi',1);
                }else{
                    //yang jawab kurang 1
                      Jawaban::findOrFail($id)->user()->increment('reputasi',1);
                }
            }
            
            $ajax_response = ['status' => 'success', 'msg' => "Vote nullified on $column $id"];
        }elseif(isset($voted->jumlah_vote) && $voted->jumlah_vote != $vote){
            //jika vote -1 maka set -1 jika vote 1 set plus
        self::updateOrCreate([$column => $id, 'user_id' => $user_id], ['jumlah_vote' => $vote]);
            if($vote == -1){
                if($column == 'pertanyaan_id'){
                    Pertanyaan::findOrFail($id)->user()->decrement('reputasi',11);
                }else{
                    $uprtid = Pertanyaan::findOrFail($prt);
                     if($user_id == $uprtid->user_id){
                    Jawaban::findOrFail($id)->user()->decrement('reputasi',16);
                    }else{
                    Jawaban::findOrFail($id)->user()->decrement('reputasi',11);
                    }
                }
            }else{
                if($column == 'pertanyaan_id'){
                    Pertanyaan::findOrFail($id)->user()->increment('reputasi',11);
                }else{
                    $uprtid = Pertanyaan::findOrFail($prt);
                    if($user_id == $uprtid->user_id){
                    Jawaban::findOrFail($id)->user()->increment('reputasi',16);
                    }else{
                    Jawaban::findOrFail($id)->user()->increment('reputasi',11);
                    } 
                }
            }
            $ajax_response = ['status' => 'success', 'msg' => "kesini"];

        }else {
           self::updateOrCreate([$column => $id, 'user_id' => $user_id], ['jumlah_vote' => $vote]);
             //jika upvote
            if ($vote == 1){
                if($column == 'pertanyaan_id'){
                    //yang nanya dapat 10
                    Pertanyaan::findOrFail($id)->user()->increment('reputasi',10);
                }else{
                    $uprtid = Pertanyaan::findOrFail($prt);
                    if($user_id == $uprtid->user_id){
                    //jika si penanya yang upvote maka tambahan 15 ke yang jawab
                      Jawaban::findOrFail($id)->user()->increment('reputasi',15);
                    }else{
                    //jika yang upvote bukan si penanya maka tmbhn 10 ke yang jawab
                      Jawaban::findOrFail($id)->user()->increment('reputasi',10);
                    }                   
                }
                $ajax_response = ['status' => 'success', 'msg' => "Vote cast on $column $id and add 10 poin to $user_id"];
            //jika downvote
            }else{
                if ($column == 'pertanyaan_id') {
                    //yang nanya kurang 1
                    Pertanyaan::findOrFail($id)->user()->decrement('reputasi',1);
                }else{
                    //yang jawab kurang 1
                      Jawaban::findOrFail($id)->user()->decrement('reputasi',1);
                }
            }
        }

        return $ajax_response;
    }
}
