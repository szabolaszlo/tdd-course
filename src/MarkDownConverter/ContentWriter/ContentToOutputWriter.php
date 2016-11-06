<?php
/**
 * Created by PhpStorm.
 * User: SzL
 * Date: 2016. 11. 06.
 * Time: 22:00
 */

namespace MarkDownConverter\ContentWriter;


class ContentToOutputWriter implements IContentWriter
{
    public function write($to, $content)
    {
        echo $content;
    }
}
