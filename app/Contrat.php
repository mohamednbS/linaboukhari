<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 

class Contrat extends Model


{     use SoftDeletes;
    
    

    protected $primaryKey = 'id_contrat';
    /**
     * Obtient l'équipement associé au contrat.
     */
    public function equipement()
    {
        return $this->belongsTo(Equipement::class);
    }  
  
}
