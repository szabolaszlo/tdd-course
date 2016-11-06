<?php

namespace MarkDownConverter\Tests\SourceReader;

use MarkDownConverter\SourceReader\TextFileReader;

/**
 * Created by PhpStorm.
 * User: SzL
 * Date: 2016. 11. 06.
 * Time: 21:35
 */
class TextFileReaderTest extends \PHPUnit_Framework_TestCase
{
    /** @var  TextFileReader */
    protected $object;

    protected $from = __DIR__ . DIRECTORY_SEPARATOR . 'test.txt';

    public function setUp()
    {
        $this->object = new TextFileReader();
    }

    public function testGetContentWithNoFile()
    {
        $this->assertEquals('', $this->object->getContent(null));
    }

    public function testGetContentWithTextFile()
    {
        $this->assertEquals('This is a plain text', $this->object->getContent($this->from));
    }
}
