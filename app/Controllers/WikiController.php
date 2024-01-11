<?php

namespace MVC\Controllers;

use MVC\Controllers\Controller;
use MVC\Model\Category;
use MVC\Model\Tags;
use MVC\Model\User;
use MVC\Model\Wiki;
use MVC\Model\wiki_tags;

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
    public function my_posts():void{
        $user=new User();
        $user->setId($_SESSION['id_user']);

        $wiki=new Wiki($user);
        $wikis=$wiki->getWikis_user();
        $this->render('views','my_posts','My Posts',$wikis,$user);
    }
    public function add():void{
        $category=new Category();
        $categories=$category->getAll();
        $tag=new Tags();
        $tags=$tag->getAll();
        $data=array($categories,$tags);
        $this->render('views','add_post','Add Post',$data);
    }
    function create(): void
    {
        $id_user=$_SESSION['id_user'];
        $title=$this->validation_input($_POST['title']);
        $description=$this->validation_input($_POST['description']);
        $id_catg=$this->validation_input($_POST['id_catg']);
        $tags=$_POST['tags'];

        $target_dir = "../public/images/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

       if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" )
            $uploadOk = 0;
        if ($uploadOk == 0) {
            header("Location: /wikis/Wiki/add_post/error_uploading");
        } else {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)){
                $image=$_FILES["image"]["name"];
                $user=new User();
                $user->setId($id_user);

                $wiki=new Wiki($user,$title,$description,$id_catg,$image);
                $wiki->add();
                for ($i = 0; $i < count($tags); $i++) {
                    $wiki_tag=new wiki_tags($wiki->getId(),$tags[$i]);
                    $wiki_tag->add();
                }
                header("Location: /wikis/Wiki/my_posts");
            }
            else header("Location: /wikis/Wiki/add_post/error_uploading");

        }
        // TODO: Implement create() method.
    }

    function destroy(int $id): void
    {
        // TODO: Implement destroy() method.
        $wiki=new Wiki(new User());
        $wiki->setId($id);
        $wiki->destroy();
        header('Location: /wikis/Wiki/my_posts');
    }

    function update(int $id): void
    {
        // TODO: Implement update() method.
    }
}