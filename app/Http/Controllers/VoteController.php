<?php

namespace App\Http\Controllers;

use App\Vote;
use Illuminate\Http\Request;
use Auth;
class VoteController extends Controller
{
    public function vote_pertanyaan(Request $request)
    {

    	$data = Vote::get_vote(Auth::id(),$request->pertanyaan_id, $request->vote, 'pertanyaan_id',0);
    	return response()->json($data);
      
    }

    public function vote_jawaban(Request $request)
    {
    	$data = Vote::get_vote(Auth::id(),$request->jawaban_id, $request->vote, 'jawaban_id',$request->prt_id);
    	return response()->json($data);

    }
}
