<?php
class Seo{
    private $db;
    public function __construct(){
        $this->db=new Database();
    }
    public function store($data){
        $this->db->query("insert into seo (title,keywords,description,author) values (:title,:keywords,:description,:author)");
        $this->db->bind(":title",$data['title']);
        $this->db->bind(":keywords",$data['keywords']);
        $this->db->bind(":description",$data['description']);
        $this->db->bind(":author",$data['author']);
        $this->db->execute();
    }
    public function selectAll(){
        $this->db->query("select * from seo");
        return $this->db->fetchAll();
    }
    public function selectLatest(){
        $this->db->query("select * from seo order by id desc limit 1 offset 0");
        return $this->db->fetch();
    }
    public function delete($id){
        $this->db->query("delete from seo where id=:id");
        $this->db->bind(":id",$id);
        $this->db->execute();
    }
}
