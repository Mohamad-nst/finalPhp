<?php
class Dashboards extends Controller{
    private $dashboardModel;
    private $seoModel;
    public function __construct()
    {
        Controller::__construct();
        $this->dashboardModel=$this->model("Dashboard");
        $this->seoModel=$this->model("Seo");
    }
    public function index(){
        $data=[
            "dashboard"=>$this->dashboardModel->selectAll(),
            "seo"=>$this->seoModel->selectLatest(),
        ];
        return $this->views("Dashboard/index",$data);
    }
    public function create(){
        $data=[
            "image"=>"",
            "title"=>"",
            "link"=>"",
            "image_err"=>"",
            "title_err"=>""
        ];
        return $this->views("Dashboard/create",$data);
    }
    public function store(){
        if ($_SERVER['REQUEST_METHOD']==="POST"){
            $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
            $data=[
                "image"=>$_FILES['image'],
                "title"=>trim($_POST['title']),
                "link"=>trim($_POST['link']),
                "image_err"=>"",
                "title_err"=>""
            ];
            $directory=finalRoot."/public/images/slider/".$data['image']['name'];
            $filetype=pathinfo($directory,PATHINFO_EXTENSION);
            if (empty($data['image']['name'])){
                $data['image_err']="uploading image is necessary!";
            }elseif ($filetype!=="jpg" && $filetype!=="png"){
                $data['image_err']="your image format is not jpg or png";
            }elseif ($data['image']['size']>5000000){
                $data['image_err']="your image size is more than 5 megabyte!";
            }
            if (empty($data['title'])){
                $data['title_err']="uploading alt is necessary!";
            }elseif (strlen($data['alt'])>50){
                $data['title_err']="uploaded alt is more than 50 character!";
            }
            if (empty($data['image_err']) && empty($data['title_err'])){
                $data['image']=$this->uploadImage("Dashboard",$data['image']);
                $this->dashboardModel->store($data);
                $_SESSION['upload']="your record updated successfully!";
                redirect("Dashboards/create");
            }else{
                return $this->views("Dashboard/create",$data);
            }
        }else{
            redirect("Dashboards/create");
        }
    }
    public function details(){
        $data=["dashboard"=>$this->dashboardModel->selectAll()];
        return $this->views("Dashboard/details",$data);
    }
    public function delete(){
        $id=intval($_POST['id']);
        $record=$this->dashboardModel->selectId($id);
        fileUnlink("Dashboard",$record);
        $this->dashboardModel->delete($id);
        $_SESSION['delete']="delete operation has done successfully!";
        redirect("Dashboards/details");
    }
    public function edit(){
        if ($_SERVER['REQUEST_METHOD']==="POST"){
            $id=intval($_POST['id']);
            $data=$this->dashboardModel->selectId($id);
            $data=[
                "id"=>$data->id,
                "image"=>$data->image,
                "title"=>$data->title,
                "link"=>$data->link,
                "image_err"=>"",
                "title_err"=>""
            ];
            return $this->views("Dashboard/edit",$data);
        }else{
         redirect("Dashboards/details");
        }
    }
    public function update(){
        if ($_SERVER['REQUEST_METHOD']==="POST") {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                "id"=>intval($_POST['id']),
                "image" => $_FILES['image'],
                "title" => trim($_POST['title']),
                "link" => trim($_POST['link']),
                "image_err" => "",
                "title_err" => ""
            ];
            $directory = finalRoot . "/public/images/Dashboard/".$data['image']['name'];
            $filetype = pathinfo($directory, PATHINFO_EXTENSION);
            if (empty($data['image']['name'])) {
                $data['image_err'] = "uploading image is necessary!";
            } elseif ($filetype !== "jpg" && $filetype !== "png") {
                $data['image_err'] = "your image format is not jpg or png";
            } elseif ($data['image']['size'] > 5000000) {
                $data['image_err'] = "your image size is more than 5 megabyte!";
            }
            if (empty($data['title'])) {
                $data['title_err'] = "uploading alt is necessary!";
            } elseif (strlen($data['alt']) > 50) {
                $data['title_err'] = "uploaded alt is more than 50 character!";
            }
            $record=$this->dashboardModel->selectId($data['id']);
            if (empty($data['image_err']) && empty($data['title_err'])){
                if (!empty($data['image']['name'])){
                    fileUnlink("Dashboard",$record);
                   $data['image']=$this->uploadImage("Dashboard",$data['image']);
                }else{
                    $data['image']=$record->image;
                }
                $this->dashboardModel->update($data);
                $_SESSION['update']="your record updated successfully!";
                redirect("Dashboards/details");
            }else{
                $data['image']=$record->image;
                return $this->views("Dashboard/edit",$data);
            }
        }else{
            redirect("Dashboards/details");
        }
    }
}