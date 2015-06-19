<?php namespace App\Services;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;

class Comment
{
    public function validator(array $data)
    {
        /**
         * Validate post data
         */
        return Validator::make($data, [
            'comment' => 'required|max:255',
            'post_id' => 'required',
        ]);
    }

    /**
     * Create comment
     *
     * @param  array  $data
     * @return User
     */
    public function create(array $data)
    {
        return \App\Comment::create([
            'user_id' => Request::user()->id,
            'post_id' => $data['post_id'],
            'comment' => $data['comment'],
        ]);
    }
}