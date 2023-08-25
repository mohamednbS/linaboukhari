<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes; 

class User extends Authenticatable
{

    
    protected $primaryKey = 'id_user';
     
    use Notifiable;
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
<<<<<<< HEAD
        'name', 'email', 'password','description','avatar','phone','birthdate','matricule','modalité','role'
=======
        'name', 'usermail', 'password','description','avatar','phone','birthdate','matricule','modalité','role'
>>>>>>> e121b86aa98783be36c6b4fe44980a592ea45271
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
