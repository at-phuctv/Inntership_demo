<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CategoryRepository;
use App\Repositories\PostRepository;
use DB;

class HomeController extends Controller
{

    protected $categoryRepository;

    protected $postRepository;

    /**
     * Constructor for category controller
     *
     * @param CategoryRepository $categoryRepository CategoryRepository
     * @param PostRepository     $postRepository     PostRepository
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
        $listSearchPrice=DB::table('search_prices')->get();
        $listPriceStart=$listPriceEnd=array();
        foreach ($listSearchPrice as $value) {
            $listPriceStart[$value->id]=$listPriceEnd[$value->id]=$value->search_price;
        }
        asort($listPriceStart);
        array_pop($listPriceStart);
        arsort($listPriceEnd);
        array_pop($listPriceEnd);
        $listCate=$this->categoryRepository->paginate(config('constants.limit_category_six'));
        $listCity=DB::table('cities')->get();
        return view('home', compact('listCate', 'listPost', 'listPriceStart', 'listPriceEnd', 'listCity'));
    }
    /**
     * Search post with keywork
     *
     * @param Request $request Request
     *
     * @return Colection
     */
    public function search(Request $request)
    {
        $category=$request->category;
        $priceStart=$request->start_price;
        $priceEnd=$request->end_price;
        $city=$request->city;
        return $this->postRepository->searchList($category, $priceStart, $priceEnd, $city)->paginate(config('constants.limit_post'));
    }
}
