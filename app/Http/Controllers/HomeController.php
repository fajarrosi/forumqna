<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pertanyaan;
use App\User;
class HomeController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = Pertanyaan::orderBy('created_at', 'desc')->paginate(10);
        
        return view('welcome',compact('data'));
    }

    public function reputasi($id)
    {
        $data = User::select('reputasi')->where('id',$id)->get();
        return view('reputasi',compact('data'));
    }
}
