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

			if(isset($_POST['nome'])){
				$nome = $_POST['nome'];
				$v["nome"] = $nome;
			}
			
			if(isset($_POST['email'])){
				$email = $_POST['email'];
				$v["email"] = $email;
			}

			if(isset($_POST['senha'])){
				$senha = $_POST['senha'];
				$phash = md5($senha);	
				$v["senha"] = $phash;			
			}
			
			if(isset($_POST['tipo'])){
				$tipo = $_POST['tipo'];
				$v["tipo"] = $tipo;	
			}
						
			
			if(isset($_POST['id'])){
				$v["id"] = $_POST['id'];
			}

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
	var_dump($v);

	if(isset($v["cutkn"])){
        $_SESSION['cutoken'] = $v["cutkn"];
        
        if($_SESSION['cutoken'] == true){
            $stmt->insertUser();
            $_SESSION['cutoken'] = false;
        }
    }else if(isset($v["eutkn"])){
        $_SESSION['eutoken'] = $v["eutkn"];
       
        if($_SESSION['eutoken'] == true){
            $stmt->editUser();
            $_SESSION['eutoken'] = false;
        }
    }else if(isset($v["dutkn"])){
        $_SESSION['dutoken'] = $v["dutkn"];
       
        if($_SESSION['dutoken'] == true){
            $stmt->deleteUser();
            $_SESSION['dutoken'] = false;
        }
	}



?>