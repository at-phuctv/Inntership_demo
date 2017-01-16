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
}
