<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;



class Equipement extends Model
{
    
    protected $primaryKey = 'id_equipement';
    /**
     * Get all of the comments for the Equipement
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sousequipements(): HasMany
    {
        return $this->hasMany(Sousequipement::class); 
    }

 
    /**
     * Get all of the comments for the Equipement
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function accessoires(): HasMany
    {
        return $this->hasMany(Accessoire::class);
    }

    /** 
     * Get the modalite that owns the Equipement
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function modalite(): BelongsTo
    {
        return $this->belongsTo(Modalite::class,'modalite_id_modalite');  
    }

    /**  
     * Get the modalite that owns the Equipement
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class,'client_id_client');
    }

     /**
     * Obtient le contrat associé à l'équipement.
     */
    public function contrat()
    {
        return $this->hasOne(Contrat::class);
    }
  }

  

