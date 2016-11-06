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
        $pattern = '/`{1}(.*)`{1}/U';
        $replacement = '<pre>$1</pre>';
        return preg_replace($pattern, $replacement, $content);
    }
}
