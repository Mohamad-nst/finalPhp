<?php

class Teams extends Controller{
    private $teamModel;
    private $sliderModel;
    private $titleModel;
    private $seoModel;
    public function __construct()
    {
        Controller::__construct();
        $this->teamModel=$this->model("Team");
        $this->sliderModel=$this->model("Slider");
        $this->titleModel=$this->model("Title");
        $this->seoModel=$this->model("Seo");
    }
    public function index(){
        $data=[
            "team"=>$this->teamModel->selectAll(),
            "slider"=>$this->sliderModel->selectAll(),
            "title"=>$this->titleModel->selectTitleTeam(),
            "seo"=>$this->seoModel->selectLatest()
        ];
        return $this->views("Team/index",$data);
    }
    public function create(){
        $data=[
            "image"=>"",
            "alt"=>"",
            "fullName"=>"",
            "job"=>"",
            "description"=>"",
            "class"=>"",
            "image_err"=>"",
            "fullName_err"=>"",
            "job_err"=>"",
            "description_err"=>""
        ];
        return $this->views("Team/create",$data);
    }
    public function store(){
        if ($_SERVER['REQUEST_METHOD']==="POST") {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                "image" => $_FILES['image'],
                "alt" => trim($_POST['alt']),
                "fullName" => trim($_POST['fullName']),
                "job" => trim($_POST['job']),
                "description" => trim($_POST['description']),
                "class"=>$_POST['class'],
                "image_err" => "",
                "alt_err" => "",
                "fullName_err" => "",
                "job_err" => "",
                "description_err" => ""
            ];
            $directory = finalRoot . "/public/images/Team/" . $data['image']['name'];
            $filetype = pathinfo($directory, PATHINFO_EXTENSION);
            if (empty($data['image']['name'])) {
                $data['image_err'] = "uploading image is necessary!";
            } elseif ($filetype !== "jpg" && $filetype !== "png") {
                $data['image_err'] = "your image format is not jpg or png";
            } elseif ($data['image']['size'] > 5000000) {
                $data['image_err'] = "your image size is more than 5 megabyte!";
            }
            if (empty($data['alt'])) {
                $data['alt_err'] = "uploading alt is necessary!";
            } elseif (strlen($data['alt']) > 50) {
                $data['alt_err'] = "uploaded alt is more than 50 character!";
            }
            if (empty($data['fullName'])) {
                $data['fullName_err'] = "uploading fullName is necessary!";
            } elseif (strlen($data['fullName']) > 50) {
                $data['fullName_err'] = "uploaded fullName is more than 50 character!";
            }
            if (empty($data['job'])) {
                $data['job_err'] = "uploading job is necessary!";
            } elseif (strlen($data['job']) > 50) {
                $data['position_err'] = "uploaded job is more than 50 character!";
            }
            if (empty($data['description'])) {
                $data['description_err'] = "uploading description is necessary!";
            } elseif (strlen($data['description']) > 400) {
                $data['description_err'] = "uploaded description is more than 50 character!";
            }
            if (empty($data['image_err']) && empty($data['fullName_err']) && empty($data['job_err']) && empty($data['description_err']) && empty($data['alt_err'])){
                $data['image']=$this->uploadImage("Team",$data['image']);
                $this->teamModel->store($data);
                $_SESSION['upload']="your record uploaded successfully!";
                redirect("Teams/create");
            }else{
                return $this->views("Team/create",$data);
            }
        }
    }
    public function details(){
        $data=['team'=>$this->teamModel->selectAll()];
        return $this->views("Team/details",$data);
    }
    public function delete(){
        $id=intval($_POST['id']);
        $record=$this->teamModel->selectId($id);
        fileUnlink("Team",$record);
        $this->teamModel->delete($id);
        $_SESSION['delete']="your record deleted successfully!";
        redirect("Teams/details");
    }
    public function edit(){
        if ($_SERVER['REQUEST_METHOD']==="POST"){
            $id=intval($_POST['id']);
            $record=$this->teamModel->selectId($id);
            $data=[
                "id"=>$record->id,
                "image" => $record->image,
                "alt" => $record->alt,
                "fullName" =>$record->fullName,
                "job" =>$record->job,
                "description" => $record->description,
                "class" => $record->class,
                "image_err" => "",
                "alt_err" => "",
                "fullName_err" => "",
                "job_err" => "",
                "description_err" => ""
            ];
            return $this->views("Team/edit",$data);
        }else{
            redirect("Teams/details");
        }
    }
    public function update(){
        if ($_SERVER['REQUEST_METHOD']==="POST") {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                "id"=>intval($_POST['id']),
                "image" => $_FILES['image'],
                "alt" => trim($_POST['alt']),
                "fullName" => trim($_POST['fullName']),
                "job" => trim($_POST['job']),
                "description" => trim($_POST['description']),
                "class"=>$_POST['class'],
                "image_err" => "",
                "alt_err" => "",
                "fullName_err" => "",
                "job_err" => "",
                "description_err" => ""
            ];
            $directory = finalRoot . "/public/images/Team/" . $data['image']['name'];
            $filetype = pathinfo($directory, PATHINFO_EXTENSION);
            if ($filetype !== "jpg" && $filetype !== "png" && $data['image']['size']>0) {
                $data['image_err'] = "your image format is not jpg or png";
            } elseif ($data['image']['size'] > 5000000) {
                $data['image_err'] = "your image size is more than 5 megabyte!";
            }
            if (empty($data['alt'])) {
                $data['alt_err'] = "uploading alt is necessary!";
            } elseif (strlen($data['alt']) > 50) {
                $data['alt_err'] = "uploaded alt is more than 50 character!";
            }
            if (empty($data['fullName'])) {
                $data['fullName_err'] = "uploading fullName is necessary!";
            } elseif (strlen($data['fullName']) > 50) {
                $data['fullName_err'] = "uploaded fullName is more than 50 character!";
            }
            if (empty($data['job'])) {
                $data['job_err'] = "uploading job is necessary!";
            } elseif (strlen($data['job']) > 50) {
                $data['position_err'] = "uploaded job is more than 50 character!";
            }
            if (empty($data['description'])) {
                $data['description_err'] = "uploading description is necessary!";
            } elseif (strlen($data['description']) > 400) {
                $data['description_err'] = "uploaded description is more than 50 character!";
            }
            $record=$this->teamModel->selectId($data['id']);
            if (empty($data['image_err']) && empty($data['fullName_err']) && empty($data['job_err']) && empty($data['description_err']) && empty($data['alt_err'])){
                if (!empty($data['image']['name'])){
                    fileUnlink("Team",$record);
                    $data['image']=$this->uploadImage("Team",$data['image']);
                }else{
                    $data['image']=$record->image;
                }
                $this->teamModel->update($data);
                $_SESSION['update']="your record updated successfully!";
                redirect("Teams/details");
            }else{
                $data['image']=$record->image;
                return $this->views("Team/edit",$data);
            }
        }
    }
}