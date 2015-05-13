<?php namespace App\Http\Controllers;

use App\Category;

class HomeController extends Controller {

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
        $rootCategories = Category::getCategories();

        return view('home', [ 'rootCategories' => $rootCategories ]);
	}

}
