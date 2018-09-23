<?php

require_once("../config.php");
include_once "../class/sql.php";
include_once "../controller/userCRUDController.php";

class userCRUD{

	function insertUser(){
		
		$sql = new sql();
		$uc = new userCRUDController();
		$v = $uc->userInput();

		$nome = $v["nome"];
		$email = $v["email"];
		$senha = $v["senha"];
		$estado = 1;

		if(!isset($_SESSION['tipo'])){
			$tipo = 4;
		}else{
			$tipo = $v["tipo"];
		}

		$result = $sql->query("INSERT INTO pessoa(nome, email, senha, tipo, estado) 
		VALUES(:NOME, :EMAIL, :SENHA, :TIPO, :ESTADO)", array(
			":NOME"=>$nome,
			":EMAIL"=>$email,
			":SENHA"=>$senha,
			":TIPO"=>$tipo,
			":ESTADO"=>$estado
		));

		if($tipo == 4){
			$_SESSION['nome'] = $v["nome"];
			$_SESSION['logado'] = true;
			$_SESSION['tipo'] = 4;
			header("Location: /progweb-blog/view/userIndex.php");
		}else{
			echo "<script>alert('Usuário criado com sucesso!'); window.location = '../view/admGIndex.php';</script>";
	
		}
		
	}

	function selectUser(){
		$sql = new sql();
		$result = $sql->select("SELECT id, nome, email, tipo, estado FROM pessoa", array());
		return $result;
	}

	function editUser(){
		
		$sql = new sql();
		$uc = new userCRUDController();
		$v = $uc->userInput();

		$nome = $v["nome"];
		$email = $v["email"];
		$senha = $v["senha"];
		$tipo = $v["tipo"];
		$cod = $v["id"];

		$result = $sql->query("UPDATE pessoa SET nome = :NOME, email = :EMAIL, 
		senha = :SENHA, tipo = :TIPO WHERE id = :ID", array(
				":NOME"=>$nome,
				":EMAIL"=>$email,
				":SENHA"=>$senha,
				":TIPO"=>$tipo,
				":ID" => $cod
			));
			echo "<script>alert('Alterado com sucesso!'); window.location = '../view/admGusercontrol.php';</script>";
			exit();
	}

     function deleteUser(){
		
		$sql = new sql();
		$uc = new userCRUDController();
		$v = $uc->userInput();
		$cod = $v["id"];
		$email = $v["email"];
		$estado = 2;
		

		$result = $sql->query("UPDATE pessoa SET estado = :ESTADO, email = :EMAIL WHERE id = :ID", array(
			":ESTADO"=>$estado,
			":EMAIL"=>$email,
			":ID"=>$cod
		));

		echo "<script>alert('Exclusão virtual realizada com sucesso!'); window.location = '../view/admGusercontrol.php';</script>";
		exit();
	}
}

//$t = new userCRUD();
//$v = $t->insertUser();
//var_dump($v);

?>









