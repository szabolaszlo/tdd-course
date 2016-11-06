<?php
/**
 * Created by PhpStorm.
 * User: SzL
 * Date: 2016. 11. 06.
 * Time: 20:18
 */

namespace MarkDownConverter\Tests\TagReplacer\Replacer;


use MarkDownConverter\TagReplacer\Replacer\LinkTagReplacer;

class LinkTagReplacerTest extends \PHPUnit_Framework_TestCase
{
    /** @var  LinkTagReplacer */
    protected $object;

    public function setUp()
    {
        $this->object = new LinkTagReplacer();
    }

    public function testReplaceContentWithAverageSting()
    {
        $content = 'There is a [http://www.google.hu](Google link) in a string';
        $expected = 'There is a <a href="http://www.google.hu">Google link</a> in a string';

        $this->assertEquals($expected, $this->object->replace($content));
    }

    public function testReplaceContentWithTwoReplaceAbleString()
    {
        $content = 'There is a [http://www.google.hu](Google link) and a [http://www.innonic.com](Innonic Link) in a string';
        $expected = 'There is a <a href="http://www.google.hu">Google link</a> and a <a href="http://www.innonic.com">Innonic Link</a> in a string';

        $this->assertEquals($expected, $this->object->replace($content));
    }

    public function testReplaceContentWithConfuseReplaceAbleString()
    {
        $content = 'There is a [http://www.google.hu](solid(Google link)) in a string';
        $expected = 'There is a <a href="http://www.google.hu">solid(Google link</a>) in a string';

        $this->assertEquals($expected, $this->object->replace($content));
    }

    public function testReplaceContentWithEmptyString()
    {
        $content = '';
        $expected = '';

        $this->assertEquals($expected, $this->object->replace($content));
    }
}
