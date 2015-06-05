<?php namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Config;

class CategoryController extends Controller {

	public function index(Category $category)
	{
        $categories = Category::getCategories($category->id);

        if ( ! $categories->count()) {
            $categories = Category::getCategories($category->getParentId());
        }

        $breadCrumbs = $category->ancestors()->get();

        $posts = Post::getPostsByCategory($category);

        return view('category', [
            'categories' => $categories,
            'active' => $category,
            'breadCrumbs' => $breadCrumbs,
            'posts' => $posts->paginate(Config::get('constants.pageSize'))
        ]);
	}
}
