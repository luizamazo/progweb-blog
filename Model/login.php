<?php 

session_start();
	
	$link = new sql();

	if(!$link){
	    die('Não Funcionou '.mysqli_connect_errno());
	}
	
	$email = $_POST['email-input'];
	$senha = $_POST['senha-input'];
	$phash = md5($senha);

	
    $check = "SELECT * FROM Usuarios WHERE email='$email' AND senha='$phash'";
    $result = mysqli_query($link, $check) or die(mysqli_error($link));

    if(mysqli_num_rows($result) > 0){
		$_SESSION['email'] = $email;
		$_SESSION['logado'] = true;
		header("location: display.php");
    }else{
    	echo "Email ou senha incorretos";
    }

?>