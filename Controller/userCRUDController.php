<?php 

require_once("../config.php");
include_once "../class/sql.php";
include_once "../model/userCRUD.php";

class userCRUDController{

	public function userInput(){
		$link = new sql();
		$conn = $link->createConn();

		if(isset($_POST['submit'])){
			
			$v = array();

			$nome = $_POST['nome'];
			$email = $_POST['email'];
			$senha = $_POST['senha'];
			$phash = md5($senha);
			$tipo = $_POST['tipo'];	
			$v["nome"] = $nome;
			$v["email"] = $email;
			$v["senha"] = $phash;
			$v["tipo"] = $tipo;
			
			//$cod = $_POST['cod'];
		

		if(isset($_GET['id'])){
			$v["id"] = $_GET['id'];
		}
		 
		if(isset($_POST['cut'])){
			$v["cutkn"] = $_POST['cut'];
		}

		if(isset($_POST['eut'])){
			$v["eutkn"] = $_POST['eut'];
		}

		if(isset($_POST['dut'])){
			$v["dutkn"] = $_POST['dut'];
		}

			return $v;
		}

	}

	public function __construct(){
		$this->userInput();
	}

}	

	$obj = new userCRUDController();
	$stmt = new userCRUD();
	$v = $obj->userInput();

	if(isset($v["cutkn"])){
        $_SESSION['cutoken'] = $v["cutkn"];
        
        if($_SESSION['cutoken'] == true){
            $stmt->insertUser();
            $_SESSION['cutoken'] = false;
        }
    }else if(isset($v["eutkn"])){
        $_SESSION['eutoken'] = $v["eutkn"];
       
        if($_SESSION['eutoken'] == true){
            $stmt->editPost();
            $_SESSION['eutoken'] = false;
        }
    }else if(isset($v["dutkn"])){
        $_SESSION['dutoken'] = $v["dutkn"];
       
        if($_SESSION['dutoken'] == true){
            $stmt->deletePost();
            $_SESSION['dutoken'] = false;
        }
	}
	
//	$t = new userCRUDController();
//	$v = $t->userInput();
//	var_dump($v);

?>