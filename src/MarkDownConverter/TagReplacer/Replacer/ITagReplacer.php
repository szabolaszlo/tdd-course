<?php
/**
 * Created by PhpStorm.
 * User: SzL
 * Date: 2016. 11. 06.
 * Time: 19:33
 */

namespace MarkDownConverter\TagReplacer\Replacer;

interface ITagReplacer
{
    public function replace($content);
}
