<?php
/**
 * Created by PhpStorm.
 * User: SzL
 * Date: 2016. 11. 06.
 * Time: 20:02
 */

namespace MarkDownConverter\Tests\TagReplacer\Replacer;

use MarkDownConverter\TagReplacer\Replacer\PreTagReplacer;

class PreTagReplacerTest extends \PHPUnit_Framework_TestCase
{
    /** @var  PreTagReplacer */
    protected $object;

    public function setUp()
    {
        $this->object = new PreTagReplacer();
    }

    public function testReplaceContentWithAverageSting()
    {
        $content = 'There is a `pre text` in a string';
        $expected = 'There is a <pre>pre text</pre> in a string';

        $this->assertEquals($expected, $this->object->replace($content));
    }

    public function testReplaceContentWithTwoReplaceAbleString()
    {
        $content = 'There is a `pre text` in a string and `other` one';
        $expected = 'There is a <pre>pre text</pre> in a string and <pre>other</pre> one';

        $this->assertEquals($expected, $this->object->replace($content));
    }

    public function testReplaceContentWithConfuseReplaceAbleString()
    {
        $content = 'There is a ``pre text`` in a string and ```other``` one and `not';
        $expected = 'There is a <pre></pre>pre text<pre></pre> in a string and <pre></pre><pre>other</pre><pre></pre> one and `not';

        $this->assertEquals($expected, $this->object->replace($content));
    }

    public function testReplaceContentWithEmptyString()
    {
        $content = '';
        $expected = '';

        $this->assertEquals($expected, $this->object->replace($content));
    }
}
