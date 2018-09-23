<?php

require_once("../config.php");
include_once "../class/sql.php";
include_once "../model/cmCRUD.php";

class cmCRUDController{

    public function cmInput(){
        
        $link = new sql();
        $conn = $link->createConn();
    
	    if(isset($_POST['submit'])){
        
            $v = array();
    
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

            if(isset($_POST['ect'])){
                $v["ectkn"] = $_POST['ect'];
            }

            if(isset($_POST['dct'])){
                $v["dctkn"] = $_POST['dct'];
            }

            return $v;

        }
    }

    public function __construct(){
        $this->cmInput();       
    }
    
}
    $obj = new cmCRUDController();
    $stmt = new cmCRUD();
    $v = $obj->cmInput();
   
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
            $stmt->deleteComment();
            $_SESSION['dctoken'] = false;
        }
    }

  
?>