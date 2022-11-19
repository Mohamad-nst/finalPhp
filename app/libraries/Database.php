<?php
class Database{
    private $dbHost=dbHost;
    private $dbName=dbName;
    private $dbUserName=dbUserName;
    private $dbPassword=dbPassword;
    private $dbh;
    private $stmt;
    private $err;
    public function __construct(){
        try {
            $this->dbh=new PDO("mysql:host=$this->dbHost;dbname=$this->dbName;charset=utf8",$this->dbUserName,$this->dbPassword);
            $this->dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
        }catch (PDOException $e){
            $this->err=$e->getMessage();
            echo $this->err;
        }
    }
    public function query($sql){
        $this->stmt=$this->dbh->prepare($sql);
    }
    public function bind($param,$value){
        $this->stmt->bindParam($param,$value);
    }
    public function execute(){
        $this->stmt->execute();
    }
    public function fetch(){
        $this->execute();
        return $this->stmt->fetch();
    }
    public function fetchAll(){
        $this->execute();
        return $this->stmt->fetchAll();
    }
    public function rowCount(){
        return $this->stmt->rowCount();
    }
}
$db=new Database();