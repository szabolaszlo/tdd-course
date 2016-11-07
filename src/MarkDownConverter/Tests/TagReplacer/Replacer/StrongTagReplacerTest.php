<?php

namespace MarkDownConverter\Tests\TagReplacer;

use MarkDownConverter\TagReplacer\Replacer\StrongTagReplacer;

/**
 * Created by PhpStorm.
 * User: SzL
 * Date: 2016. 11. 06.
 * Time: 19:29
 */
class StrongTagReplacerTest extends \PHPUnit_Framework_TestCase
{
    /** @var  StrongTagReplacer */
    protected $object;

    public function setUp()
    {
        $this->object = new StrongTagReplacer();
    }

    public function testReplaceContentWithAverageSting()
    {
        $content = 'There is a **strong text** in a string';
        $expected = 'There is a <strong>strong text</strong> in a string';

        $this->assertEquals($expected, $this->object->replace($content));
    }

    public function testReplaceContentWithTwoReplaceAbleString()
    {
        $content = 'There is a **strong text** in a string and **other** one';
        $expected = 'There is a <strong>strong text</strong> in a string and <strong>other</strong> one';

        $this->assertEquals($expected, $this->object->replace($content));
    }

    public function testReplaceContentWithConfuseReplaceAbleString()
    {
        $content = 'There is a ****strong text**** in a string and ***other*** one';
        $expected = 'There is a <strong>**strong text**</strong> in a string and <strong>*other*</strong> one';

        $this->assertEquals($expected, $this->object->replace($content));
    }

    public function testReplaceContentWithEmptyString()
    {
        $content = '';
        $expected = '';

        $this->assertEquals($expected, $this->object->replace($content));
    }
}
