<?php
class Title{
    private $db;
    public function __construct(){
        $this->db=new Database();
    }
    public function findTitle($data){
        $this->db->query("select * from title where title=:title");
        $this->db->bind(":title",$data['title']);
        $this->db->fetch();
        if ($this->db->rowCount()>0){
            return true;
        }else{
            return false;
        }
    }
    public function store($data){
        $this->db->query("insert into title (title,description) values (:title,:description)");
        $this->db->bind(":title",$data['title']);
        $this->db->bind(":description",$data['description']);
        $this->db->execute();
    }
    public function selectAll(){
        $this->db->query("select * from title");
        return $this->db->fetchAll();
    }
    public function selectId($id){
        $this->db->query("select * from title where id=:id");
        $this->db->bind(":id",$id);
        return $this->db->fetch();
    }
    public function delete($id){
        $this->db->query("delete from title where id=:id");
        $this->db->bind(":id",$id);
        $this->db->execute();
    }
    public function update($data){
        $this->db->query("update title set title=:title,description=:description where id=:id");
        $this->db->bind(":title",$data['title']);
        $this->db->bind(":description",$data['description']);
        $this->db->bind(":id",$data['id']);
        $this->db->execute();
    }
    public function selectTitleTeam(){
        $this->db->query("select * from title where title=:title");
        $this->db->bind(":title","team");
        return $this->db->fetch();
    }
    public function selectTitleFaq(){
        $this->db->query("select * from title where title=:title");
        $this->db->bind(":title","f.a.q");
        return $this->db->fetch();
    }
    public function selectTitleService(){
        $this->db->query("select * from title where title=:title");
        $this->db->bind(":title","Services");
        return $this->db->fetch();
    }
    public function selectTitleCategory(){
        $this->db->query("select * from title where title=:title");
        $this->db->bind(":title","categories");
        return $this->db->fetch();
    }
    public function selectTitleProduct(){
        $this->db->query("select * from title where title=:title");
        $this->db->bind(":title","products");
        return $this->db->fetch();
    }
    public function selectTitleContact(){
        $this->db->query("select * from title where title=:title");
        $this->db->bind(":title","contact");
        return $this->db->fetch();
    }
    public function selectTitleCatProducts(){
        $this->db->query("select * from title where title=:title");
        $this->db->bind(":title","Category Products");
        return $this->db->fetch();
    }
}