<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 

class Typepanne extends Model
{
    //
    protected $primaryKey = 'id_typepanne';
    use SoftDeletes;
}
