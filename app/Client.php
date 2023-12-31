<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes; 


class Client extends Model
{    
    use SoftDeletes;
    
    protected $primaryKey = 'id_client'; 
      /**
     * Get all of the comments for the clients
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function equipements(): HasMany
    {
        return $this->hasMany(Equipement::class);
    }

    /**
	 * Has Many Through relation
	 *
	 * @return Illuminate\Database\Eloquent\Relations\hasManyThrough
	 */
	public function sousequipements()
	{
		return $this->hasManyThrough('App\Models\Sousequipement', 'App\Models\Equipement');
	}
}
   