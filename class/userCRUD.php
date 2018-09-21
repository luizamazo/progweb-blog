<?php

require_once("../config.php");
	
	//include "sql.php";

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
		
		if($tipo == 4){
			header("Location: userIndex.php");
		}
		
	}

	//insertUser($nome, $email, $phash, $tipo, $estado);


	function selectUser($nome, $email, $tipo, $estado, $result){
		$sql = new sql();
		$result = $sql->select("SELECT nome, email, tipo, estado FROM pessoa", array());
		return json_encode($result);
	}

	$stmt = selectUser($nome, $email, $tipo, $estado, $result); 
	print_r($stmt);
	
	/*
     function deleteUser(){
		$sql = new sql();
		$result = $sql->query("UPDATE Usuarios SET estado = :ESTADO WHERE id = :ID", array(
			":ESTADO"=>$estado,
			":ID"=>$id,
		));
		echo "deletado virtualmente ok";
}

	function updateUser(){
		
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









