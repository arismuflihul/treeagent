<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pendapatan extends Model
{
    //
    protected $table = 'pendapatan';
    protected $fillable = ['id', 'user_id', 'nameagent', 'ket', 'hasil', 'diskon'];
}
