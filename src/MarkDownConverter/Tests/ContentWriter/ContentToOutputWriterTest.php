<?php

namespace MarkDownConverter\Tests\ContentWriter;

use MarkDownConverter\ContentWriter\ContentToOutputWriter;

/**
 * Created by PhpStorm.
 * User: SzL
 * Date: 2016. 11. 06.
 * Time: 22:02
 */
class ContentToOutputWriterTest extends \PHPUnit_Framework_TestCase
{
    /** @var  ContentToOutputWriter */
    protected $object;

    public function setUp()
    {
        $this->object = new ContentToOutputWriter();
    }

    public function testWrite()
    {
        $content = 'Some converted content';
        $this->object->write(null, $content);
        $output = ob_get_contents();
        ob_clean();
        $this->assertEquals($content, $output);
    }
}
