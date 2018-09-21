<?php

require_once("../config.php");
	
	include_once "sql.php";

	$link = new sql();
	$conn = $link->createConn();

	if(isset($_POST['submit'])){
	
	$autor = $_SESSION['nome'];
	$titulo = $_POST['titulo'];
	$conteudo = $_POST['conteudo'];
	
}
	
	function insertPost($autor, $titulo, $conteudo){

		$sql = new sql();
		$result = $sql->query("INSERT INTO posts(autor, titulo, conteudo) 
		VALUES(:AUTOR, :TITULO, :CONTEUDO)", array(
			":AUTOR"=>$autor,
			":TITULO"=>$titulo,
			":CONTEUDO"=>$conteudo
		));
			//	setlocale(LC_ALL, "pt_BR", "pt_BR.utf-8", "portuguese" );			
			echo "post inserido";
			//header("Location: inicio.html");
		
		
	}

	//insertPost($autor, $titulo, $conteudo);


	function selectPost(){
		$sql = new sql();
		$result = $sql->select("SELECT id, autor, titulo, conteudo, data FROM posts ORDER BY data", array());
		$fdt = date("d/m/Y, H:i:s", strtotime($result[0]["data"]));
		$result[0]["data"] = $fdt;
		return $result;
	}

	//selectPost();

	function updatePost($autor, $titulo, $conteudo, $cod){
		$cod = 7;
		$sql = new sql();
		$result = $sql->query("UPDATE posts SET autor = :AUTOR, titulo = :TITULO, 
		conteudo = :CONTEUDO WHERE id = :ID", array(
				":AUTOR"=>$autor,
				":TITULO"=>$titulo,
				":CONTEUDO"=>$conteudo,
				":ID"=>$cod
			));
			echo "alterado com sucesso";
	}

	updatePost($autor, $titulo, $conteudo, $cod);


     function deleteUser($cod, $email){
		
		$sql = new sql();
		$estado = 2;
		$result = $sql->query("UPDATE pessoa SET estado = :ESTADO WHERE id = :ID AND email = :EMAIL", array(
			":ESTADO"=>$estado,
			":EMAIL"=>$email,
			":ID"=>$cod
		));
	}
	
?>









