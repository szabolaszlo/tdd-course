<?php
/**
 * Created by PhpStorm.
 * User: SzL
 * Date: 2016. 11. 06.
 * Time: 20:11
 */

namespace MarkDownConverter\Tests\TagReplacer\Replacer;


use MarkDownConverter\TagReplacer\Replacer\ItalicTagReplacer;

class ItalicTagReplacerTest extends \PHPUnit_Framework_TestCase
{
    /** @var  ItalicTagReplacer */
    protected $object;

    public function setUp()
    {
        $this->object = new ItalicTagReplacer();
    }

    public function testReplaceContentWithAverageSting()
    {
        $content = 'There is a _italic text_ in a string';
        $expected = 'There is a <i>italic text</i> in a string';

        $this->assertEquals($expected, $this->object->replace($content));
    }

    public function testReplaceContentWithTwoReplaceAbleString()
    {
        $content = 'There is a _strong text_ in a string and _other_ one';
        $expected = 'There is a <i>strong text</i> in a string and <i>other</i> one';

        $this->assertEquals($expected, $this->object->replace($content));
    }

    public function testReplaceContentWithConfuseReplaceAbleString()
    {
        $content = 'There is a __strong text__ in a string and other_not';
        $expected = 'There is a <i>_strong text_</i> in a string and other_not';

        $this->assertEquals($expected, $this->object->replace($content));
    }

    public function testReplaceContentWithEmptyString()
    {
        $content = '';
        $expected = '';

        $this->assertEquals($expected, $this->object->replace($content));
    }
}
