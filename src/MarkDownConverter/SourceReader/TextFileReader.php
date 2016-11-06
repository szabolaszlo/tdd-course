<?php

namespace MarkDownConverter\SourceReader;

/**
 * Created by PhpStorm.
 * User: SzL
 * Date: 2016. 11. 06.
 * Time: 15:05
 */
class TextFileReader implements ISourceReader
{
    public function getContent($from)
    {
        return (is_file($from))
            ? file_get_contents($from)
            : '';
    }
}
