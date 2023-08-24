<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 

class Mpreventive extends Model
{
    //
    protected $primaryKey = 'id_mpreventive';
    use SoftDeletes;

    protected $attributes = [
        'status' => 'draft',
    ];
}


