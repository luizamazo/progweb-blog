<?php 
 
 require_once("../config.php");
 require_once("../class/auth.php");
 require_once("../class/userCRUD.php");
   
   //$aux = auth::checkUser();
   if(isset($_SESSION['tipo']) && $_SESSION['tipo'] != 4){
?>


<!DOCTYPE html>
<html>
	
	<head>
        <meta charset="UTF-8">
		<title>REDATOR - INDEX</title>
		<link rel="stylesheet" type="text/css" href="./css/style.css">
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
            <li><a href="inicio.php">INÍCIO</a></li>
            <li><a href="redaIndex.php">DASHBOARD</a></li>
            <li><a href=/progweb-blog/class/logout.php>SAIR</a></li>
        </ul>

        <hr id="traco">
    </div>

    <br>
    <br>
    <br>
    <br>
    <br>


    <div id="corpo_texto3">
        
      <div class="centro4">

        <label id="donoconta">REDATOR</label>
        <br>
        <br>

        <div>
          <ul id="gerencia1">
            <li id="li1"><a href="/progweb-blog/View/createPosts.php" id="link1">Criar Posts</a></li>
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