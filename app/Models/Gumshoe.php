<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gumshoe extends Model
{
  
    /**
     * The table define category model
     */
    protected $table = 'gumshoes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'user_id', 'post_id',
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
    /**
     * [relation with user model]
     *
     * @return [type] [table user]
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
