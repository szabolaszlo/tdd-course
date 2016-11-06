<?php

namespace MarkDownConverter;

use MarkDownConverter\ContentWriter\IContentWriter;
use MarkDownConverter\SourceReader\ISourceReader;
use MarkDownConverter\TagReplacer\Replacer\ITagReplacer;
use MarkDownConverter\TagReplacer\TagReplacerRegistry;

/**
 * Created by PhpStorm.
 * User: SzL
 * Date: 2016. 11. 06.
 * Time: 15:41
 */
class MarkDownConverter
{
    /** @var  ISourceReader */
    protected $reader;

    /** @var  IContentWriter */
    protected $writer;

    /** @var  TagReplacerRegistry */
    protected $tagReplacerRegistry;

    /**
     * MarkDownConverter constructor.
     * @param ISourceReader $reader
     * @param IContentWriter $writer
     * @param TagReplacerRegistry $tagReplacerRegistry
     */
    public function __construct(
        ISourceReader $reader,
        IContentWriter $writer,
        TagReplacerRegistry $tagReplacerRegistry
    )
    {
        $this->reader = $reader;
        $this->writer = $writer;
        $this->tagReplacerRegistry = $tagReplacerRegistry;
    }


    public function convert($from, $to)
    {
        $content = $this->reader->getContent($from);

        /** @var ITagReplacer $tagReplacer */
        foreach ($this->tagReplacerRegistry->getAllTagReplacer() as $tagReplacer){
            $content = $tagReplacer->replace($content);
        }
        
        $this->writer->write($to, $content);
    }
}
