<?php
/**
 * Created by PhpStorm.
 * User: SzL
 * Date: 2016. 11. 06.
 * Time: 21:29
 */

namespace MarkDownConverter\SourceReader;


interface ISourceReader
{
    public function getContent($from);
}
