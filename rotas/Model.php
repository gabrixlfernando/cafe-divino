<?php 

class Model{

    protected $db;

    public function __construct(){
        try{
            $this->db = new PDO('mysql:dbname='.DB_NAME.';host='.DB_HOST,DB_USER, DB_PASS);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e){
           echo "Fala de cionexão: " .$e->getMessage();
        }
    }
}