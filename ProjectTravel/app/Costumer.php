<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Costumer extends Model
{
    //
    protected $table = 'costumer';
    protected $fillable = ['id', 'user_id', 'nama', 'tempatlahir', 'tgllahir', 'gender', 'status', 'pekerjaan', 'nomerhp', 'alamat', 'harga', 'kodereferal_agent'];

}
