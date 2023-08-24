<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Accessoire extends Model
{
    protected $primaryKey = 'id_accessoire';
    use SoftDeletes;
    /**
     * Get the modalite that owns the Equipement
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function equipement(): BelongsTo
    {
        return $this->belongsTo(equipement::class, 'equipement_id');
    }
}
