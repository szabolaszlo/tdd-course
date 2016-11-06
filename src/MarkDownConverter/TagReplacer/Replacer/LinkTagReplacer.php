<?php
/**
 * Created by PhpStorm.
 * User: SzL
 * Date: 2016. 11. 06.
 * Time: 20:15
 */

namespace MarkDownConverter\TagReplacer\Replacer;


class LinkTagReplacer implements ITagReplacer
{
    public function replace($content)
    {
        $pattern = '/\[(.*)\]\((.*)\)/U';
        $replacement = '<a href="$1">$2</a>';
        return preg_replace($pattern, $replacement, $content);
    }
}
