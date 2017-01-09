<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisitorBookRoom extends Model
{
    /**
     * The table define visitorbookroom model
     */
    protected $table = 'visitor_book_rooms';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'phone', 'email', 'address', 'post_id',
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
}
