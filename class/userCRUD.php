<?php

require_once("../config.php");
	
	include_once "sql.php";

	$link = new sql();
	$conn = $link->createConn();
	//pra mysqli $link = dbConn();

	if(isset($_POST['submit'])){
	
	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$senha = $_POST['senha'];
	$phash = md5($senha);
	$tipo = $_POST['tipo'];	
	$cod = $_POST['cod'];
}
	
	function insertUser($nome, $email, $phash, $tipo, $estado){
		
		$estado = 1;
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


	function selectUser(){
		$sql = new sql();
		$result = $sql->select("SELECT id, nome, email, tipo, estado FROM pessoa", array());
		return $result;
	}

	function updateUser($nome, $email, $phash, $tipo, $cod){
		
		$sql = new sql();
		$result = $sql->query("UPDATE pessoa SET nome = :NOME, email = :EMAIL, 
		senha = :SENHA, tipo = :TIPO WHERE id = :ID", array(
				":NOME"=>$nome,
				":EMAIL"=>$email,
				":SENHA"=>$phash,
				":TIPO"=>$tipo,
				":ID" => $cod
			));
			echo "alterado com sucesso";
	}

	//updateUser($nome, $email, $phash, $tipo, $cod);


     function deleteUser($cod, $email){
		
		$sql = new sql();
		$estado = 2;
		$result = $sql->query("UPDATE pessoa SET estado = :ESTADO WHERE id = :ID AND email = :EMAIL", array(
			":ESTADO"=>$estado,
			":EMAIL"=>$email,
			":ID"=>$cod
		));
	}
	
	deleteUser($cod, $email);

   
	























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









