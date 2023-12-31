<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes; 

class Sousequipement extends Model
{   
    use SoftDeletes;
    protected $primaryKey = 'id_sousequipement';
    /**
     * Get the equipement that owns the SousEquipements
     *
     * @return \Illuminate\DatabEquipemntEloquent\Req_idlongsTo
     */
    public function equipement()
    {
        return $this->belongsTo(Equipement::class, 'equipement_id');
    }
}    
 