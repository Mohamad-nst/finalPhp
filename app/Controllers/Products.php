<?php

class Products extends Controller {
    private $productModel;
    private $sliderModel;
    private $titleModel;
    private $seoModel;

    public function __construct()
    {
        Controller::__construct();
        $this->productModel=$this->model("Product");
        $this->sliderModel=$this->model("Slider");
        $this->titleModel=$this->model("Title");
        $this->seoModel=$this->model("Seo");
    }
    public function index(){
        $data=[
            "product"=>$this->productModel->selectAll(),
            "slider"=>$this->sliderModel->selectAll(),
            "title"=>$this->titleModel->selectTitleProduct(),
            "seo"=>$this->seoModel->selectLatest()
        ];
        return $this->views("Product/index",$data);
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
            "description_err"=>"",
            "category"=>$this->productModel->categoryAll()

        ];
        $this->views("Product/create",$data);
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
                "description_err"=>"",
                "category"=>$_POST['category']
            ];
            $directory=finalRoot."/public/images/product/".$data['image']['name'];
            $filetype=pathinfo($directory,PATHINFO_EXTENSION);
            if (empty($data['image']['name'])){
                $data['image_err']="uploading image is necessary!";
            }elseif ($filetype!=="jpg" && $filetype!=="png"){
                $data['image_err']="your image format is not jpg or png";
            }elseif ($data['image']['size']>5000000){
                $data['image_err']="your image size is more than 5 megabyte!";
            }
            if (empty($data['title'])){
                $data['title_err']="uploading title is necessary!";
            }elseif (strlen($data['title'])>50){
                $data['title_err']="uploaded title is more than 50 character!";
            }
            if (empty($data['alt'])){
                $data['alt_err']="uploading alt is necessary!";
            }elseif (strlen($data['alt'])>50){
                $data['alt_err']="uploaded alt is more than 50 character!";
            }
            if (empty($data['description'])){
                $data['description_err']="uploading description is necessary!";
            }elseif (strlen($data['description'])>400){
                $data['description_err']="uploaded description is more than 50 character!";
            }
            if (empty($data['image_err']) && empty($data['title_err']) && empty($data['alt_err']) && empty($data['description_err'])){
                $data['image']=$this->uploadImage("Product",$data['image']);
                $this->productModel->store($data);
                $_SESSION['upload']="your record uploaded successfully!";
                redirect("Products/create");
            }else{
                $data["category"]=$this->productModel->categoryAll();
                return $this->views("Product/create",$data);
            }
        }else{
            redirect("Products/create");
        }
    }
    public function details(){
        $data=["product"=>$this->productModel->selectAll()];
        return $this->views("Product/details",$data);
    }
    public function delete(){
        $id=intval($_POST['id']);
        $record=$this->productModel->selectId($id);
        fileUnlink("Product",$record);
        $this->productModel->delete($id);
        $_SESSION['delete']="delete operation has done successfully!";
        redirect("Products/details");
    }
    public function edit(){
        if ($_SERVER['REQUEST_METHOD'] === "POST"){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $id = intval($_POST['id']);
            $record = $this->productModel->selectId($id);
            $data = [
                "id" => $record->id,
                "image" => $record->image,
                "title" => $record->title,
                "alt" => $record->alt,
                "description" => $record->description,
                "category" => $this->productModel->categoryAll(),
                "image_err" => "",
                "title_err" => "",
                "alt_err" => "",
                "description_err" => ""
            ];
            return $this->views("Product/edit", $data);
        }else{
            redirect("Products/details");
        }
    }
    public function update(){
        if ($_SERVER['REQUEST_METHOD']==="POST"){
            $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
            $id=intval($_POST['id']);
            $data=[
                "id"=>intval($_POST['id']),
                "image"=>$_FILES['image'],
                "title"=>trim($_POST['title']),
                "alt"=>trim($_POST['alt']),
                "description"=>trim($_POST['description']),
                "image_err"=>"",
                "title_err"=>"",
                "alt_err"=>"",
                "description_err"=>"",
                "category"=>$_POST['category']
            ];
            $directory=finalRoot."/public/images/product/".$data['image']['name'];
            $filetype=pathinfo($directory,PATHINFO_EXTENSION);
            if($filetype!=="jpg" && $filetype!=="png" && $data['image']['size']>0){
                $data['image_err']="your image format is not jpg or png";
            }elseif ($data['image']['size']>5000000){
                $data['image_err']="your image size is more than 5 megabyte!";
            }
            if (empty($data['title'])){
                $data['title_err']="uploading title is necessary!";
            }elseif (strlen($data['title'])>50){
                $data['title_err']="uploaded title is more than 50 character!";
            }
            if (empty($data['alt'])){
                $data['alt_err']="uploading alt is necessary!";
            }elseif (strlen($data['alt'])>50){
                $data['alt_err']="uploaded alt is more than 50 character!";
            }
            if (empty($data['description'])){
                $data['description_err']="uploading description is necessary!";
            }elseif (strlen($data['description'])>400){
                $data['description_err']="uploaded description is more than 50 character!";
            }
            $record=$this->productModel->selectId($id);
            if (empty($data['image_err']) && empty($data['title_err']) && empty($data['alt_err']) && empty($data['description_err'])){
                if (!empty($data['image']['name'])){
                    fileUnlink("Product",$record);
                    $data['image']=$this->uploadImage("Product",$data['image']);
                }else{
                    $data['image']=$record->image;
                }
                $this->productModel->update($data);
                $_SESSION['update']="your record updated successfully!";
                redirect("Products/details");
            }else{
                $data['image']=$record->image;
                $data['category']=$this->productModel->categoryAll();
                return $this->views("Product/edit",$data);
            }
        }
    }
}