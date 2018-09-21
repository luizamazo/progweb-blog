<?php 

    require_once("../config.php");
    require_once "../class/auth.php";
  
    
    //$aux = auth::checkUser();
    if(isset($_SESSION['tipo']) && $_SESSION['tipo'] == 1){
    //if(isset($_SESSION['tipo']) && $aux == "admG"){
?>

<!DOCTYPE html>
<html>
	
	<head>
        <meta charset="UTF-8">
		<title>ADM - G</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>


	<body>
    
    <div>
        <label id="titulo">12 Horas de Terror</label>
        <br>
        <label>Um blog para os amantes do dark side.</label>
    </div>

    <br>

    <div id="menu">
        <ul>
            <li><a href="inicio.html">INÍCIO</a></li>
            <li><a href="inicio.html">POSTAGENS</a></li>
            <li><a href="login.html">SUA CONTA</a></li>
        </ul>

        <hr id="traco">
    </div>

    <br>
    <br>
    <br>
    <br>
    <br>


    <div id="corpo_texto4">
        
      <div class="centro5">

        <label id="donoconta">ADMIN G</label>
        <br>
        <br>

        <div>
          <ul id="gerencia1">
            <li id="li1"><a href="/progweb-blog/View/admGadd.php" id="link1">Adicionar Usuários</a></li>
            <li id="li1"><a href="/progweb-blog/View/admGusercontrol.php" id="link1">Gerenciar Usuários</a></li>
            <li id="li1"><a href="" id="link1">Gerenciar Posts</a></li>
            <li id="li1"><a href="" id="link1">Gerenciar Comentários</a></li>
          </ul>  
        </div>
             
      </div>

    </div>  

	</body>
</html>

<?php 
}else{
    echo "Você não está autorizado a acessar essa página";
}

?>

