<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Services\Comment;
use App\Services\Message;
use Illuminate\Http\Request;

class CommentController extends Controller {

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
	public function create(Request $request, Comment $comment, Message $message)
	{
        if ($request->isMethod('post')) {
            $validator = $comment->validator($request->all());

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator->errors());
            }

            $comment->create($request->all());
            $message->success('Комментарий успешно добавлен');

            return redirect('post/show/' . $request->get('post_id'));
        }

        $message->danger('Ошибка сервера');
        return redirect('/');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
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
