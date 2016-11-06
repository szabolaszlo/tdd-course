<?php
/**
 * Created by PhpStorm.
 * User: SzL
 * Date: 2016. 11. 06.
 * Time: 21:03
 */

namespace MarkDownConverter\TagReplacer;


class TagReplacerCreator
{
    public function create($replacerName)
    {
        $replacerClassName = 'MarkDownConverter\TagReplacer\Replacer\\' . $replacerName . 'TagReplacer';
        $replacer = new $replacerClassName();
        return $replacer;
    }
}