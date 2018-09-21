<?php 
 
 require_once("../config.php");
 require_once("../class/auth.php");
 require_once("../class/userCRUD.php");
   
   //$aux = auth::checkUser();
   if(isset($_SESSION['tipo']) && $_SESSION['logado'] == true){
   //if(isset($_SESSION['tipo']) && $aux == "admG"){
?>

<!DOCTYPE html>
<html>
	
	<head>
        <meta charset="UTF-8">
		<title>USER - INDEX</title>
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


    <div id="corpo_texto3">
        
      <div class="centro4">

        <label id="donoconta">USER</label>
        <br>
        <br>

        <div>
          <ul id="gerencia1">
            <li id="li1"><a href="/progweb-blog/View/inicial.html"id="link1">Ver Posts do Blog</a></li>
            <li id="li1"><a href="/progweb-blog/View/userControl.php" id="link1">Gerenciar comentários</a></li>
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