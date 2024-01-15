<?php

namespace MVC\Controllers;

use MVC\Controllers\Controller;
use MVC\Model\Category;

class CategoryController extends Controller
{

    function index(): void
    {
        $this->check_auth();
        $category=new Category();
        $categories=$category->getAll();
        $this->render("views",'categories','categories',$categories);
        // TODO: Implement index() method.
    }
    public function add($msg=null):void{
        $this->check_auth();
        $this->render("views","add_category",'category',$msg);
    }
    function create(): void
    {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $category = $this->validation_input($_POST['category']);
            if (!empty($category)) {
                $ctg = new Category($category);
                if ($ctg->check_exist() == null) {
                    $ctg->add();
                    header("Location: /Wikis/Category/index");
                } else header("Location: /Wikis/Category/add/category_exist");
            } else header("Location: /Wikis/Category/add/enter_all_data");
            // TODO: Implement create() method.
        }
    }

    function destroy(int $id): void
    {
        $this->check_auth();
        $category=new Category();
        $category->setId($id);
        $category->remove();
        header("Location: /Wikis/Category/index");
        // TODO: Implement destroy() method.
    }

    function update(int $id): void
    {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $category = $this->validation_input($_POST['category']);
            if (!empty($category)) {
                $ctg = new Category($category, $id);
                if ($ctg->check_exist() == null) {
                    $ctg->edit();
                    header("Location: /Wikis/Category/index");
                } else header("Location: /Wikis/Category/edit/$id/category_exist");
            } else header("Location: /Wikis/Category/edit/$id/enter_all_data");


            // TODO: Implement update() method.
        }
    }

    public function edit(int $id,$msg=null):void{
        $this->check_auth();
        $category=new Category();
        $category->setId($id);
        $category->getInfos();
        $this->render("views","update_category","category",$category,$msg);
    }
}