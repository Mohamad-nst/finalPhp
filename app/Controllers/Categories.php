<?php
class Categories extends Controller{
    private $categoryModel;
    private $sliderModel;
    private $titleModel;
    private $seoModel;
    public function __construct()
    {
        Controller::__construct();
        $this->categoryModel=$this->model("Category");
        $this->sliderModel=$this->model("Slider");
        $this->titleModel=$this->model("Title");
        $this->seoModel=$this->model("Seo");
    }
    public function index(){
      $data=[
          "category"=>$this->categoryModel->selectAll(),
          "slider"=>$this->sliderModel->selectAll(),
          "title"=>$this->titleModel->selectTitleCategory(),
          "seo"=>$this->seoModel->selectLatest(),
      ];
      return $this->views("Category/index",$data);
    }
    public function create(){
        $data=[
            "image"=>"",
            "title"=>"",
            "alt"=>"",
            "description"=>"",
            "image_err"=>"",
            "title_err"=>"",
            "alt_err"=>"",
            "description_err"=>""
        ];
        return $this->views("Category/create",$data);
    }
    public function store(){
        if ($_SERVER['REQUEST_METHOD']==="POST"){
            $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
            $data=[
                "image"=>$_FILES['image'],
                "title"=>trim($_POST['title']),
                "alt"=>trim($_POST['alt']),
                "description"=>trim($_POST['description']),
                "image_err"=>"",
                "title_err"=>"",
                "alt_err"=>"",
                "description_err"=>""
            ];
            $directory=finalRoot."/public/images/category/".$data['image']['name'];
            $filetype=pathinfo($directory,PATHINFO_EXTENSION);
            if (empty($data['image']['name'])){
                $data['image_err']="uploading image is necessary!";
            }elseif ($filetype!=="jpg" && $filetype!=="png"){
                $data['image_err']="your image format is not jpg or png";
            }elseif ($data['image']['size']>5000000){
                $data['image_err']="your image size is more than 5 megabyte!";
            }
            if (empty($data['title'])){
                $data['title_err']="filling your title is necessary!";
            }elseif (strlen($data['title'])>50){
                $data['title_err']="your title is more than is more than 50 character!";
            }
            if (empty($data['alt'])){
                $data['alt_err']="filling your alt is necessary!";
            }elseif (strlen($data['alt'])>50){
                $data['alt_err']="your alt is more than is more than 50 character!";
            }
            if (empty($data['description'])){
                $data['description_err']="filling your description is necessary!";
            }elseif (strlen($data['description'])>500){
                $data['description_err']="your description is more than is more than 255 character!";
            }
            if (empty($data['image_err']) && empty($data['title_err']) && empty($data['alt_err']) && empty($data['description_err'])){
                $data['image']=$this->uploadImage("Category",$data['image']);
                $this->categoryModel->store($data);
                $_SESSION['upload']="your record uploaded successfully!";
                redirect("Categories/create");
            }else{
                return $this->views("Category/create",$data);
            }
        }else{
            redirect("Categories/create");
        }
    }
    public function details(){
        $data=["category"=>$this->categoryModel->selectAll()];
        return $this->views("Category/details",$data);
    }
    public function delete(){
        $id=intval($_POST['id']);
        $record=$this->categoryModel->selectId($id);
        fileUnlink("Category",$record);
        $this->categoryModel->delete($id);
        $_SESSION['delete']="delete operation has done successfully!";
        redirect("Categories/details");
    }
    public function edit(){
        if ($_SERVER['REQUEST_METHOD']==="POST"){
            $id=intval($_POST['id']);
            $data=$this->categoryModel->selectId($id);
            $data=[
                "id"=>$data->id,
                "image"=>$data->image,
                "title"=>$data->title,
                "alt"=>$data->alt,
                "description"=>$data->description,
                "image_err"=>"",
                "title_err"=>"",
                "alt_err"=>"",
                "description_err"=>""
            ];
            return $this->views("Category/edit",$data);
        }else{
            redirect("Categories/details");
        }
    }
    public function update(){
        if ($_SERVER['REQUEST_METHOD']==="POST"){
            $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
            $data=[
                "id"=>intval($_POST['id']),
                "image"=>$_FILES['image'],
                "title"=>trim($_POST['title']),
                "alt"=>trim($_POST['alt']),
                "description"=>trim($_POST['description']),
                "image_err"=>"",
                "title_err"=>"",
                "alt_err"=>"",
                "description_err"=>""
            ];
            $directory=finalRoot."/public/images/category/".$data['image']['name'];
            $filetype=pathinfo($directory,PATHINFO_EXTENSION);
            if ($filetype!=="jpg" && $filetype!=="png" && $data['image']['size']>0){
                $data['image_err']="your image format is not jpg or png";
            }elseif ($data['image']['size']>5000000){
                $data['image_err']="your image size is more than 5 megabyte!";
            }
            if (empty($data['title'])){
                $data['title_err']="filling your title is necessary!";
            }elseif (strlen($data['title'])>50){
                $data['title_err']="your title is more than is more than 50 character!";
            }
            if (empty($data['alt'])){
                $data['alt_err']="filling your alt is necessary!";
            }elseif (strlen($data['alt'])>50){
                $data['alt_err']="your alt is more than is more than 50 character!";
            }
            if (empty($data['description'])){
                $data['description_err']="filling your description is necessary!";
            }elseif (strlen($data['description'])>500){
                $data['description_err']="your description is more than is more than 255 character!";
            }
            $record=$this->categoryModel->selectId($data['id']);
            if (empty($data['image_err']) && empty($data['title_err']) && empty($data['alt_err']) && empty($data['description_err'])){
                if (!empty($data['image']['name'])){
                    fileUnlink("Category",$record);
                 $data['image']=$this->uploadImage("Category",$data['image']);
                }else{
                    $data['image']=$record->image;
                }
                $this->categoryModel->update($data);
                $_SESSION['update']="your record updated successfully!";
                redirect("Categories/details");
            }else{
                $data['image']=$record->image;
                return $this->views("Category/edit",$data);
            }
        }else{
            redirect("Categories/details");
        }
    }
}