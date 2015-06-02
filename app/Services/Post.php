<?php namespace App\Services;

use App\Tag;
use Validator;
use Request;

class Post
{
    public function validator(array $data)
    {
        /**
         * Validate post data
         */
        return Validator::make($data, [
            'name' => 'required|max:255',
            'tags' => 'required',
            'content' => 'required|min:50',
        ]);
    }

    /**
     * Create post
     *
     * @param array $data
     * @return array
     */
    public function create(array $data)
    {
        $post = \App\Post::create([
            'name' => $data['name'],
            'category_id' => $data['category_id'],
            'content' => $data['content'],
            'user_id' => Request::user()->id
        ]);

        $tags = [];
        foreach ($data['tags'] as $tag) {
            $tags[] = Tag::firstOrCreate(['name' => $tag]);
        }

        return $post->tags()->saveMany($tags);
    }
}