<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\GumshoeRepository;
use Auth;

class FollowPostController extends Controller
{
    protected $gumshoeRepository;
    /**
     * Construct function
     *
     * @param GumshoeRepository $gumshoeRepository GumshoeRepository
     */
    public function __construct(GumshoeRepository $gumshoeRepository)
    {
        $this->gumshoeRepository = $gumshoeRepository;
    }

    /**
     * Save status follow by id post
     *
     * @param id $id id post
     *
     * @return text
     */
    public function follow($id)
    {
        $userId = $inputs['user_id'] = Auth::user()->id;
        $postId = $inputs['post_id'] = $id;
        $result = $this->gumshoeRepository->findById($userId, $postId);
        if (is_null($result)) {
            $this->gumshoeRepository->create($inputs);
             return "follow";
        } else {
            $this->gumshoeRepository->delete($result->id);
            return "unfollow";
        }
    }
}
