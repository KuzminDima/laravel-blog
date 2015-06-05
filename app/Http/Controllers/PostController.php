<?php namespace App\Http\Controllers;

use App\Category;
use App\Http\Controllers\Controller;

use App\Services\Message;
use App\Services\Post;
use App\Tag;
use Illuminate\Http\Request;

class PostController extends Controller {


    public function __construct()
    {
        $this->middleware('auth', ['only' => 'create']);
    }

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Request $request, Post $post, Message $message)
	{
        if ($request->isMethod('post')) {
            $validator = $post->validator($request->all());

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator->errors());
            }

            $post->create($request->all());
            $message->success('Пост успешно создан');
        }

        return view('post/create', [ 'tags' => Tag::all() ]);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$breadCrumbs = [];
        $categories = [];

        $post = \App\Post::with(['tags', 'category'])
            ->whereId($id)
            ->first()
        ;

        if ($post && $post->category) {
            $categories = Category::getCategories($post->category->id);

            if ( ! $categories->count()) {
                $categories = Category::getCategories($post->category->getParentId());
            }

            $breadCrumbs = $post->category->ancestors()->get();
        }


        return view('post/show', [ 'post' => $post, 'categories' => $categories, 'active' => $post->category, 'breadCrumbs' => $breadCrumbs, ]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
