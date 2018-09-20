<?php

 class dbConn{

    private $conn;

    public function createConn(){
        try{
             $this->conn = new PDO("mysql:host=localhost;dbname=mtDB", "root", "");
             return $this->conn;
        }catch(PDOException $e){
            echo 'Conexão falhou: ' . $e->getMessage();
        }     
    }
       //toda vez que eu instanciar, inicio conexao com o bd
    public function __construct(){
        $this->createConn();
    }
 }

?>