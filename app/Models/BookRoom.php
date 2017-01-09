<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookRoom extends Model
{
    /**
    *The table define book_rooms model
    */
    protected $table = 'book_rooms';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'user_id', 'post_id',
    ];
    /**
     * Create relationship to model post
     *
     * @return Relasionship
     */
    public function post()
    {
        return $this->belongsTo('App\Models\Post');
    }
    /**
     * Create relationship to model user
     *
     * @return Relasionship
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
