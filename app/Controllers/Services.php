<?php

class Services extends Controller
{
    private $serviceModel;
    private $sliderModel;
    private $titleModel;
    private $seoModel;
    public function __construct(){
        Controller::__construct();
        $this->serviceModel=$this->model("Service");
        $this->sliderModel=$this->model("Slider");
        $this->titleModel=$this->model("Title");
        $this->seoModel=$this->model("Seo");
    }
    public function index(){
        $data=[
          "slider"=>$this->sliderModel->selectAll(),
          "service"=>$this->serviceModel->selectAll(),
          "title"=>$this->titleModel->selectTitleService(),
          "seo"=>$this->seoModel->selectLatest()
        ];
        return $this->views("Service/index",$data);
    }
    public function create(){
        $data=[
            "class"=>"",
            "color"=>"",
            "title"=>"",
            "description"=>"",
            "class_err"=>"",
            "title_err"=>"",
            "description_err"=>""
        ];
        return $this->views("Service/create",$data);
    }
    public function store(){
        if ($_SERVER['REQUEST_METHOD']==="POST"){
            $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
            $data=[
               "class"=>$_POST['class'],
               "color"=>$_POST['color'],
               "title"=>trim($_POST['title']),
               "description"=>trim($_POST['description']),
                "class_err"=>"",
               "title_err"=>"",
                "description_err"=>""
            ];
            if ($this->serviceModel->findClass($data)){
                $data['class_err']="your icon is already existed!";
            }
            if (empty($data['title'])){
                $data['title_err']="filling your title is necessary!";
            }elseif (strlen($data['title'])>100){
                $data['title_err']="your title has more than 100 characters!";
            }elseif ($this->serviceModel->findTitle($data)){
                $data['title_err']="your title is already existed!";
            }
            if (empty($data['description'])){
                $data['description_err']="filling your description is necessary!";
            }elseif (strlen($data['description'])<100){
                $data['description_err']="your description has less than 200 characters!";
            }
            if (empty($data['title_err']) && empty($data['description_err']) && empty($data['class_err'])){
                $this->serviceModel->store($data);
                $_SESSION['upload']="your record uploaded successfully!";
                redirect("Services/create");
            }else{
                $this->views("Service/create",$data);
            }
        }else{
            redirect("Services/create");
        }
    }
    public function details(){
        $data=[
          "service"=>$this->serviceModel->selectAll()
        ];
        $this->views("Service/details",$data);
    }
    public function delete(){
        $id=intval($_POST['id']);
        $this->serviceModel->delete($id);
        $_SESSION['delete']="your record uploaded successfully!";
        redirect("Services/details");
    }
    public function edit(){
        if ($_SERVER['REQUEST_METHOD']==="POST"){
            $id=intval($_POST['id']);
            $record=$this->serviceModel->fetch($id);
            $data=[
                "id"=>$record->id,
                "class"=>$record->class,
                "color"=>$record->color,
                "title"=>$record->title,
                "description"=>$record->description
            ];
            return $this->views("Service/edit",$data);
        }else{
            redirect("Services/details");
        }
    }
    public function update(){
        if ($_SERVER['REQUEST_METHOD']==="POST"){
            $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
            $data=[
                "id"=>$_POST['id'],
                "class"=>$_POST['class'],
                "color"=>$_POST['color'],
                "title"=>trim($_POST['title']),
                "description"=>trim($_POST['description']),
                "class_err"=>"",
                "title_err"=>"",
                "description_err"=>""
            ];
            if ($this->serviceModel->findClass($data)){
                $data['class_err']="your icon is already existed!";
            }
            if (empty($data['title'])){
                $data['title_err']="filling your title is necessary!";
            }elseif (strlen($data['title'])>100){
                $data['title_err']="your title has more than 100 characters!";
            }elseif ($this->serviceModel->findTitle($data)){
                $data['title_err']="your title is already existed!";
            }
            if (empty($data['description'])){
                $data['description_err']="filling your description is necessary!";
            }elseif (strlen($data['description'])<100){
                $data['description_err']="your description has less than 200 characters!";
            }
            if (empty($data['title_err']) && empty($data['description_err']) && empty($data['class_err'])){
                $this->serviceModel->update($data);
                $_SESSION['update']="your record updated successfully!";
                redirect("Services/details");
            }else{
                return $this->views("Service/create",$data);
            }
        }

    }

}