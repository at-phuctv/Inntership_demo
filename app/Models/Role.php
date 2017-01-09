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
     * [relation with role model]
     *
     * @return [type] [table role]
     */
    public function user()
    {
        return $this->hasMany('App\Models\User');
    }
}
