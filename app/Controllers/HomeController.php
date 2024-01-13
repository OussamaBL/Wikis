<?php

namespace MVC\Controllers;
use MVC\Controllers\Controller;
use MVC\Model\Category;
use MVC\Model\User;
use MVC\Model\Wiki;

class HomeController extends Controller
{
    public function index(): void
    {
        $wiki=new Wiki(new User());
        $wikis=$wiki->get_latest_wikis();
        $category=new Category();
        $categories=$category->getAll();
        $data=array($wikis,$categories);
        $this->render('views','index','Home',$data);
    }
    public function dashboard():void{
        $user=new User();
        $count_users=$user->count_users();
        $wiki=new Wiki(new User());
        $count_wikis=$wiki->count_posts();
        $count_wikis_pending=$wiki->count_posts_pending();
        $category=new Category();
        $count_categories=$category->count_categories();
        $data=array($count_users,$count_wikis,$count_wikis_pending,$count_categories);
        $this->render('views','dashboard','dashboard',$data);
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