<?php

namespace MarkDownConverter\ContentWriter;
/**
 * Created by PhpStorm.
 * User: SzL
 * Date: 2016. 11. 06.
 * Time: 21:55
 */
interface IContentWriter
{
    public function write($to, $content);
}