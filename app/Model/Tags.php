<?php

namespace MVC\Model;
use MVC\Model\Crud;
class Tags extends Crud
{
    private int $id;
    private string $name;

    /**
     * @param int $id
     * @param string $name
     */
    public function __construct(string $name="",int $id=0)
    {
        parent::__construct();
        $this->id = $id;
        $this->name = $name;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }
    public function getAll():array{
        return $this->selectAll("tags");
    }
    public function check_exist():?object{
        return $this->check_tag($this->name);
    }
    public function add():void{
        $this->insert('tags',['name'=>$this->name]);
    }
    public function remove():void{
        $this->delete("tags",$this->id);
    }
    public function getInfos():void{
        $tag= $this->select("tags",$this->id);
        $this->name=$tag->name;
    }
    public function edit():void{
        $this->update('tags',$this->id,['name'=>$this->name]);
    }
}