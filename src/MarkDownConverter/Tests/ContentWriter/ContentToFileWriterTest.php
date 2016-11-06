<?php
/**
 * Created by PhpStorm.
 * User: SzL
 * Date: 2016. 11. 06.
 * Time: 22:06
 */

namespace MarkDownConverter\Tests\ContentWriter;


use MarkDownConverter\ContentWriter\ContentToFileWriter;

class ContentToFileWriterTest extends \PHPUnit_Framework_TestCase
{
    /** @var  ContentToFileWriter */
    protected $object;

    public function setUp()
    {
        $this->object = new ContentToFileWriter();
    }

    public function testWrite()
    {
        $content = 'Some converted content';
        $file = __DIR__ . DIRECTORY_SEPARATOR . 'test.txt';
        $this->object->write($file, $content);

        $fileContent = file_get_contents($file);

        $this->assertEquals($fileContent, $content);

        unlink($file);
    }
}
