<?php namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Comment
 * @package App
 */
class Comment extends Model {

    protected $table = 'comments';

    protected $fillable = array('name', 'post_id', 'comment', 'user_id');

    /**
     * User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function post()
    {
        return $this->belongsTo('App\Post');
    }

    /**
     * Find comments by post
     *
     * @param Post $post
     * @return mixed
     */
    public static function findCommentsByPost(Post $post)
    {
        $comments = self::with('user')
            ->where('post_id', '=', $post->id)
            ->get()
        ;

        return $comments->sortByDesc('created_at');
    }
}
