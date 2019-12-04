<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AgentController extends Controller
{
    //
    public function index(){
        //return "Dashboard Agent";
        

        $id = Auth::user()->id;
        $data = \App\Agent::where('user_id', $id)->first();
        //$kodereferal = 
        $agent = \App\Agent::where('kodereferal_agent', '=', '1111111111')->get();
        return view('agent.dashboard', compact('agent','data'));
    }

    public function create(Request $request){

        //insert table users
        $user = new \App\User;
        $user->role = 'agent';
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->password = bcrypt('rahasia');
        $user->remember_token = str_random(60);
        $user->save();

        //insert table agent
        
        $request->request->add(['user_id' => $user->id ]);
        $request->request->add(['kodereferal' => str_random(10) ]);
        $request->request->add(['kodereferal_agent' => '1111111111' ]);
        $request->request->add(['no_agent' => $user->id ]);
        $agent = \App\Agent::create($request->all());

        //$data = \App\Agent::all();
        //$agent = new \App\Agent;
        //$agent->nama = $request->nama;
        //$agent->tempatlahir = $request->tempatlahir;
        //$agent->tgllahir = $request->tgllahir;
        //$agent->gender = $request->gender;
        //$agent->status = $request->status;
        //$agent->pekerjaan = $request->pekerjaan;
        //$agent->nomerhp = $request->nomerhp;
        //$agent->alamat = $request->alamat;
        //$agent->kodereferal = str_random(10);
        //$agent->no_agent = 1;
        //$agent->save();




        return redirect('/agent')->with('sukses', 'Data Berhasil di Simpan');
    }

    public function viewUpdate($id){
        $agent = \App\Agent::find($id);
        return view('/agent/update', ['agent' => $agent]);
    }

    public function update(Request $request, $id){
        $agent = \App\Agent::find($id);
        $agent->update($request->all());
        return redirect('/agent')->with('sukses', 'Data Berhasil di Update');
    }

    public function delete($id){
        $agent = \App\Agent::find($id);
        $agent->delete();
        return redirect('/agent')->with('sukses', 'Data Berhasil di Hapus');
    }

    public function listagent($id){
        $data = \App\Agent::find($id);
        $data2 = \App\Agent::where('id', $id)->first();
        $agent = \App\Agent::where('kodereferal_agent', '=' , $data2->kodereferal)->get();
        
        //return dd($array);
        return view('/agent.listagent', compact('agent'));
    }
}
