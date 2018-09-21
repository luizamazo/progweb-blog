<?php

require_once("../config.php");

class userController{
    
    private $link;
    $link = new sql();
	$conn = $link->createConn();
	//pra mysqli $link = dbConn();
	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$senha = $_POST['senha'];
	$phash = md5($senha);
	$tipo = $_POST['tipo'];	
	$estado = 1;

	header("location: ./class/userCRUD.php");

}
?>
