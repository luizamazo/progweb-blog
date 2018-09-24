<?php 

require_once("../config.php");
include_once "../class/auth.php";

class login{
	

	
	public function userLogin(){
		
			$link = new sql();
			$conn = $link->createConn();

			if(isset($_POST['email-input']) && isset($_POST['senha-input'])){
				$email = $_POST['email-input'];
				$senha = $_POST['senha-input'];
				$phash = md5($senha);
				$sql = new sql();
			$result = $sql->select("SELECT tipo, nome, estado FROM pessoa WHERE email = :EMAIL AND senha = :SENHA",
			array(
				":EMAIL"=>$email,
				":SENHA"=>$phash
			));

			
			if($result == false){ //if(count($result)  > 0 ){
				echo "<script>alert('Email ou senha incorretos!'); window.location = '../View/login.html';</script>";
			}else{
				$estado = $result[0]["estado"];
				if($estado != 2){
					$_SESSION['tipo'] = $result[0]["tipo"];
					$_SESSION['nome'] = $result[0]["nome"];
					$_SESSION['logado'] = true;
					$auth = new auth();
					$auth->authIndex();
				}else{
					echo "<script>alert('Essa conta não existe mais!'); window.location = '../View/cadastro.html';</script>";
				}
		
			}
		}

			
		
	}

}
	$stmt = new login();
	$stmt->userLogin();
   

?>