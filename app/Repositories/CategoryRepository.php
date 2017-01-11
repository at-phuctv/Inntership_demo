<?php

namespace App\Repositories;

use App\Repositories\Repository;
use App\Repositories\InterfaceRepository;
use App\Models\Category;
use Carbon\Carbon;

class CategoryRepository extends Repository implements InterfaceRepository
{
    /**
     * Constructor for category repository
     *
     * @param Category $category App\Models\Category
     */
    public function __construct(Category $category)
    {
        $this->model = $category;
    }

    /**
    * Method save  file into folder
    *
    * @param file $file file get from form.
    *
    * @return picture name to save into database
    */
    public function saveFile($file)
    {
        $now = Carbon::now();
        $image = $now->toDateTimeString().$file->getClientOriginalName();
        $path=config('upload.category_image');
        $file->move($path, $image);
        return $image;
    }
}
