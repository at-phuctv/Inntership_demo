<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'email', 'image', 'password', 'address', 'phone', 'gender', 'role_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Create relationship to model comment
     *
     * @return Relasionship
     */
    public function comment()
    {
        return $this->hasMany('App\Models\Comment');
    }

    /**
     * Create relationship to model gumshoe
     *
     * @return Relasionship
     */
    public function gumshoe()
    {
        return $this->hasMany('App\Models\Gumshoe');
    }

    /**
     * Create relationship to model book_room
     *
     * @return Relasionship
     */
    public function bookRoom()
    {
        return $this->hasMany('App\Models\BookRoom');
    }

    /**
     * Create relationship to model comment
     *
     * @return Relasionship
     */
    public function role()
    {
        return $this->belongsTo('App\Models\Role');
    }
}
