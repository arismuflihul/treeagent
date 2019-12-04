<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Agent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AgentApiController extends Controller
{
    //
    public function agent_get(Agent $agent){

        $agent= $agent->all();

        if (count($agent) == 0){

            return response()->json([

                'status'    =>  0,
                'message'   =>  'result empty',
                'result'    => $agent
            ]);

        } else {

            return response()->json([

                'status'    =>  200,
                'message'   =>  'Succes',
                'result'    => $agent
            ]);
        }
    }

    public function agent_post(Request $request){

        $agent = new Agent;

        $agent->nama        = $request->nama;
        $agent->gender      = $request->gender;
        $agent->alamat      = $request->alamat;
        $agent->kodereferal = str_random(10);
        $agent->kodereferal_agent  = '1111111111';
        $agent->no_agent          = '15';
        // $jalur              = Input::get('jalur');
        $agent->user_id            = '15';

        $succes             = $agent->save();

        if ($succes){

            return response()->json([
                    'status'    => 200,
                    'message'   => 'Succes',
                    'result'    => $agent
                ]);

        } else {

            return response()->json([
                'status'    => 201,
                'message'   => 'Error Saving',
                'result'    => $agent
            ]);

        }
    }

    public function show($id){

        $agent = Agent::find($id);

        if ($agent = null){

            return response()->json([
                'status'    => 404,
                'message'   => 'Id Not Found',
                'result'    => false
            ]);

        } else {

            return response()->json([
                'status'    => 200,
                'message'   => 'Succes',
                'result'    => $agent
            ]);

        }
    }


    
    // public function train(Request $request) {
        
    //     $message = file_get_contents("https://api.myjson.com/bins/hpp4r");
        
    //     $station = Storage::get('public/StationList.json');
        
    //     $param = $request->header('X-Type');
        
    //     if ($param == 'Station List'){
    //         return json_decode($station, true);
    //     }else{
    //         "";
    //     }
    // }
    // public function train_post(Request $request){

        
    // // $token = Storage::put('public/Train/TokenTrain.json');
        
    // // $train_token = $token::create($input);

    // $station = Storage::get('public/TokenTrain.json');
        
    // $param = $request->header('X-Type');
    
    // if ($param == 'Station List'){
    //     return json_decode($station, true);
    // }else{
    // 
    // }
        
    // }
    
    
}
