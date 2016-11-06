<?php
/**
 * Created by PhpStorm.
 * User: SzL
 * Date: 2016. 11. 06.
 * Time: 20:51
 */

namespace MarkDownConverter\Tests\TagReplacer;

use MarkDownConverter\TagReplacer\TagReplacerCreator;
use MarkDownConverter\TagReplacer\TagReplacerRegistry;

class TagReplacerRegistryTest extends \PHPUnit_Framework_TestCase
{
    /** @var  TagReplacerRegistry */
    protected $object;

    public function setUp()
    {
        /** @var TagReplacerCreator $tagReplacerCreator */
        $tagReplacerCreator = new TagReplacerCreator();
        $this->object = new TagReplacerRegistry($tagReplacerCreator);
    }

    public function testGetTagsReplacer()
    {
        $tagsReplacer = $this->object->getAllTagReplacer();

        foreach ($tagsReplacer as $tagReplacer){
            $this->assertInstanceOf('MarkDownConverter\TagReplacer\Replacer\ITagReplacer', $tagReplacer);
        }
    }
}
