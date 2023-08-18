<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 

class Ointervention extends Model
{
    //
    protected $primaryKey = 'id_intervention';
    use SoftDeletes;
}
