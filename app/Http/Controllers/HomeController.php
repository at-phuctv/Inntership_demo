<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CategoryRepository;
use App\Repositories\PostRepository;

class HomeController extends Controller
{

    protected $categoryRepository;

    protected $postRepository;

    /**
     * Constructor for category controller
     *
     * @param CategoryRepository $categoryRepository [description]
     * @param PostRepository     $postRepository     [description]
     */
    public function __construct(CategoryRepository $categoryRepository, PostRepository $postRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->postRepository = $postRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listPost=$this->postRepository->listPost();
        $listCate=$this->categoryRepository->paginate(config('constants.limit_category_six'));
        return view('home', compact('listCate', 'listPost'));
    }
}
