<?php
class Slider{
    private $db;
    public function __construct(){
        $this->db=new Database();
    }
    public function store($data){
        $this->db->query("insert into slider (image,alt,publish) values (:image,:alt,:publish)");
        $this->db->bind(":image",$data['image']);
        $this->db->bind(":alt",$data['alt']);
        $this->db->bind(":publish",$data['publish']);
        $this->db->execute();
    }
    public function selectAll(){
        $this->db->query("select * from slider");
        return $this->db->fetchAll();
    }
    public function selectId($id){
        $this->db->query("select * from slider where id=:id");
        $this->db->bind(":id",$id);
        return $this->db->fetch();
    }
    public function delete($id){
        $this->db->query("delete from slider where id=:id");
        $this->db->bind(":id",$id);
        $this->db->execute();
    }
    public function update($data){
        $this->db->query("update slider set image=:image,alt=:alt,publish=:publish where id=:id");
        $this->db->bind(":image",$data['image']);
        $this->db->bind(":alt",$data['alt']);
        $this->db->bind(":publish",$data['publish']);
        $this->db->bind(":id",$data['id']);
        $this->db->execute();
    }
}