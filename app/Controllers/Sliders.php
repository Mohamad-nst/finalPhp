<?php
class Sliders extends Controller{
    private $sliderModel;
    private $seoModel;
    public function __construct()
    {
        Controller::__construct();
        $this->sliderModel=$this->model("Slider");
        $this->seoModel=$this->model("Seo");
    }
    public function index(){
        $data=[
            "slider"=>$this->sliderModel->selectAll(),
            "seo"=>$this->seoModel->selectLatest()
        ];
        return $this->views("Slider/index",$data);
    }
    public function create(){
        $data=[
           "image"=>"",
           "alt"=>"",
           "image_err"=>"",
           "alt_err"=>""
        ];
        return $this->views("Slider/create",$data);
    }
    public function store(){
        if ($_SERVER['REQUEST_METHOD']==="POST"){
            $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
            $data=[
                "image"=>$_FILES['image'],
                "alt"=>trim($_POST['alt']),
                "publish"=>$_POST['publish'],
                "image_err"=>"",
                "alt_err"=>""
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
            if (empty($data['alt'])){
                $data['alt_err']="uploading alt is necessary!";
            }elseif (strlen($data['alt'])>50){
                $data['alt_err']="uploaded alt is more than 50 character!";
            }
            if (empty($data['image_err']) && empty($data['alt_err'])){
                $data['image']=$this->uploadImage("slider",$data['image']);
                $this->sliderModel->store($data);
                $_SESSION['upload']="your record uploaded successfully!";
                redirect("Sliders/create");
            }else{
                return $this->views("Slider/create",$data);
            }
        }
    }
    public function details(){
        $data=["slider"=>$this->sliderModel->selectAll()];
        return $this->views("slider/details",$data);
    }
    public function delete(){
        $id=intval($_POST['id']);
        $record=$this->sliderModel->selectId($id);
        fileUnlink("Slider",$record);
        $this->sliderModel->delete($id);
        $_SESSION['delete']="delete operation has done successfully!";
        redirect("Sliders/details");
    }
    public function edit(){
        if ($_SERVER['REQUEST_METHOD']==="POST"){
            $id=intval($_POST['id']);
            $data=$this->sliderModel->selectId($id);
            $data=[
                "id"=>$data->id,
                "image"=>$data->image,
                "alt"=>$data->alt,
                "image_err"=>"",
                "alt_err"=>""
            ];
            return $this->views("Slider/edit",$data);
        }else{
            redirect("Sliders/details");
        }
    }
    public function update(){
        if ($_SERVER['REQUEST_METHOD']==="POST"){
            $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
            $data=[
                "id"=>intval($_POST['id']),
                "image"=>$_FILES['image'],
                "alt"=>trim($_POST['alt']),
                "publish"=>$_POST['publish'],
                "image_err"=>"",
                "alt_err"=>""
            ];
            $directory=finalRoot."/public/images/slider/".$data['image']['name'];
            $filetype=pathinfo($directory,PATHINFO_EXTENSION);
            if ($filetype!=="jpg" && $filetype!=="png" && $data['image']['size']>0){
                $data['image_err']="your image format is not jpg or png";
            }elseif ($data['image']['size']>5000000){
                $data['image_err']="your image size is more than 5 megabyte!";
            }
            if (empty($data['alt'])){
                $data['alt_err']="uploading alt is necessary!";
            }elseif (strlen($data['alt'])>50){
                $data['alt_err']="uploaded alt is more than 50 character!";
            }
            $record=$this->sliderModel->selectId($data['id']);
            if (empty($data['image_err']) && empty($data['alt_err'])){
                if (!empty($data['image']['name'])){
                    fileUnlink("slider",$record);
                    $data['image']=$this->uploadImage("slider",$data['image']);
                }else{
                    $data['image']=$record->image;
                }
                $this->sliderModel->update($data);
                $_SESSION['update']="your record updated successfully!";
                redirect("Sliders/details");
            }else{
                $data['image']=$record->image;
                return $this->views("Slider/edit",$data);
            }
        }else{
            redirect("sliders/details");
        }
    }
}