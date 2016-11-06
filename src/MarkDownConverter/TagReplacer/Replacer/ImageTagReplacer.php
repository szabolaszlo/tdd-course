<?php
/**
 * Created by PhpStorm.
 * User: SzL
 * Date: 2016. 11. 06.
 * Time: 20:30
 */

namespace MarkDownConverter\TagReplacer\Replacer;


class ImageTagReplacer implements ITagReplacer
{
    public function replace($content)
    {
        $pattern = '/!\[(.*)\]\((.*)\)/U';
        $replacement = '<img scr="$1" alt="$2" />';
        return preg_replace($pattern, $replacement, $content);
    }
}
