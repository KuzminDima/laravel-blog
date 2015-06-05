<?php namespace App\Http\Controllers;

use App\Category;
use App\Post;

class HomeController extends Controller {

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
        $rootCategories = Category::getCategories();
        $lastPosts = Post::with(['tags', 'category'])
            ->get()
            ->sortBy('created_at', null, true)
            ->take(6);

        return view('home', [ 'rootCategories' => $rootCategories, 'lastPosts' => $lastPosts ]);
	}

}
