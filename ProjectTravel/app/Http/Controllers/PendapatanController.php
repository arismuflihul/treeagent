<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class PendapatanController extends Controller
{
    //
    public function index(){
        $id = Auth::user()->id;
        $data = \App\Pendapatan::where('user_id', $id)->first();

        $pendapatan = \App\Pendapatan::where('user_id', '=', $id)->get();
        return view('pendapatan', compact('pendapatan'));
    }
}
