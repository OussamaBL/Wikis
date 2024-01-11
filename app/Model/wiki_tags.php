<?php

namespace MVC\Model;
use MVC\Model\Tags;
use MVC\Model\Wiki;

class wiki_tags
{
    private Wiki $wiki;
    private Tags $tag;

    /**
     * @param \MVC\Model\Wiki $wiki
     * @param \MVC\Model\Tags $tag
     */
    public function __construct(Wiki $wiki, Tags $tag)
    {
        parent::__construct();
        $this->wiki = $wiki;
        $this->tag = $tag;
    }

    public function getWiki(): Wiki
    {
        return $this->wiki;
    }

    public function setWiki(Wiki $wiki): void
    {
        $this->wiki = $wiki;
    }

    public function getTag(): Tags
    {
        return $this->tag;
    }

    public function setTag(Tags $tag): void
    {
        $this->tag = $tag;
    }

}