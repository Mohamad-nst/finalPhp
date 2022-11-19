<?php
class Team{
    private $db;
    public function __construct(){
        $this->db=new Database();
    }
    public function store($data){
        $this->db->query("insert into team (image,alt,fullName,job,description,class) values (:image,:alt,:fullName,:job,:description,:class)");
        $this->db->bind(":image",$data['image']);
        $this->db->bind(":alt",$data['alt']);
        $this->db->bind(":fullName",$data['fullName']);
        $this->db->bind(":job",$data['job']);
        $this->db->bind(":description",$data['description']);
        $this->db->bind(":class",$data['class']);
        $this->db->execute();
    }
    public function selectAll(){
        $this->db->query("select * from team");
        return $this->db->fetchAll();
    }
    public function selectId($id){
        $this->db->query("select * from team where id=:id");
        $this->db->bind(":id",$id);
        return $this->db->fetch();
    }
    public function delete($id){
        $this->db->query("delete from team where id=:id");
        $this->db->bind(":id",$id);
        $this->db->execute();
    }
    public function update($data){
        $this->db->query("update team set image=:image,alt=:alt,fullName=:fullName,job=:job,description=:description,class=:class where id=:id");
        $this->db->bind(":image",$data['image']);
        $this->db->bind(":alt",$data['alt']);
        $this->db->bind(":fullName",$data['fullName']);
        $this->db->bind(":job",$data['job']);
        $this->db->bind(":description",$data['description']);
        $this->db->bind(":class",$data['class']);
        $this->db->bind(":id",$data['id']);
        $this->db->execute();
    }
}
