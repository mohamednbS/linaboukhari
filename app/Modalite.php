<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Modalite extends Model
{    
    protected $primaryKey = 'id_modalite';
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
  