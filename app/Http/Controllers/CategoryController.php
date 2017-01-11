<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateCategory;
use App\Models\Category;
use App\Repositories\CategoryRepository;
use Session;

class CategoryController extends Controller
{

    protected $categoryRepository;

    /**
     * Constructor for category controller
     *
     * @param CategoryRepository $categoryRepository [description]
     */
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Get all Category
     *
     * @return List category index page.
     */
    public function index()
    {
        $listCate=$this->categoryRepository->paginate(config('constants.limit_category_six'));
        return view('category.index', compact('listCate'));
    }

    /**
     * Display create page.
     *
     * @return Page
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request Request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategory $request)
    {
        $input = $request->all();
        $input['image']=$this->categoryRepository->saveFile($input['image']);
        $this->categoryRepository->create($input);
        return redirect()->route('category.index');
    }
}
