<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    //
    public function users(User $user){

        $users = $user->all();
        if (count($users) == 0){
            return response()->json('Data Kosong');
        }else{
            return response()->json($users);
        }
        // return response()->json($users);
    }
    
    public function train(Request $request) {
        
        $message = file_get_contents("https://api.myjson.com/bins/hpp4r");
        
        $station = Storage::get('public/StationList.json');
        
        $param = $request->header('X-Type');
        
        if ($param == 'Station List'){
            return json_decode($station, true);
        }else{
            "";
        }
    }
    public function train_post(Request $request){

        
    // $token = Storage::put('public/Train/TokenTrain.json');
        
    // $train_token = $token::create($input);

    $station = Storage::get('public/TokenTrain.json');
        
    $param = $request->header('X-Type');
    
    if ($param == 'Station List'){
        return json_decode($station, true);
    }else{
        "";
    }
        
    }
    
    
}
