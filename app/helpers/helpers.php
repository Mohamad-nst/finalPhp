<?php
function redirect($root){
    header("location:".finalRoot."/".$root);
}
function showImage($root,$item){
    return finalRoot."/public/images/".$root."/".$item->image;
}
function fileUnlink($root,$record){
    if (file_exists("../public/images/".$root."/".$record->image)){
        unlink("../public/images/".$root."/".$record->image);
    }
}
function checkLogin(){
    if (!isset($_SESSION['email'])){
        redirect("Auths/login");
    }
}
function checkLogout(){
    if (isset($_SESSION['email'])){
        redirect("Dashboards/index");
    }
}