<?php
class Controller{
    public function __construct()
    {
        session_start();
    }
    public function model($model){
        if (file_exists("../app/Models/".ucwords($model).".php")){
            include_once "../app/Models/".ucwords($model).".php";
            return new $model;
        }
    }
    public function views($view,$data=[]){
        if (file_exists("../app/Views/".ucwords($view).".php")){
            include_once "../app/Views/".ucwords($view).".php";
        }
    }
    public function uploadImage($dir,$image){
        $path="../public/images/".$dir;
        if (!file_exists($path)){
            mkdir($path);
        }
        $imageName=md5(time()).$image['name'];
        $directory=$path."/".$imageName;
        move_uploaded_file($image['tmp_name'],$directory);
        return $imageName;
    }
}