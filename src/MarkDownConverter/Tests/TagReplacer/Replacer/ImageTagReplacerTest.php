<?php
/**
 * Created by PhpStorm.
 * User: SzL
 * Date: 2016. 11. 06.
 * Time: 20:32
 */

namespace MarkDownConverter\Tests\TagReplacer\Replacer;


use MarkDownConverter\TagReplacer\Replacer\ImageTagReplacer;

class ImageTagReplacerTest extends \PHPUnit_Framework_TestCase
{
    /** @var  ImageTagReplacer */
    protected $object;

    public function setUp()
    {
        $this->object = new ImageTagReplacer();
    }

    public function testReplaceContentWithAverageSting()
    {
        $content = 'This is an ![http://www.valami.hu/image.jpg](ImageAlt) image in a string';
        $expected = 'This is an <img scr="http://www.valami.hu/image.jpg" alt="ImageAlt" /> image in a string';

        $this->assertEquals($expected, $this->object->replace($content));
    }

    public function testReplaceContentWithTwoReplaceAbleString()
    {
        $content = 'This is an ![http://www.valami.hu/image.jpg](ImageAlt) image in a string and other image ![http://www.valami.hu/image2.jpg](ImageAlt2)';
        $expected = 'This is an <img scr="http://www.valami.hu/image.jpg" alt="ImageAlt" /> image in a string and other image <img scr="http://www.valami.hu/image2.jpg" alt="ImageAlt2" />';

        $this->assertEquals($expected, $this->object->replace($content));
    }

    public function testReplaceContentWithConfuseReplaceAbleString()
    {
        $content = 'There is a !![http://www.valami.hu/image.jpg](solid(ImageAlt)) in a string';
        $expected = 'There is a !<img scr="http://www.valami.hu/image.jpg" alt="solid(ImageAlt" />) in a string';

        $this->assertEquals($expected, $this->object->replace($content));
    }

    public function testReplaceContentWithEmptyString()
    {
        $content = '';
        $expected = '';

        $this->assertEquals($expected, $this->object->replace($content));
    }
}
