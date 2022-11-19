<?php
class Question{
    private $db;
    public function __construct(){
        $this->db=new Database();
    }
    public function store($data){
        $this->db->query("insert into question (part,question,answer) values (:part,:question,:answer)");
        $this->db->bind(":part",$data['part']);
        $this->db->bind(":question",$data['question']);
        $this->db->bind(":answer",$data['answer']);
        $this->db->execute();
    }
    public function findPart($data){
        $this->db->query("select * from question where part=:part");
        $this->db->bind(":part",$data['part']);
        $this->db->fetch();
        if ($this->db->rowCount()>0){
            return true;
        }else{
            return false;
        }
    }
    public function findQuestion($data){
        $this->db->query("select * from question where question=:question");
        $this->db->bind(":question",$data['question']);
        $this->db->fetch();
        if ($this->db->rowCount()>0){
            return true;
        }else{
            return false;
        }
    }
    public function selectAll(){
        $this->db->query("select * from question");
        return $this->db->fetchAll();
    }
    public function selectId($id){
        $this->db->query("select * from question where id=:id");
        $this->db->bind(":id",$id);
        return $this->db->fetch();
    }
    public function delete($id){
        $this->db->query("delete from question where id=:id");
        $this->db->bind(":id",$id);
        $this->db->execute();
    }
    public function update($data){
        $this->db->query("update question set part=:part,question=:question,answer=:answer where id=:id");
        $this->db->bind(":part",$data['part']);
        $this->db->bind(":question",$data['question']);
        $this->db->bind(":answer",$data['answer']);
        $this->db->bind(":id",$data['id']);
        $this->db->execute();
    }
}
