<?php

require_once("../config.php");
include_once "../class/sql.php";
include_once "../model/cmCRUD.php";

class cmCRUDController{

    public function cmInput(){
        
        $link = new sql();
        $conn = $link->createConn();
    
        $v = array();

	    if(isset($_POST['submit'])){
    
           if(isset($_POST['conteudo'])){
                $autor = $_SESSION['nome'];
                $conteudo = $_POST['conteudo'];
                $v["autor"] = $autor;  
                $v["conteudo"] = $conteudo;
            }   
           
            if(isset($_GET['id'])){
                $v["post_id"] = $_GET['id'];
            }
             
            if(isset($_POST['cct'])){
                $v["cctkn"] = $_POST['cct'];
            }

        }

        if(isset($_GET['del'])){
            //id do comentario q vai ser deletado
            $v["del_id"] = $_GET['del'];
        }

        if(isset($_GET['ect'])){
            $v["ectkn"] = $_GET['ect'];
        }

        if(isset($_GET['dct'])){
            $v["dctkn"] = $_GET['dct'];
        }

        return $v;
    }

    public function __construct(){
        $this->cmInput();       
    }
    
}
    $obj = new cmCRUDController();
    $stmt = new cmCRUD();
    $v = $obj->cmInput();
    var_dump($v);

        if(isset($v["cctkn"])){
        $_SESSION['cctoken'] = $v["cctkn"];
      
        if($_SESSION['cctoken'] == true){
            $stmt->insertComment();
            $_SESSION['cctoken'] = false;
        }
        }else if(isset($v["ectkn"])){
        $_SESSION['ectoken'] = $v["ectkn"];
    
        if($_SESSION['ectoken'] == true){
            $stmt->editComment();
            $_SESSION['ectoken'] = false;
        }
        }else if(isset($v["dctkn"])){
        $_SESSION['dctoken'] = $v["dctkn"];
    
        if($_SESSION['dctoken'] == true){
            $delID = $v["del_id"];
            $stmt->deleteComment($delID);
            $_SESSION['dctoken'] = false;
        }
    }

  
?>