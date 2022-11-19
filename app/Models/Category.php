<?php
class Category{
    private $db;
    public function __construct()
    {
        $this->db=new Database();
    }
    public function store($data){
        $this->db->query("insert into category (image,title,alt,description) values (:image,:title,:alt,:description)");
        $this->db->bind(":image",$data['image']);
        $this->db->bind(":title",$data['title']);
        $this->db->bind(":alt",$data['alt']);
        $this->db->bind(":description",$data['description']);
        $this->db->execute();
    }
    public function selectAll(){
        $this->db->query("select * from category");
        return $this->db->fetchAll();
    }
    public function selectId($id){
        $this->db->query("select * from category where id=:id");
        $this->db->bind(":id",$id);
        return $this->db->fetch();
    }
    public function delete($id){
        $this->db->query("delete from category where id=:id");
        $this->db->bind(":id",$id);
        $this->db->execute();
    }
    public function update($data){
        $this->db->query("update category set image=:image,title=:title,alt=:alt,description=:description where id=:id");
        $this->db->bind(":image",$data['image']);
        $this->db->bind(":title",$data['title']);
        $this->db->bind(":alt",$data['alt']);
        $this->db->bind(":description",$data['description']);
        $this->db->bind(":id",$data['id']);
        $this->db->execute();
    }
}