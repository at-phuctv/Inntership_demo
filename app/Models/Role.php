<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * The table define role model
     */
    protected $table = 'roles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'role',
    ];
    /**
     * Create relationship to model user
     *
     * @return Relasionship
     */
    public function user()
    {
        return $this->hasMany('App\Models\User');
    }
}
