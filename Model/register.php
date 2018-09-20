<?php
	session_start();
	$host = 'localhost';
	$user = 'root';
	$pass ='';
	$bd = 'mtDB';
	

	$link = mysqli_connect($host, $user, $pass, $bd);

	if(!$link){
	    die('Não Funcionou '.mysqli_connect_errno());
	}
	
	$usuario = $_POST['nome'];
	$email = $_POST['email'];
	$senha = $_POST['senha'];
	$phash = md5($senha);

    $sql = "INSERT INTO Usuarios(nome, email, senha) VALUE('$usuario', '$email', '$phash')";
    
    $result = mysqli_query($link, $sql);

    if($result){
		header("location: display.php");
		$_SESSION['email'] = $email;
		$_SESSION['logado'] = true;
    }else{
    	die("Deu ruim em algo" . mysqli_error($result));
    }
    
?>


