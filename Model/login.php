<?php 

require_once("../config.php");
include_once "../class/auth.php";

class login{
	
	
	private $email;
	private $senha;
	private $phash;
	
	public function userLogin(){
		
			$link = new sql();
			$conn = $link->createConn();

			if(isset($_POST['email-input']) && isset($_POST['senha-input'])){
				$this->email = $_POST['email-input'];
				$this->senha = $_POST['senha-input'];
				$this->phash = md5($senha);
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

			
		
	}

}
	$stmt = new login();
	$stmt->userLogin();
   

?>