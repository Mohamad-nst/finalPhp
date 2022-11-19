<?php
class Titles extends Controller{
    private $titleModel;
    public function __construct()
    {
        Controller::__construct();
        $this->titleModel=$this->model("Title");
    }
    public function index(){
        $data=[
          "title"=>$this->titleModel->selectAll()
        ];
        return $this->views("Title/details",$data);
    }
    public function create(){
        $data=[
          "title"=>"",
          "description"=>"",
          "title_err"=>"",
          "description_err"=>""
        ];
        return $this->views("Title/create",$data);
    }
    public function store(){
        if ($_SERVER['REQUEST_METHOD']==="POST"){
            $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
            $data=[
                "title"=>$_POST['title'],
                "description"=>trim($_POST['description']),
                "title_err"=>"",
                "description_err"=>""
            ];
            if ($this->titleModel->findTitle($data)){
                $data['title_err']="your title already has existed!";
            }
            if (empty($data['description'])){
                $data['description_err']="filling your description is necessary!";
            }elseif (strlen($data['description'])>300){
                $data['description_err']="your description has more than 300 characters!";
            }
            if (empty($data['description_err']) && empty($data['title_err'])){
                $this->titleModel->store($data);
                $_SESSION['upload']="your record uploaded successfully!";
                redirect("Titles/create");
            }else{
                return $this->views("Title/create",$data);
            }
        }else{
            redirect("Titles/crate");
        }
    }
    public function details(){
        $data=[
            "title"=>$this->titleModel->selectAll()
        ];
        return $this->views("Title/details",$data);
    }
    public function delete(){
        $id=intval($_POST['id']);
        $this->titleModel->delete($id);
        $_SESSION['delete']="your record deleted successfully!";
        redirect("Titles/details");
    }
    public function edit(){
        if ($_SERVER['REQUEST_METHOD']==="POST"){
            $id=intval($_POST['id']);
            $record=$this->titleModel->selectId($id);
            $data=[
                "id"=>$record->id,
                "title"=>$record->title,
                "description"=>$record->description,
                "title_err"=>"",
                "description_err"=>""
            ];
            return $this->views("Title/edit",$data);
        }else{
            redirect("titles/details");
        }
    }
    public function update(){
        if ($_SERVER['REQUEST_METHOD']==="POST") {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                "id"=>$_POST['id'],
                "title" => $_POST['title'],
                "description" => trim($_POST['description']),
                "title_err" => "",
                "description_err" => ""
            ];
            if ($this->titleModel->findTitle($data)){
                $data['title_err']="your title already has existed!";
            }
            if (empty($data['description'])) {
                $data['description_err'] = "filling your description is necessary!";
            } elseif (strlen($data['description']) > 300) {
                $data['description_err'] = "your description has more than 300 characters!";
            }
            if (empty($data['description_err']) && empty($data['title_err'])){
                $this->titleModel->update($data);
                $_SESSION['update']="your record uploaded successfully!";
                redirect("Titles/details");
            }else{
                return $this->views("Title/edit",$data);
            }
        }else{
            redirect("Titles/details");
        }
    }
}