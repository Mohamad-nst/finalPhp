<?php
class Seos extends Controller{
    private $seoModel;
    public function __construct()
    {
        Controller::__construct();
        $this->seoModel=$this->model("Seo");
    }
    public function index(){
        $data=["seo"=>$this->seoModel->selectAll()];
        return $this->views("Seo/index",$data);
    }
    public function create(){
        $data=[
            "title"=>"",
            "keywords"=>"",
            "description"=>"",
            "author"=>"",
            "title_err"=>"",
            "keywords_err"=>"",
            "description_err"=>"",
            "author_err"=>""
        ];
        return $this->views("Seo/create",$data);
    }
    public function store(){
        if ($_SERVER['REQUEST_METHOD']==="POST"){
            $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
            $data=[
                "title"=>trim($_POST['title']),
                "keywords"=>trim($_POST['keywords']),
                "description"=>trim($_POST['description']),
                "author"=>trim($_POST['author']),
                "title_err"=>"",
                "keywords_err"=>"",
                "description_err"=>"",
                "author_err"=>""
            ];
            if (empty($data['title'])){
                $data['title_err']="filling your title is necessary!";
            }elseif (strlen($data['title'])>70){
                $data['title_err']="your title is more than 70 characters!";
            }
            if (empty($data['keywords'])){
                $data['keywords_err']="filling your keywords is necessary!";
            }elseif (strlen($data['keywords'])>400){
                $data['keywords_err']="your keywords is more than 400 characters!";
            }
            if (empty($data['description'])){
                $data['description_err']="filling your description is necessary!";
            }elseif (strlen($data['description'])>155){
                $data['description_err']="your description is more than 50 characters!";
            }
            if (empty($data['author'])){
                $data['author_err']="filling your author is necessary!";
            }elseif (strlen($data['author'])>50){
                $data['author_err']="your author is more than 50 characters!";
            }
            if (empty($data['title_err']) && empty($data['keywords_err']) && empty($data['description_err']) && empty($data['author_err'])){
                $this->seoModel->store($data);
                $_SESSION['upload']="your record uploaded successfully!";
                redirect("Seos/create");
            }else{
                return $this->views("Seo/create",$data);
            }
        }else{
            redirect("Seos/create");
        }
    }
    public function delete(){
        $id=intval($_POST['id']);
        $this->seoModel->delete($id);
        $_SESSION['delete']="your record deleted successfully!";
        redirect("Seos/index");
    }
    public function selectLatest(){
        $data=["seo"=>$this->seoModel->selectLatest()];
        var_dump($data);
    }
}