<?php

namespace MarkDownConverter\TagReplacer\Replacer;

/**
 * Created by PhpStorm.
 * User: SzL
 * Date: 2016. 11. 06.
 * Time: 19:32
 */
class StrongTagReplacer implements ITagReplacer
{
    public function replace($content)
    {
        $pattern = '/(^|\s|>|\b)[*]{2}(?=\S)([\s\S]+?)[*]{2}(?=\b|<|\s|$)/';
        $replacement = '$1<strong>$2</strong>';
        return preg_replace($pattern, $replacement, $content);
    }
}
