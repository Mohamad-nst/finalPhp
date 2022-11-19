<?php

class Service
{
    private $db;
    public function __construct(){
        $this->db=new Database();
    }
    public function store($data){
        $this->db->query("insert into service (class,color,title,description) values (:class,:color,:title,:description)");
        $this->db->bind(":class",$data['class']);
        $this->db->bind(":color",$data['color']);
        $this->db->bind(":title",$data['title']);
        $this->db->bind(":description",$data['description']);
        $this->db->execute();
    }
    public function selectAll(){
        $this->db->query("select * from service");
        return $this->db->fetchAll();
    }
    public function findClass($data){
        $this->db->query("select * from service where class=:class");
        $this->db->bind(":class",$data['class']);
        $this->db->fetch();
        if ($this->db->rowCount()>0){
            return true;
        }else{
            return false;
        }
    }
    public function findTitle($data){
        $this->db->query("select * from service where title=:title");
        $this->db->bind(":title",$data['title']);
        $this->db->fetch();
        if ($this->db->rowCount()>0){
            return true;
        }else{
            return false;
        }
    }
    public function fetch($id){
        $this->db->query("select * from service where id=:id");
        $this->db->bind(":id",$id);
        return $this->db->fetch();
    }
    public function delete($id){
        $this->db->query("delete from service where id=:id");
        $this->db->bind(":id",$id);
        $this->db->execute();;
    }
    public function update($data){
        $this->db->query("update service set class=:class,color=:color,title=:title,description=:description where id=:id");
        $this->db->bind(":class",$data['class']);
        $this->db->bind(":color",$data['color']);
        $this->db->bind(":title",$data['title']);
        $this->db->bind(":description",$data['description']);
        $this->db->bind(":id",$data['id']);
        $this->db->execute();
    }

}