<?php

namespace MVC\Model;
use MVC\Model\User;
class Wiki
{
    private int $id;
    private string $title;
    private string $description;
    private User $user;
    private string $category;
    private string $image;

    /**
     * @param string $title
     * @param string $description
     * @param User|null $user
     * @param string $category
     * @param string $image
     * @param int $id
     */
    public function __construct(string $title="", string $description="", User $user=null, string $category="", string $image="",int $id=0)
    {
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

}