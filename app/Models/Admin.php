<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class Admin extends Authenticatable
{   
   
    use HasFactory,HasApiTokens;
    
    

     /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        '_token',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function roles()
    {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }
}
