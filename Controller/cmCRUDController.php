<?php

require_once("../config.php");
include_once "../class/sql.php";
include_once "../Model/cmCRUD.php";

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
             
            if(isset($_POST['cct'])){
                $v["cctkn"] = $_POST['cct'];
            }

            if(isset($_POST['ect'])){
                $v["ectkn"] = $_POST['ect'];
            }

        }
    
        //id do post
        if(isset($_GET['id'])){
            $v["post_id"] = $_GET['id'];
        }
        
        //nome do usuario do comentario
        if(isset($_GET['user'])){
            $v["resp_user"] = $_GET['user'];
        }
        
        //id do comentario que será respondido
        if(isset($_GET['resp'])){
            $v["resp_id"] = $_GET['resp'];
        }
        
        //id do comentario a ser editado
        if(isset($_GET['ed'])){
            $v["ed_id"] = $_GET['ed'];
        }
        
        //id do comentario q vai ser deletado
        if(isset($_GET['del'])){
            
            $v["del_id"] = $_GET['del'];
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

        //tokens pras chamadas das funções do model
        
        if(isset($v["cctkn"])){
        $_SESSION['cctoken'] = $v["cctkn"];
      
        if($_SESSION['cctoken'] == true){
            $stmt->insertComment();
            $_SESSION['cctoken'] = false;
        }
        }else if(isset($v["ectkn"])){
        $_SESSION['ectoken'] = $v["ectkn"];
    
        if($_SESSION['ectoken'] == true){
            $edID = $v["ed_id"];
            $stmt->editComment($edID);
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