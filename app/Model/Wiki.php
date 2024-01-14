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
    private int $id_category;

    public function getIdCategory(): int
    {
        return $this->id_category;
    }

    public function setIdCategory(int $id_category): void
    {
        $this->id_category = $id_category;
    }
    private string $image;

    public function __construct(User $user,string $title="", string $description="", int $id_category=0, string $image="",int $id=0)
    {
        parent::__construct();
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->user = $user;
        $this->id_category = $id_category;
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
    public function getWikis_user():array{
        return $this->user_getWikis($this->user->getId());
    }
    public function destroy():void{
        $this->delete('wikis', $this->id);
    }
    public function add(): void
    {
        $this->id = $this->insert('wikis', ['title' => $this->title, 'description' => $this->description,'image'=>$this->image,'id_user'=>$this->user->getId(),'id_catg'=>$this->id_category]);
    }
    public function getInfos_wiki():object{
        return $this->info_wiki($this->id);
    }
    public function get_latest_wikis():array{
        return $this->wikis_latest();
    }
    public function getValidate_wikis(string $searsh=""):array{
        return $this->getWikis_validate($searsh);
    }
    public function edit():void{
        $this->update('wikis', $this->id, ['title' => $this->title,'description'=>$this->description,'image'=>$this->image,'id_user'=>$this->user->getId(),'id_catg'=>$this->id_category]);
    }
    public function getAll_archive():array{
        return $this->wikis_archive();
    }
    public function archive():void{
        $this->update('wikis', $this->id, ['status' => 'archive']);
    }




}