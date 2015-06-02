<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {

    protected $table = 'posts';
    protected $fillable = array('name', 'category_id', 'content', 'user_id');

    public function tags()
    {
        return $this->belongsToMany('App\Tag', 'tag_to_post', 'post_id', 'tag_id');
    }

}
