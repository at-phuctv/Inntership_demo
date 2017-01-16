<?php

namespace App\Repositories;

use App\Repositories\Repository;
use App\Repositories\InterfaceRepository;
use App\Models\Post;

class PostRepository extends Repository implements InterfaceRepository
{
    /**
     * Constructor for post repository
     *
     * @param Post $post App\Models\Post
     */
    public function __construct(Post $post)
    {
        $this->model = $post;
    }
    /**
     * Get list posts news
     *
     * @return Colection
     */
    public function listPost()
    {
        return $this->model->with('image')
        ->orderBy('created_at', 'DESC')->get();
    }
    /**
     * List all post of search.
     *
     * @param category   $category   category
     * @param priceStart $priceStart priceStart
     * @param priceEnd   $priceEnd   priceEnd
     * @param city       $city       city
     *
     * @return Colection
     */
    public function searchList($category, $priceStart, $priceEnd, $city)
    {
        $result = $this->model->with('image')
        ->with('category')
        ->where('price', '>=', $priceStart)
        ->where('price', '<=', $priceEnd);
        if (empty($category) and empty($city)) {
            return $result;
        } else {
            if (!empty($category) and !empty($city)) {
                return $result
                ->where('city', $city)
                ->whereHas('category', function ($query) use ($category) {
                    $query->where('id', $category);
                });
            } else {
                if (empty($category)) {
                    return $result->where('city', $city);
                } else {
                    return $result
                    ->whereHas('category', function ($query) use ($category) {
                        $query->where('id', $category);
                    });
                }
            }
        }
    }
}
