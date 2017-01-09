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
        'id', 'title', 'description', 'acrege', 'address', 'category_id',
    ];
    /**
     * [relation with category model]
     *
     * @return [type] [table category]
     */
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
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
    /**
     * [relation with image model]
     *
     * @return [type] [table image]
     */
    public function image()
    {
        return $this->hasMany('App\Models\Image');
    }
    /**
     * [relation with comment model]
     *
     * @return [type] [table comment]
     */
    public function comment()
    {
        return $this->hasMany('App\Models\Comment');
    }
    /**
     * [relation with gumshoe model]
     *
     * @return [type] [table gumshoe]
     */
    public function gumshoe()
    {
        return $this->hasMany('App\Models\Gumshoe');
    }
    /**
     * [relation with book_room model]
     *
     * @return [type] [table book_room]
     */
    public function bookRoom()
    {
        return $this->hasMany('App\Models\BookRoom');
    }
    /**
     * [relation with visitor_book_room model]
     *
     * @return [type] [table visitor_book_room]
     */
    public function visitorBookRoom()
    {
        return $this->hasMany('App\Models\VisitorBookRoom');
    }
}
