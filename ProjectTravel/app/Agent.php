<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    //
    protected $table = 'agent';
    protected $fillable = ['nama', 'gender', 'alamat', 'user_id', 'kodereferal', 'kodereferal_agent', 'no_agent', 'jalur'];
}
