<?php
class Home extends Controller{
    private $sliderModel;
    private $categoryModel;
    private $seoModel;
    private $productsModel;
    private $teamModel;
    private $serviceModel;
    private $questionModel;
    private $titleModel;
    public function __construct()
    {
        $this->sliderModel=$this->model("Slider");
        $this->categoryModel=$this->model("Category");
        $this->seoModel=$this->model("Seo");
        $this->productsModel=$this->model("Product");
        $this->teamModel=$this->model("Team");
        $this->serviceModel=$this->model("Service");
        $this->questionModel=$this->model("Question");
        $this->titleModel=$this->model("Title");
    }
    public function index(){
        $data=[
            "seo"=>$this->seoModel->selectLatest(),
            "slider"=>$this->sliderModel->selectAll(),
            "category"=>$this->categoryModel->selectAll(),
            "team"=>$this->teamModel->selectAll(),
            "service"=>$this->serviceModel->selectAll(),
            "question"=>$this->questionModel->selectAll(),
            "title"=>$this->titleModel->selectAll(),
            "titleCategory"=>$this->titleModel->selectTitleCategory(),
            "titleTeam"=>$this->titleModel->selectTitleTeam(),
            "titleService"=>$this->titleModel->selectTitleService(),
            "titleProduct"=>$this->titleModel->selectTitleProduct(),
            "titleQuestion"=>$this->titleModel->selectTitleFaq(),
        ];
        return $this->views("Home/index",$data);
    }
    public function category($title){
        $data=[
            "seo"=>$this->seoModel->selectLatest(),
            "slider"=>$this->sliderModel->selectAll(),
            "catProducts"=>$this->productsModel->selectCatProducts($title),
            "titleCatProduct"=>$this->titleModel->selectTitleCatProducts()
        ];
        return $this->views("Home/category",$data);
    }
}