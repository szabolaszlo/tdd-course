<?php
/**
 * Created by PhpStorm.
 * User: SzL
 * Date: 2016. 11. 06.
 * Time: 20:51
 */

namespace MarkDownConverter\TagReplacer;


use MarkDownConverter\TagReplacer\Replacer\ITagReplacer;

class TagReplacerRegistry
{
    protected $availableTagReplacerList = array(
        'Image',
        'Italic',
        'Link',
        'Pre',
        'Strong'
    );

    protected $tagReplacers = array();

    /** @var  TagReplacerCreator */
    protected $tagReplacerCreator;

    public function __construct($tagReplacerCreator)
    {
        $this->tagReplacerCreator = $tagReplacerCreator;

        foreach ($this->availableTagReplacerList as $tagReplacerName) {
            $this->addTagReplacer($this->tagReplacerCreator->create($tagReplacerName));
        }
    }

    protected function addTagReplacer(ITagReplacer $tagReplacer)
    {
        $this->tagReplacers[] = $tagReplacer;
    }

    public function getAllTagReplacer()
    {
        return $this->tagReplacers;
    }
}
