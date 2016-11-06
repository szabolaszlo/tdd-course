<?php

namespace MarkDownConverter\Tests;

use MarkDownConverter\ContentWriter\ContentToFileWriter;
use MarkDownConverter\ContentWriter\ContentToOutputWriter;
use MarkDownConverter\MarkDownConverter;
use MarkDownConverter\SourceReader\TextFileReader;
use MarkDownConverter\TagReplacer\TagReplacerCreator;
use MarkDownConverter\TagReplacer\TagReplacerRegistry;

/**
 * Created by PhpStorm.
 * User: SzL
 * Date: 2016. 11. 06.
 * Time: 22:56
 */
class MarkDownConverterTest extends \PHPUnit_Framework_TestCase
{
    /** @var  MarkDownConverter */
    protected $object;

    /** @var  TagReplacerRegistry */
    protected $tagReplacerRegistry;

    /**
     * @var string
     */
    const PATH = __DIR__ . DIRECTORY_SEPARATOR;

    public function setUp()
    {
        $tagReplacerCreator = new TagReplacerCreator();
        $this->tagReplacerRegistry = new TagReplacerRegistry($tagReplacerCreator);
    }

    public function testConvertToFile()
    {
        $reader = new TextFileReader();
        $writer = new ContentToFileWriter();

        $this->object = new MarkDownConverter($reader, $writer, $this->tagReplacerRegistry);
        
        $inputFile = self::PATH . 'input_text.txt';
        $outputFile = self::PATH . 'output_text.txt';

        $this->object->convert($inputFile, $outputFile);

        $expected = 'This <strong>is</strong> simple <i><a href="http://index.hu">link</a></i> and this is a picture<img scr="http://valami.hu/image.jp" alt="of a dog" />.';
        $actual = file_get_contents($outputFile);

        unlink($outputFile);

        $this->assertEquals($expected, $actual);
    }

    public function testConvertToOutputString()
    {
        $reader = new TextFileReader();
        $writer = new ContentToOutputWriter();

        $this->object = new MarkDownConverter($reader, $writer, $this->tagReplacerRegistry);

        $inputFile = self::PATH . 'input_text.txt';

        $this->object->convert($inputFile, null);

        $expected = 'This <strong>is</strong> simple <i><a href="http://index.hu">link</a></i> and this is a picture<img scr="http://valami.hu/image.jp" alt="of a dog" />.';
        $actual = ob_get_contents();
        ob_clean();

        $this->assertEquals($expected, $actual);
    }


}
