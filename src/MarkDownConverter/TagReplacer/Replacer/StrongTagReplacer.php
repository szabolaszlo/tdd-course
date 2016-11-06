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
        $pattern = '/\*{2}(.*)\*{2}/U';
        $replacement = '<strong>$1</strong>';
        return preg_replace($pattern, $replacement, $content);
    }
}
