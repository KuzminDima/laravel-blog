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

    /**
     * Render tree view
     *
     * @param $openTag
     * @param $closeTag
     * @param callable $render
     * @return string
     */
    public static function render($openTag, $closeTag, Callable $render)
    {
        $html = '';
        $level = 0;
        $categories = self::all()->toTree();

        if ($categories->count()) {
            foreach ($categories as $category) {
                $html .= self::renderNode($category, $render, $level);
            }
        }

        return $openTag . $html . $closeTag;
    }

    /**
     * Render tree node
     *
     * @param $node
     * @param callable $render
     * @return string
     */
    public static function renderNode($node, Callable $render, $level)
    {
        $html = $render($node, $level);
        $level++;

        if (isset($node['children'])) {
            foreach ($node['children'] as $child) {
                $html .= self::renderNode($child, $render, $level);
            }
        }

        return $html;
    }

}
