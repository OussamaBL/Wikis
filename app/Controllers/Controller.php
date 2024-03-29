<?php

namespace MVC\Controllers;

abstract class Controller
{
    abstract function index():void;
    abstract function create():void;
    abstract function destroy(int $id):void;
    abstract function update(int $id):void;

    public function render(string $nameFolder,string $nameFile,string $title,$result=null,$msg=null):void{

        include "../resources/".$nameFolder."/".$nameFile.".php";
        //include '../app/View/include/layout.php';

    }
    public function validation_input(string $data):string {
        $data = trim($data);
        $data = stripslashes($data);
        /** @var TYPE_NAME $data */
        $data = htmlspecialchars($data);
        return $data;
    }
    public function check_auth():void{
        if(!isset($_SESSION['id_user'])){
            header('Location: /wikis/auth/sign_in');
            exit();
        }
    }

}