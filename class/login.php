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
			$result = $sql->select("SELECT tipo, nome, estado FROM pessoa WHERE email = :EMAIL AND senha = :SENHA",
			array(
				":EMAIL"=>$email,
				":SENHA"=>$phash
			));

			
		if($result == false){ //if(count($result)  > 0 ){
			echo "Email ou senha incorretos";
		}else{
			$estado = $result[0]["estado"];
			if($estado != 2){
				$_SESSION['tipo'] = $result[0]["tipo"];
				$_SESSION['nome'] = $result[0]["nome"];
				$_SESSION['logado'] = true;
				$auth = new auth();
				$auth->authIndex();
			}else{
				echo "Essa conta foi deletada!";
			}
	
		}
		
	}

	userLogin($email, $phash);
   

?>