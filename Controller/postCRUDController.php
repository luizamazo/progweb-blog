<?php

require_once("../config.php");
include_once "../class/sql.php";
include_once "../Model/postCRUD.php";
include_once "../Model/cmCRUD.php";

class postCRUDController{

    public function postInput(){
        $link = new sql();
        $conn = $link->createConn();
        
        
	    if(isset($_POST['submit'])){
        
            $v = array();

            if(isset($_POST['titulo']) && isset($_POST['conteudo'])){
                $autor = $_SESSION['nome'];
                $titulo = $_POST['titulo'];
                $conteudo = $_POST['conteudo'];
                $v["autor"] = $autor; 
                $v["titulo"] = $titulo; 
                $v["conteudo"] = $conteudo;
            }
            
            if(isset($_GET['id'])){
                $v["id"] = $_GET['id'];
            }
             
            if(isset($_POST['cpt'])){
                $v["cptkn"] = $_POST['cpt'];
            }

            if(isset($_POST['ept'])){
                $v["eptkn"] = $_POST['ept'];
            }

            if(isset($_POST['dpt'])){
                $v["dptkn"] = $_POST['dpt'];
            }

            return $v;

        }
    }

    public function __construct(){
        $this->postInput();       
    }
    
}
 
    $obj = new postCRUDController();
    $stmt = new postCRUD();
    $objc = new cmCRUD();
    $v = $obj->postInput();
  
    if(isset($v["cptkn"])){
        $_SESSION['cptoken'] = $v["cptkn"];
        
        if($_SESSION['cptoken'] == true){
            $stmt->insertPost();
            $_SESSION['cptoken'] = false;
        }
    }else if(isset($v["eptkn"])){
        $_SESSION['eptoken'] = $v["eptkn"];
       
        if($_SESSION['eptoken'] == true){
            $stmt->editPost();
            $_SESSION['eptoken'] = false;
        }
    }else if(isset($v["dptkn"])){
        $_SESSION['dptoken'] = $v["dptkn"];
       
        if($_SESSION['dptoken'] == true){
           $v = $objc->linkdelCMPost();
           $stmt->deletePost();
           $_SESSION['dptoken'] = false;
        }
    }
    
   /* public function callInsert(){

        if(method_exists($this, 'insertPost')){
            $this->insertPost($autor, $titulo, $conteudo);
        }

        if($_SESSION['edit'] == true){
            $postC->editPost();
        }
     } 

    public function checkAction(){
        $test = new postCRUD();
        $test->callInsert();
    }*/
    
?>

