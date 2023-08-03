<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mpreventive extends Model
{
    //
    protected $primaryKey = 'id_mpreventive';

    protected $attributes = [
        'status' => 'draft',
    ];
}


