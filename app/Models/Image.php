<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
  
    /**
     * The table define image model
     */
    protected $table = 'images';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'image_name', 'post_id',
    ];
    /**
     * [relation with post model]
     *
     * @return [type] [table post]
     */
    public function post()
    {
        return $this->belongsTo('App\Models\Post');
    }
}
