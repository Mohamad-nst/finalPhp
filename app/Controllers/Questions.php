<?php
class Questions extends Controller{
    private $questionModel;
    private $sliderModel;
    private $titleModel;
    private $seoModel;
    public function __construct()
    {
        Controller::__construct();
        $this->questionModel=$this->model("Question");
        $this->sliderModel=$this->model("Slider");
        $this->titleModel=$this->model("Title");
        $this->seoModel=$this->model("Seo");
    }
    public function index(){
        $data=[
          "slider"=>$this->sliderModel->selectAll(),
          "question"=>$this->questionModel->selectAll(),
          "title"=>$this->titleModel->selectTitleFaq(),
          "seo"=>$this->seoModel->selectLatest()
        ];
        return $this->views("Question/index",$data);
    }
    public function create(){
        $data=[
            "part"=>"",
            "question"=>"",
            "answer"=>"",
            "question_err"=>"",
            "answer_err"=>"",
        ];
        $this->views("Question/create",$data);
    }
    public function store(){
        if ($_SERVER['REQUEST_METHOD']==="POST"){
            $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
            $data=[
                "part"=>$_POST['part'],
                "question"=>trim($_POST['question']),
                "answer"=>trim($_POST['answer']),
                "part_err"=>"",
                "question_err"=>"",
                "answer_err"=>"",
            ];
            if ($this->questionModel->findPart($data)){
                $data['part_err']="your part id is already existed!";
            }
            if (empty($data['question'])){
                $data['question_err']="filling question is necessary!";
            }elseif ($data['question']<10){
                $data['question_err']="your question is less than 10 characters!";
            }elseif ($this->questionModel->findQuestion($data)){
                $data['question_err']="your question id is already existed!";
            }
            if (empty($data['answer'])){
                $data['answer_err']="filling answer is necessary!";
            }
            if (empty($data['question_err']) && empty($data['answer_err']) && empty($data['part_err'])){
                $this->questionModel->store($data);
                $_SESSION['upload']="your record uploaded successfully!";
                redirect("Questions/create");
            }else{
                return $this->views("Question/create",$data);
            }
        }else{
            redirect("Questions/create");
        }
    }
    public function details(){
        $data=[
            "question"=>$this->questionModel->selectAll()
        ];
        return $this->views("Question/details",$data);
    }
    public function delete(){
        $id=intval($_POST['id']);
        $this->questionModel->delete($id);
        $_SESSION['delete']="your record deleted successfully!";
        redirect("Questions/details");
    }
    public function edit(){
        if ($_SERVER['REQUEST_METHOD']==="POST"){
            $id=intval($_POST['id']);
            $record=$this->questionModel->selectId($id);
            $data=[
                "id"=>$record->id,
                "part"=>$record->part,
                "question"=>$record->question,
                "answer"=>$record->answer,
                "question_err"=>"",
                "answer_err"=>"",
            ];
            return $this->views("Question/edit",$data);
        }else{
           redirect("Questions/details");
        }
    }
    public function update(){
        if ($_SERVER['REQUEST_METHOD']==="POST") {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                "id"=>intval($_POST['id']),
                "part" => $_POST['part'],
                "question" => trim($_POST['question']),
                "answer" => trim($_POST['answer']),
                "question_err" => "",
                "answer_err" => "",
            ];
            if ($this->questionModel->findPart($data)){
                $data['part_err']="your part id is already existed!";
            }
            if (empty($data['question'])) {
                $data['question_err'] = "filling question is necessary!";
            } elseif ($data['question'] < 10) {
                $data['question_err'] = "your question is less than 10 characters!";
            }elseif ($this->questionModel->findQuestion($data)){
                $data['question_err']="your question id is already existed!";
            }
            if (empty($data['answer'])) {
                $data['answer_err'] = "filling answer is necessary!";
            }
            if (empty($data['question_err']) && empty($data['answer_err']) && empty($data['part_err'])){
                $this->questionModel->update($data);
                $_SESSION['update']="your record updated successfully!";
                redirect("Questions/details");
            }else{
                return $this->views("Question/edit",$data);
            }
        }else{
            redirect("Questions/details");
        }
    }
}
