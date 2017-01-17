<?php

namespace App\Repositories;

use App\Repositories\Repository;
use App\Repositories\InterfaceRepository;
use App\Models\Gumshoe;

class GumshoeRepository extends Repository implements InterfaceRepository
{
    /**
     * Constructor for gumshoerepository
     *
     * @param Gumshoe $gumshoe App\Models\Gumshoe
     */
    public function __construct(Gumshoe $gumshoe)
    {
        $this->model = $gumshoe;
    }

    /**
     * Find status follow post of user login
     *
     * @param user_id $user_id id user login
     * @param post_id $post_id id post
     *
     * @return colection
     */
    public function findById($userId, $postId)
    {
        return $this->model->where('user_id', $userId)
         ->where('post_id', $postId)->first();
    }
}
