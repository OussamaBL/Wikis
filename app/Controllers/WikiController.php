<?php

namespace MVC\Controllers;

use MVC\Controllers\Controller;
use MVC\Model\User;
use MVC\Model\Wiki;

class WikiController extends Controller
{

    function index(): void
    {
        $wiki=new Wiki(new User());
        $wikis=$wiki->getAll_pending();
        $this->render("views","wikis_pending","Wikis pending",$wikis);
        // TODO: Implement index() method.
    }
    public function reject(int $id):void{
        $wiki=new Wiki(new User());
        $wiki->setId($id);
        $wiki->reject();
        header("Location: /wikis/wiki/index");
    }
    public function validate(int $id):void{
        $wiki=new Wiki(new User());
        $wiki->setId($id);
        $wiki->validate();
        header("Location: /wikis/wiki/index");
    }

    function create(): void
    {
        // TODO: Implement create() method.
    }

    function destroy(int $id): void
    {
        // TODO: Implement destroy() method.
    }

    function update(int $id): void
    {
        // TODO: Implement update() method.
    }
}