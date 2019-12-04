<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class CostumerController extends Controller
{
    //
    public function index(){
        //$costumer = \App\Costumer::all();
        //$agent = \App\Agent::all();
        //return view('costumer.costumer', ['costumer' => $costumer]);

        $id = Auth::user()->id;
        $data = \App\Agent::where('user_id', $id)->first();
        //$kodereferal = $data->kodereferal;
        $costumer = \App\Costumer::where('kodereferal_agent', '=', $data->kodereferal)->get();
        return view('costumer.costumer', compact('costumer'));
    
    }

    public function listcostumer(){
        $data = \App\Costumer::all();
        return view('costumer.costumerlist', ['costumer' => $data]);
    }

    public function create(Request $request){
        //$agent = \App\Agent::all();
        //$costumer = \App\Costumer::all();
        //$pendapatan = \App\Pendapatan::all();
        $id = Auth::user()->id;
        $agent = \App\Agent::where('user_id', $id)->first();
        $request->request->add(['user_id' => $id]);
        $request->request->add(['kodereferal_agent' => $agent->kodereferal]);
        $costumer = \App\Costumer::create($request->all());
        return redirect('/costumer')->with('sukses','Data Berhasil di Simpan');

    }

    public function createv2(Request $request){

        //mendapat id
        $id = Auth::user()->id;
        //cari id
        $agent = \App\Agent::where('user_id', $id)->first();
        
        //cari kodereferal
        //$data = \App\Agent::where('', '=', '101')->get();
        // if ( $agent->no_agent = 1){
            
        //$data = \App\Agent::where('no_agent', '=', $agent->no_agent)->get();
            
        // } else {

        $data = \App\Agent::where('no_agent', '=', $agent->no_agent)
                             ->where('user_id', '<', $agent->user_id+1)->get();

        // }
        //$data = \App\Agent::where('kodereferal', '=', $agent->kodereferal)
                            //->orWhere('kodereferal_agent', '=', $agent->kodereferal)->get();
        //$data = DB::table('agent')
                //->where('kodereferal', $agent->kodereferal)
                //->where('kodereferal_agent', $agent->kodereferal)
                //->get();
        //$data = \App\Agent::where('no_agent', '=', '101'); 
        //$data = strval($param);

        //return dd($data);
    
        //insert data costumer
        $request->request->add(['user_id' => $id]);
        $request->request->add(['kodereferal_agent' => $agent->kodereferal]);
        $costumer = \App\Costumer::create($request->all());
        
        //persen potongan
        $diskon  = ['100'];
        $diskon1 = ['50', '50'];
        $diskon2 = ['50', '30', '20'];
        $diskon3 = ['50', '25', '15', '10'];
        $diskon4 = ['50', '18', '14', '11', '7'];
        $diskon5 = ['50', '15', '13', '10', '7', '5'];
        //potongan
        $potongan = 500000;
        
        //for
        // for ($i=0; $i <= $count($data); $i++){

        //     $request->request->add(['user_id' => $data[0]->user_id]);
        //     $request->request->add(['hasil' => ($diskon1[0]/100)*$potongan]);
        //     $request->request->add(['ket' => 'Lunas']);
        //     $request->request->add(['diskon' => $diskon1[0]]);
        //     $pendapatan = \App\Pendapatan::create($request->all());
            
        // }


        //proses input data pendapatan
        if ( count($data) == 0 ){

            $request->request->add(['user_id' => '1']);
            $request->request->add(['hasil' => ($diskon[0]/100)*$potongan]);
            $request->request->add(['ket' => 'Lunas']);
            $request->request->add(['diskon' => $diskon[0]]);
            $pendapatan = \App\Pendapatan::create($request->all());

        } elseif ( count($data) == 1 ){

            $request->request->add(['user_id' => $data[0]->user_id]);
            $request->request->add(['hasil' => ($diskon1[0]/100)*$potongan]);
            $request->request->add(['ket' => 'Lunas']);
            $request->request->add(['diskon' => $diskon1[0]]);
            $pendapatan = \App\Pendapatan::create($request->all());

            $request->request->add(['user_id' => '1' ]);
            $request->request->add(['hasil' => ($diskon1[1]/100)*$potongan]);
            $request->request->add(['ket' => 'Lunas']);
            $request->request->add(['diskon' => $diskon1[1]]);
            $pendapatan = \App\Pendapatan::create($request->all());

        } elseif ( count($data) == 2 ){
            //1
            $request->request->add(['user_id' => $data[1]->user_id]);
            $request->request->add(['hasil' => ($diskon2[0]/100)*$potongan]);
            $request->request->add(['ket' => 'Lunas']);
            $request->request->add(['diskon' => $diskon2[0]]);
            $pendapatan = \App\Pendapatan::create($request->all());
            //2
            $request->request->add(['user_id' => $data[0]->user_id]);
            $request->request->add(['hasil' => ($diskon2[1]/100)*$potongan]);
            $request->request->add(['ket' => 'Lunas']);
            $request->request->add(['diskon' => $diskon2[1]]);
            $pendapatan = \App\Pendapatan::create($request->all());
            //3
            $request->request->add(['user_id' => '1' ]);
            $request->request->add(['hasil' => ($diskon2[2]/100)*$potongan]);
            $request->request->add(['ket' => 'Lunas']);
            $request->request->add(['diskon' => $diskon2[2]]);
            $pendapatan = \App\Pendapatan::create($request->all());

        } elseif ( count($data) == 3 ){
            //1
            $request->request->add(['user_id' => $data[2]->user_id]);
            $request->request->add(['hasil' => ($diskon3[0]/100)*$potongan]);
            $request->request->add(['ket' => 'Lunas']);
            $request->request->add(['diskon' => $diskon3[0]]);
            $pendapatan = \App\Pendapatan::create($request->all());
            //2
            $request->request->add(['user_id' => $data[1]->user_id]);
            $request->request->add(['hasil' => ($diskon3[1]/100)*$potongan]);
            $request->request->add(['ket' => 'Ok']);
            $request->request->add(['diskon' => $diskon3[1]]);
            $pendapatan = \App\Pendapatan::create($request->all());
            //3
            $request->request->add(['user_id' => $data[0]->user_id]);
            $request->request->add(['hasil' => ($diskon3[2]/100)*$potongan]);
            $request->request->add(['ket' => 'Ok']);
            $request->request->add(['diskon' => $diskon3[2]]);
            $pendapatan = \App\Pendapatan::create($request->all());
            //4
            $request->request->add(['user_id' => '1' ]);
            $request->request->add(['hasil' => ($diskon3[3]/100)*$potongan]);
            $request->request->add(['ket' => 'Ok']);
            $request->request->add(['diskon' => $diskon3[3]]);
            $pendapatan = \App\Pendapatan::create($request->all());

        } elseif ( count($data) == 4 ){
            //1
            $request->request->add(['user_id' => $data[3]->user_id]);
            $request->request->add(['hasil' => ($diskon4[0]/100)*$potongan]);
            $request->request->add(['ket' => 'Ok']);
            $request->request->add(['diskon' => $diskon4[0]]);
            $pendapatan = \App\Pendapatan::create($request->all());
            //2
            $request->request->add(['user_id' => $data[2]->user_id]);
            $request->request->add(['hasil' => ($diskon4[1]/100)*$potongan]);
            $request->request->add(['ket' => 'Ok']);
            $request->request->add(['diskon' => $diskon4[1]]);
            $pendapatan = \App\Pendapatan::create($request->all());
            //3
            $request->request->add(['user_id' => $data[1]->user_id]);
            $request->request->add(['hasil' => ($diskon4[2]/100)*$potongan]);
            $request->request->add(['ket' => 'Ok']);
            $request->request->add(['diskon' => $diskon4[2]]);
            $pendapatan = \App\Pendapatan::create($request->all());
            //4
            $request->request->add(['user_id' => $data[0]->user_id]);
            $request->request->add(['hasil' => ($diskon4[3]/100)*$potongan]);
            $request->request->add(['ket' => 'Ok']);
            $request->request->add(['diskon' => $diskon4[3]]);
            $pendapatan = \App\Pendapatan::create($request->all());
            //5
            $request->request->add(['user_id' => '1' ]);
            $request->request->add(['hasil' => ($diskon4[4]/100)*$potongan]);
            $request->request->add(['ket' => 'Ok']);
            $request->request->add(['diskon' => $diskon4[4]]);
            $pendapatan = \App\Pendapatan::create($request->all());

        } else {
            'Data Kosong';
        }
        
        return redirect('/costumer')->with('sukses','Data Berhasil di Simpan');
        //input pendapatan dengan id user id 1,2,3

    }

}
