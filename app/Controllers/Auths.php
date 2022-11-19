<?php
class Auths extends Controller{
    private $AuthModel;
    public function __construct()
    {
        Controller::__construct();
        $this->AuthModel=$this->model("Auth");
    }
    public function register(){
        if ($_SERVER['REQUEST_METHOD']==="POST"){
            $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
            $data=[
                "fullName"=>trim($_POST['fullName']),
                "email"=>trim($_POST['email']),
                "password"=>trim($_POST['password']),
                "confirm_password"=>trim($_POST['confirm_password']),
                "fullName_err"=>"",
                "email_err"=>"",
                "password_err"=>"",
                "confirm_password_err"=>""
            ];
            if (empty($data['fullName'])){
                $data['fullName_err']="filling fullName is necessary!";
            }
            if (empty($data['email'])){
                $data['email_err']="filling email is necessary!";
            }elseif (!filter_var($data['email'],FILTER_VALIDATE_EMAIL)){
                $data['email_err']="your email format is not correct!";
            }elseif ($this->AuthModel->findUserEmail($data)){
                $data['email_err']="your uploaded email is already existed!";
            }
            if (empty($data['password'])){
                $data['password_err']="filling password is necessary!";
            }elseif (strlen($data['password'])<6){
                $data['password_err']="your password is less than 6 character!";
            }
            if (empty($data['confirm_password'])){
                $data['confirm_password_err']="filling confirm_password is necessary!";
            }elseif ($data['password']!==$data['confirm_password']){
                $data['confirm_password_err']="your confirm_password is not same as your password!";
            }
            if (empty($data['fullName_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])){
                $data['password']=password_hash($data['password'],PASSWORD_DEFAULT);
                if ($this->AuthModel->register($data)===true){
                    $_SESSION['register']="you have successfully registered login please!";
                    redirect("Auths/login");
                }
            }else{
                return $this->views("Auth/register",$data);
            }
        }else{
            $data=[
               "fullName"=>"",
               "email"=>"",
               "password"=>"",
               "confirm_password"=>"",
               "fullName_err"=>"",
               "email_err"=>"",
               "password_err"=>"",
               "confirm_password_err"=>""
            ];
            return $this->views("Auth/register",$data);
        }
    }
    public function login(){
        if ($_SERVER['REQUEST_METHOD']==="POST"){
            $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
            $data=[
                "email"=>trim($_POST['email']),
                "password"=>trim($_POST['password']),
                "email_err"=>"",
                "password_err"=>"",
            ];
            if (empty($data['email'])){
                $data['email_err']="filling email is necessary!";
            }elseif (!$this->AuthModel->findUserEmail($data)){
                $data['email_err']="there is no user with this email";
            }
            if (empty($data['password'])){
                $data['password_err']="filling password is necessary!";
            }elseif ($this->AuthModel->login($data)===false){
                $data['password_err']="your password is not correct!";
            }
            if (empty($data['email_err']) && empty($data['password_err'])){
                $loginAuth=$this->AuthModel->login($data);
                if ($loginAuth){
                    $this->createSessionAuth($loginAuth);
                    redirect("Dashboards/index");
                }
            }else{
                return $this->views("Auth/login",$data);
            }
        }else{
            $data=[
                "email"=>"",
                "password"=>"",
                "email_err"=>"",
                "password_err"=>"",
            ];
            return $this->views("Auth/login",$data);
        }
    }
    public function createSessionAuth($data){
        $_SESSION['id']=$data->id;
        $_SESSION['fullName']=$data->fullName;
        $_SESSION['email']=$data->email;
    }
    public function logout(){
        $_SESSION['id']=null;
        $_SESSION['fullName']=null;
        $_SESSION['email']=null;
        redirect("Auths/login");
    }
}