<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes; 

class Modalite extends Model
{    
    protected $primaryKey = 'id_modalite';
    use SoftDeletes;
    /**
     * Get all of the comments for the Modalite
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function equipements(): HasMany
    {
        return $this->hasMany(Equipement::class); 
    }
}
  