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
        $this->check_auth();
        $wiki=new Wiki(new User());
        $wikis=$wiki->getAll_pending();
        $this->render("views","wikis_pending","Wikis pending",$wikis);
        // TODO: Implement index() method.
    }
    public function wiki_archive(int $id):void{
        $this->check_auth();
        $wiki=new Wiki(new User());
        $wiki->setId($id);
        $wiki->archive();
        header("Location: /wikis/wiki/index");
    }
    public function validate(int $id):void{
        $this->check_auth();
        $wiki=new Wiki(new User());
        $wiki->setId($id);
        $wiki->validate();
        header("Location: /wikis/wiki/index");
    }
    public function my_posts():void{
        $this->check_auth();
        $user=new User();
        $user->setId($_SESSION['id_user']);

        $wiki=new Wiki($user);
        $wikis=$wiki->getWikis_user();
        $this->render('views','my_posts','My Posts',$wikis,$user);
    }
    public function add():void{
        $this->check_auth();
        $category=new Category();
        $categories=$category->getAll();
        $tag=new Tags();
        $tags=$tag->getAll();
        $data=array($categories,$tags);
        $this->render('views','add_post','Add Post',$data);
    }
    function create(): void
    {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $id_user = $_SESSION['id_user'];
            $title = $this->validation_input($_POST['title']);
            $description = $this->validation_input($_POST['description']);
            $id_catg = $this->validation_input($_POST['id_catg']);


            $target_dir = "../public/images/";
            $target_file = $target_dir . basename($_FILES["image"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif")
                $uploadOk = 0;
            if ($uploadOk == 0) {
                header("Location: /wikis/Wiki/add_post/error_uploading");
            } else {
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    $image = $_FILES["image"]["name"];
                    $user = new User();
                    $user->setId($id_user);

                    $wiki = new Wiki($user, $title, $description, $id_catg, $image);
                    $wiki->add();
                    if(isset($_POST['tags'])) {
                        $tags = $_POST['tags'];
                        if(count($tags)>0){
                            for ($i = 0; $i < count($tags); $i++) {
                                $wiki_tag = new wiki_tags($wiki->getId(), $tags[$i]);
                                $wiki_tag->add();
                            }
                        }
                    }
                    header("Location: /wikis/Wiki/my_posts");
                } else header("Location: /wikis/Wiki/add_post/error_uploading");

            }
        }
        // TODO: Implement create() method.
    }

    function destroy(int $id): void
    {
        // TODO: Implement destroy() method.
        $this->check_auth();
        $wiki=new Wiki(new User());
        $wiki->setId($id);
        $wiki->destroy();
        header('Location: /wikis/Wiki/my_posts');
    }
    public function edit(int $id):void{
        $this->check_auth();
        $wiki=new Wiki(new User());
        $wiki->setId($id);
        $info_wiki=$wiki->getInfos_wiki();
        $category=new Category();
        $categories=$category->getAll();
        $tag=new Tags();
        $tags=$tag->getAll();
        $data=array($info_wiki,$categories,$tags);
        $this->render('views','update_wiki','Edit Wikis',$data);
    }

    function update(int $id_wiki): void
    {
        // TODO: Implement update() method.
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $id_user=$_SESSION['id_user'];
            $title=$this->validation_input($_POST['title']);
            $description=$this->validation_input($_POST['description']);
            $id_catg=$this->validation_input($_POST['id_catg']);



            if(!empty($title) && !empty($description) && !empty($id_catg)){
                $user=new User();
                $user->setId($id_user);
                $wiki=new Wiki($user,$title,$description,$id_catg);
                $wiki->setId($id_wiki);

                if (!empty($_FILES['image']['name'])) {
                    $target_dir = "../public/images/";
                    $target_file = $target_dir . basename($_FILES["image"]["name"]);
                    $uploadOk = 1;
                    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" )
                        $uploadOk = 0;
                    if ($uploadOk == 0) {
                        header("Location: /wikis/Wiki/add_post/error_uploading");
                    }
                    else{
                        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)){
                            $image=$_FILES["image"]["name"];
                            $wiki->setImage($image);
                        }
                        else header("Location: /wikis/Wiki/add_post/error_uploading");
                    }
                }
                else{

                    $image=$this->validation_input($_POST['image_wiki']);
                    $wiki->setImage($image);
                }
                $wiki->edit();
                $wiki_tags=new wiki_tags($wiki->getId());
                $wiki_tags->destroy_tags();

                if(isset($_POST['tags'])) {
                    $tags=$_POST['tags'];
                    if(count($tags)>0){
                        for ($i = 0; $i < count($tags); $i++) {
                            $wiki_tag=new wiki_tags($wiki->getId(),$tags[$i]);
                            $wiki_tag->add();
                        }
                    }
                }
                header("Location: /wikis/Wiki/my_posts");
            }
        }

    }
    public function archive():void{
        $this->check_auth();
        $wiki=new Wiki(new User());
        $wikis=$wiki->getAll_archive();
        $this->render("views","archive","Wikis Archive",$wikis);
    }
    public function post(int $id):void{
        $this->check_auth();
        $wiki=new Wiki(new User());
        $wiki->setId($id);
        $info_wiki=$wiki->getInfos_wiki();
        $this->render('views','post','Post',$info_wiki);
    }
    public function searsh():void{
        $this->check_auth();
        $wiki=new Wiki(new User());
        $wikis=$wiki->getValidate_wikis();
        $this->render('views','searsh','Wikis',$wikis);
    }
    public function getSearsh():void{
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $searsh=$_POST['searchInput'];
            $wiki=new Wiki(new User());
            $wikis=$wiki->getValidate_wikis($searsh);
            ?>
            <h2 class="text-center mb-4">wikis</h2>
            <?php
            if(count($wikis)>0){
            foreach ($wikis as $wiki){ ?>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-banner">
                            <p class="category-tag popular"><?= $wiki->category ?></p>
                            <img class="banner-img" src='<?= URL_DIR ?>public/images/<?= $wiki->image ?>' alt=''>
                        </div>
                        <div class="card-body">
                            <?php $tags=explode(',',$wiki->wiki_tags);  ?>
                            <p class="blog-hashtag">
                                <?php for ($i = 0; $i < count($tags); $i++) {
                                    echo "#".$tags[$i]." ";
                                } ?>
                            </p>
                            <h3 class="blog-title"><a href="/wikis/Wiki/post/<?= $wiki->id ?>"><?= $wiki->title ?></a> </h3>
                            <p class="blog-description mt-3"><?= substr($wiki->description, 0, 50); ?></p>
                            <p>Autors : <strong><?= $wiki->name ?></strong></p>
                            <p><?= $wiki->email ?></p>

                        </div>
                    </div>
                </div>
            <?php }}
            else{ ?>
                    <div class="text-center mt-4">
                        <h4>Not found</h4>
                    </div>

            <?php }
        }
    }
}