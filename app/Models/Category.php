<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The table define category model
     */
    protected $table = 'categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'introduce', 'image',
    ];
    /**
     * Create relationship to model post
     *
     * @return Relasionship
     */
    public function post()
    {
        return $this->hasMany('App\Models\Post');
    }
}
