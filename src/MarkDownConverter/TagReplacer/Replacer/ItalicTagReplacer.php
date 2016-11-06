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
        $pattern = '/_{1}(.*)_{1}/U';
        $replacement = '<i>$1</i>';
        return preg_replace($pattern, $replacement, $content);
    }
}
