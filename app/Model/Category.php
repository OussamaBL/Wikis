<?php

namespace MVC\Model;
use MVC\Model\Crud;
class Category extends Crud
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
        return $this->selectAll("categories");
    }
    public function getInfos():void{
        $category= $this->select("categories",$this->id);
        $this->name=$category->name;
    }
    public function remove():void{
        $this->delete("categories",$this->id);
    }
    public function check_exist():?object{
        return $this->check_category($this->name);
    }
    public function add():void{
        $this->insert('categories',['name'=>$this->name]);
    }
    public function edit():void{
        $this->update('categories',$this->id,['name'=>$this->name]);
    }
    public function count_categories():int{
        return $this->categories_count();
    }

}