<?php

require_once("../config.php");
	
	include "sql.php";

	$link = new sql();
	$conn = $link->createConn();
	//pra mysqli $link = dbConn();
	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$senha = $_POST['senha'];
	$phash = md5($senha);
	$tipo = $_POST['tipo'];	
	$estado = 1;

	
	function insertUser($nome, $email, $phash, $tipo, $estado){
		$sql = new sql();
		$result = $sql->query("INSERT INTO pessoa(nome, email, senha, tipo, estado) 
		VALUES(:NOME, :EMAIL, :SENHA, :TIPO, :ESTADO)", array(
			":NOME"=>$nome,
			":EMAIL"=>$email,
			":SENHA"=>$phash,
			":TIPO"=>$tipo,
			":ESTADO"=>$estado
		));
		
		if($tipo == 1){
			header("Location: userIndex.php");
		}
		
	}

	insertUser($nome, $email, $phash, $tipo, $estado);


	/*function selectUser(){
		$sql = new sql();
			$result = $sql->select("SELECT * FROM Usuarios WHERE email = :EMAIL AND senha = :SENHA", array(
				":EMAIL"=>$email,
				":SENHA"=>$phash,
			));
			echo json_encode($result);
			echo "select ok";
	}
	*/
	
	/*function deleteUser(){
		$sql = new sql();
		$result = $sql->query("UPDATE Usuarios SET estado = :ESTADO WHERE id = :ID", array(
			":ESTADO"=>$estado,
			":ID"=>$id,
		));
		echo "deletado virtualmente ok";
}
*/

	//model??

	/*
		


	*/

		/*function updateUser(){
		
		$sql = new sql();
		$result = $sql->query("UPDATE Usuarios SET nome = :USUARIO, email = :EMAIL, 
		senha = :SENHA WHERE id = :ID", array(
				":USUARIO"=>$usuario,
				":EMAIL"=>$email,
				":SENHA"=>$phash,
				":ID" => $id
			));
		echo "alterado ok";

	}
	*/
   
	























	//MYSQLI
//////////////////////////////////////////////////////////////////////////////
	// $sql = "INSERT INTO Usuarios(nome, email, senha) VALUE('$usuario', '$email', '$phash')";
    
   // $result = mysqli_query($link, $sql);

    /*if($result){
		header("location: display.php");
		$_SESSION['email'] = $email;
		$_SESSION['logado'] = true;
    }else{
    	die("Deu ruim em algo" . mysqli_error($result));
	}
	*/

?>









