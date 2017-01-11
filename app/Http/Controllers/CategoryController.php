<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateCategory;
use App\Http\Requests\EditCategory;
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
        $listCate=$this->categoryRepository->paginate(config('constants.limit_category_sex'));
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

    /**
     * Display the specified resource.
     *
     * @param int $id Integer
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = $this->categoryRepository->find($id);
        return view('category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id Integer
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = $this->categoryRepository->find($id);
        return view('category.edit', compact('category'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request Request
     * @param int                      $id      Integer
     *
     * @return \Illuminate\Http\Response
     */
    public function update(EditCategory $request, $id)
    {
        $category=$this->categoryRepository->find($id);

        if (empty($category)) {
            return redirect()->route('category.index');
        }
        $input = $request->only('name', 'introduce', 'image');
        if ($request->hasFile('image')) {
            $input['image']=$this->categoryRepository->saveFile($request->file('image'));
            $pathImageOld = $category->image;
            if (file_exists(config('upload.category_image').DIRECTORY_SEPARATOR.$pathImageOld) == true) {
                unlink(config('upload.category_image').DIRECTORY_SEPARATOR.$pathImageOld);
            }
        }
        $this->categoryRepository->update($input, $id);
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id Integer
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->categoryRepository->delete($id);
        return redirect()->back();
    }
}
