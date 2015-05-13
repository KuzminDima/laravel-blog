<?php namespace App;

use Kalnoy\Nestedset\Node;

class Category extends Node {

    protected $table = 'categories';

    public $timestamps = false;

    /**
     * Get categories
     *
     * @param null $root
     * @return mixed
     */
    public static function getCategories($root = null)
    {
        if ( ! $root) {
            return self::whereNull('parent_id')
                ->orderBy('name')
                ->get();
        }

        return self::where('parent_id', '=', $root)
            ->orderBy('name')
            ->get();
    }
}
