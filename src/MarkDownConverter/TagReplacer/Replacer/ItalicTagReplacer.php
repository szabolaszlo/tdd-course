<?php
/**
 * Created by PhpStorm.
 * User: SzL
 * Date: 2016. 11. 06.
 * Time: 20:09
 */

namespace MarkDownConverter\TagReplacer\Replacer;


class ItalicTagReplacer implements ITagReplacer
{
    public function replace($content)
    {
        $pattern = '/(^|\s|>|\b)_(?=\S)([\s\S]+?)_(?=\b|<|\s|$)/';
        $replacement = '$1<i>$2</i>';
        return preg_replace($pattern, $replacement, $content);
    }
}
