<?php

namespace App\Http\Controllers\API;

//use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\GumshoeRepository;
use Request;
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
     * @param requets $requets requets post
     *
     * @return text
     */
    public function follow(Request $requets)
    {
        if ($requets::ajax()) {
            $id=$requets::input('id');
        }
        if (empty($id) or  !is_numeric($id)) {
            return config('constants.not_follows');
        }
        $inputs['user_id'] = Auth::user()->id;
        $inputs['post_id'] = $id;
        $result = $this->gumshoeRepository->findById($inputs['user_id'], $inputs['post_id']);
        if (is_null($result)) {
            $this->gumshoeRepository->create($inputs);
            return config('constants.follow');
        } else {
            $this->gumshoeRepository->delete($result->id);
            return config('constants.unfollow');
        }
    }
}
