<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SearchPrice extends Model
{
    /**
     * The table define search_price model
     */
    protected $table = 'search_prices';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'search_price',
    ];
}
