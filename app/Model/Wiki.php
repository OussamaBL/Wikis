<?php

namespace MVC\Model;
use MVC\Model\User;
use MVC\Model\Crud;

class Wiki extends Crud
{
    private int $id;
    private string $title;
    private string $description;
    private User $user;
    private string $category;
    private string $image;

    public function __construct(User $user,string $title="", string $description="", string $category="", string $image="",int $id=0)
    {
        parent::__construct();
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->user = $user;
        $this->category = $category;
        $this->image = $image;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function setUser(User $user): void
    {
        $this->user = $user;
    }

    public function getCategory(): string
    {
        return $this->category;
    }

    public function setCategory(string $category): void
    {
        $this->category = $category;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function setImage(string $image): void
    {
        $this->image = $image;
    }
    public function getAll_pending():array{
        return $this->getPending_wikis();
    }
    public function reject():void{
        $this->update('wikis', $this->id, ['status' => "reject"]);
    }
    public function validate():void{
        $this->update('wikis', $this->id, ['status' => "validate"]);
    }
    public function count_posts():int{
        return $this->posts_count();
    }
    public function count_posts_pending():int{
        return $this->posts_pending_count();
    }


}