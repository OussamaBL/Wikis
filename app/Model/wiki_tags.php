<?php

namespace MVC\Model;
use MVC\Model\Crud;

class wiki_tags extends Crud
{
    private int $id_wiki;
    private int $id_tag;

    public function getIdWiki(): int
    {
        return $this->id_wiki;
    }

    public function setIdWiki(int $id_wiki): void
    {
        $this->id_wiki = $id_wiki;
    }

    public function getIdTag(): int
    {
        return $this->id_tag;
    }

    public function setIdTag(int $id_tag): void
    {
        $this->id_tag = $id_tag;
    }


    public function __construct(int $id_wiki, int $id_tag)
    {
        parent::__construct();
        $this->id_wiki = $id_wiki;
        $this->id_tag = $id_tag;
    }
    public function add(): void
    {
        $this->insert('wiki_tags', ['id_wiki' => $this->id_wiki, 'id_tag' => $this->id_tag]);
    }


}