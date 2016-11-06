<?php
/**
 * Created by PhpStorm.
 * User: SzL
 * Date: 2016. 11. 06.
 * Time: 21:59
 */

namespace MarkDownConverter\ContentWriter;

class ContentToFileWriter implements IContentWriter
{
    public function write($to, $content)
    {
        file_put_contents($to, $content);
    }
}
