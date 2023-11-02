<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 

class Soustraitant extends Model
{
    //
    protected $primaryKey = 'id_soustraitant';
    use SoftDeletes;
}
