<?php
/**
 * Created by PhpStorm.
 * User: SzL
 * Date: 2016. 11. 06.
 * Time: 21:20
 */

namespace MarkDownConverter\Tests\TagReplacer;

use MarkDownConverter\TagReplacer\TagReplacerCreator;

class TagReplacerCreatorTest extends \PHPUnit_Framework_TestCase
{
    /** @var TagReplacerCreator object */
    protected $object;

    protected $availableTagReplacerList = array(
        'Image',
        'Italic',
        'Link',
        'Pre',
        'Strong'
    );

    public function setUp()
    {
        $this->object = new TagReplacerCreator();
    }

    public function testCreate()
    {
        foreach ($this->availableTagReplacerList as $tagReplacerName) {
            $this->assertInstanceOf(
                'MarkDownConverter\TagReplacer\Replacer\ITagReplacer',
                $this->object->create($tagReplacerName)
            );
        }
    }
}
