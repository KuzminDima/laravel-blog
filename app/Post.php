<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

/**
 * Class Post
 * @package App
 */
class Post extends Model {

    protected $table = 'posts';

    protected $fillable = array('name', 'category_id', 'content', 'user_id');

    /**
     * Tags
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany('App\Tag', 'tag_to_post', 'post_id', 'tag_id');
    }

    /**
     * Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

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
     * Find posts by id
     *
     * @param Category $category
     * @return mixed
     */
    public static function getPostsByCategory(Category $category)
    {
        $posts = self::with(['tags', 'category', 'user'])
            ->whereIn('category_id', function($query) use ($category) {
                $query->select('id')
                    ->from('categories')
                    ->where('_lft', '>=', $category->_lft)
                    ->where('_rgt', '<=', $category->_rgt)
                ;
            })
        ;

        return $posts;
    }

}
