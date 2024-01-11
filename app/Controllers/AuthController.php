<?php

namespace MVC\Controllers;
use MVC\Controllers\Controller;
use MVC\Model\User;
use MVC\Model\Verification;

class AuthController extends Controller
{

    function index(): void
    {

        // TODO: Implement index() method.
    }
    public function sign_up():void{
        $this->render("views","sign_up","Register");
    }
    public function sign_in():void{
        $this->render("views","sign_in",'Login');
    }
    function create(): void
    {
        // TODO: Implement create() method.
        $name = $this->validation_input($_POST["name"]);
        $email = $this->validation_input($_POST["email"]);
        $password = $this->validation_input($_POST["password"]);
        $re_password = $this->validation_input($_POST["re_password"]);
        if(!(empty($name) && empty($email) && empty($password) && empty($re_password) )){
            if($password==$re_password){
                $user=new User($name,$email,password_hash($password,PASSWORD_DEFAULT));
                if($user->check_auth_register()==null) {
                    $user->add();
                    $_SESSION['id_user']=$user->getId();
                    $_SESSION["name"]=$user->getName();
                    header("Location: /Wikis/Auth/profile");
                }
                else $this->render("views","sign_up","Register","email_exist");
            }
            else $this->render("views","sign_up","Register","confirmation_password_incorrect");
        }
        else $this->render("views","sign_up","Register","enter_all_data");
    }
    public function login():void{
        $email = $this->validation_input($_POST["email"]);
        $password = $this->validation_input($_POST["password"]);
        if(!(empty($password) || empty($email))){
            $user=new User();
            $user->setEmail($email);
            $us=$user->check_auth_register();
            if($us!=null){
                if(password_verify($password, $us->password)){
                    $_SESSION["id_user"]=$us->id;
                    $_SESSION["name"]=$us->name;
                    if($us->role=="admin") header("Location: /Wikis/Wiki/index");
                    else header("Location: /Wikis/Auth/profile");
                    die;
                }
                else{
                    header("Location: /Wikis/Auth/sign_in/password_incorrect");
                    die;
                }
            }
            else{
                header("Location: /Wikis/Auth/sign_in/email_not_found");
                die;
            }
        }
        else{
            header("Location: /Wikis/Auth/sign_in/enter_all_data");
            die;
        }
    }

    function destroy(int $id): void
    {
        // TODO: Implement destroy() method.
    }

    function update(int $id): void
    {
        $this->render("views",'categories',"categories");
        // TODO: Implement update() method.
    }
    public function logout():void{
        if(isset($_SESSION["id_user"])){
            unset($_SESSION["id_user"]);
            unset($_SESSION["name"]);
        }
        header("Location: /wikis/auth/sign_in");
    }

}