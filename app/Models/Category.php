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
     * [relation with post model]
     *
     * @return [type] [table post]
     */
    public function post()
    {
        return $this->hasMany('App\Models\Post');
    }
}
