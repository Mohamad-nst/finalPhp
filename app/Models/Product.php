<?php
class Product{
    private $db;
    public function __construct(){
        $this->db=new Database();
    }
    public function categoryAll(){
        $this->db->query("select id,title from category");
        return $this->db->fetchAll();
    }
    public function store($data){
        $this->db->query("insert into product (image,title,alt,description,categoryId) values (:image,:title,:alt,:description,:categoryId)");
        $this->db->bind(":image",$data['image']);
        $this->db->bind(":title",$data['title']);
        $this->db->bind(":alt",$data['alt']);
        $this->db->bind(":description",$data['description']);
        $this->db->bind(":categoryId",$data['category']);
        $this->db->execute();
    }
    public function selectAll(){
        $this->db->query("select category.title as titleCat,product.id,product.image,product.alt,product.title,product.description,product.createdAt from product inner join category on product.categoryId = category.id");
        return $this->db->fetchAll();
    }
    public function selectId($id){
        $this->db->query("select * from product where id=:id");
        $this->db->bind(":id",$id);
        return $this->db->fetch();
    }
    public function delete($id){
        $this->db->query("delete from product where id=:id");
        $this->db->bind(":id",$id);
        $this->db->execute();
    }
    public function update($data){
        $this->db->query("update product set image=:image,title=:title,alt=:alt,description=:description,categoryId=:categoryId where id=:id");
        $this->db->bind(":image",$data['image']);
        $this->db->bind(":title",$data['title']);
        $this->db->bind(":alt",$data['alt']);
        $this->db->bind(":description",$data['description']);
        $this->db->bind(":categoryId",$data['category']);
        $this->db->bind(":id",$data['id']);
        $this->db->execute();
    }
    public function selectCatProducts($title){
        $this->db->query("select * from category where title=:title");
        $this->db->bind(":title",$title);
        $record=$this->db->fetch();
        $this->db->query("select * from product where categoryId=:categoryId");
        $this->db->bind(":categoryId",$record->id);
        return $this->db->fetchAll();
    }
}