<?php namespace App\Http\Controllers;

use App\Category;

class CategoryController extends Controller {

	public function index(Category $category)
	{
        $categories = Category::getCategories($category->id);

        if ( ! $categories->count()) {
            $categories = Category::getCategories($category->getParentId());
        }

        $breadCrumbs = $category->ancestors()->get();

        return view('category', [ 'categories' => $categories, 'active' => $category, 'breadCrumbs' => $breadCrumbs ]);
	}

}
