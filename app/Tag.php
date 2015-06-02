<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model {

    protected $table = 'tags';
    protected $fillable = array('name');

    public function posts()
    {
        $this->belongsToMany('App\Post', 'tag_to_post', 'tag_id', 'post_id');
    }

}
