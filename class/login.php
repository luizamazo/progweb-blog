<?php 

require_once("../config.php");

	include "auth.php";

	$link = new sql();
	$conn = $link->createConn();
	
	$email = $_POST['email-input'];
	$senha = $_POST['senha-input'];
	$phash = md5($senha);

	function userLogin($email, $phash){
		$sql = new sql();
		$result = $sql->select("SELECT tipo FROM pessoa WHERE email = :EMAIL AND senha = :SENHA",
		array(
			":EMAIL"=>$email,
			":SENHA"=>$phash
		));

		if(count($result)  > 0){
			$_SESSION['tipo'] = $result;
			$_SESSION['logado'] = true;
			$auth = new auth();
			$auth->authIndex();
			//header("location: auth.php");
		}else{
			echo "Email ou senha incorretos";
		}
	}

	userLogin($email, $phash);
   

?>