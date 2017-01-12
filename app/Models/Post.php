<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * The table define post model
     */
    protected $table = 'posts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'title', 'description', 'acrege', 'address', 'city', 'category_id',
    ];
    /**
     * Create relationship to model category
     *
     * @return Relasionship
     */
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
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
    /**
     * Create relationship to model image
     *
     * @return Relasionship
     */
    public function image()
    {
        return $this->hasMany('App\Models\Image');
    }
    /**
     * Create relationship to model coment
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
     * Create relationship to model bookRoom
     *
     * @return Relasionship
     */
    public function bookRoom()
    {
        return $this->hasMany('App\Models\BookRoom');
    }
    /**
     * Create relationship to model visitorBookRoom
     *
     * @return Relasionship
     */
    public function visitorBookRoom()
    {
        return $this->hasMany('App\Models\VisitorBookRoom');
    }
}
