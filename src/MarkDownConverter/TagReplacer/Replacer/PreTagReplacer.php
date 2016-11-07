<?php
/**
 * Created by PhpStorm.
 * User: SzL
 * Date: 2016. 11. 06.
 * Time: 19:58
 */

namespace MarkDownConverter\TagReplacer\Replacer;


class PreTagReplacer implements ITagReplacer
{
    public function replace($content)
    {
        $pattern = '/(^|\s|>|\b)`(?=\S)([\s\S]+?)`(?=\b|<|\s|$)/';
        $replacement = '$1<pre>$2</pre>';
        return preg_replace($pattern, $replacement, $content);
    }
}
