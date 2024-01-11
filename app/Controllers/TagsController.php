<?php

namespace MVC\Controllers;

use MVC\Controllers\Controller;
use MVC\Model\Category;
use MVC\Model\Tags;

class TagsController extends Controller
{

    function index(): void
    {
        $tag=new Tags();
        $tags=$tag->getAll();
        $this->render("views",'tags','tags',$tags);
        // TODO: Implement index() method.
    }

    function create(): void
    {
        $tag=$this->validation_input($_POST['tag']);
        if(!empty($tag)){
            $tg=new Tags($tag);
            if($tg->check_exist()==null){
                $tg->add();
                header("Location: /Wikis/Tags/index");
            }
            else header("Location: /Wikis/Tags/add/tag_exist");
        }
        else header("Location: /Wikis/Tags/add/enter_all_data");
        // TODO: Implement create() method.
    }

    function destroy(int $id): void
    {
        $tag=new Tags();
        $tag->setId($id);
        $tag->remove();
        header("Location: /Wikis/Tags/index");
        // TODO: Implement destroy() method.
    }

    function update(int $id): void
    {
        $tag=$this->validation_input($_POST['tag']);
        if(!empty($tag)){
            $tg=new Tags($tag,$id);
            if($tg->check_exist()==null){
                $tg->edit();
                header("Location: /Wikis/Tags/index");
            }
            else header("Location: /Wikis/Tags/edit/$id/tag_exist");
        }
        else header("Location: /Wikis/Tags/edit/$id/enter_all_data");
        // TODO: Implement update() method.
    }
    public function edit(int $id,$msg=null):void{
        $tag=new Tags();
        $tag->setId($id);
        $tag->getInfos();
        $this->render("views","update_tags","tags",$tag,$msg);
    }
    public function add($msg=null):void{
        $this->render("views","add_tags",'tags',$msg);
    }
}