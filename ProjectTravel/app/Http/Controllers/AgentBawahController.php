<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AgentBawahController extends Controller
{
    //
    public function index(){
        //return "Dashboard Agent";
        $id = Auth::user()->id;
        $data = \App\Agent::where('user_id', $id)->first();
        //$kodereferal = 
        $agent = \App\Agent::where('kodereferal_agent', '=', $data->kodereferal)->get();
        //return dd($agent);
        return view('agentBawah.dashboard', compact('agent'));
    }

    public function create(Request $request){
        $user = new \App\User;
        $user->role = 'agent';
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->password = bcrypt('rahasia');
        $user->remember_token = str_random(60);
        $user->save();

       //
        $id = Auth::user()->id;
        $data = \App\Agent::where('user_id', $id)->first();
        $agent = \App\Agent::where('kodereferal_agent', '=', $data->kodereferal)->get();
        $id = Auth::user()->id;
        $agent = \App\Agent::where('user_id', $id)->first();
        $request->request->add(['user_id' => $user->id]);
        $request->request->add(['kodereferal' => str_random(10) ]);
        $request->request->add(['kodereferal_agent' => $agent->kodereferal]);
        $request->request->add(['no_agent' => $agent->no_agent ]);
        $agent = \App\Agent::create($request->all());

        return redirect('/agentbawah')->with('sukses', 'Data berhasil disimpan');
        
    }

    public function listagentbawah($id){
        $data = \App\Agent::find($id);
        $data2 = \App\Agent::where('id', $id)->first();
        $agent = \App\Agent::where('kodereferal_agent', '=' , $data2->kodereferal)->get();
        
        //return dd($array);
        return view('agentBawah.listagentbawah', compact('agent'));
    }
}
