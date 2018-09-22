<?php 
 
 require_once("../config.php");
 require_once("../class/auth.php");
 require_once("../class/userCRUD.php");
   
   //$aux = auth::checkUser();
   if(isset($_SESSION['tipo']) && $_SESSION['tipo'] != 3 && $_SESSION['tipo'] != 4){
   //if(isset($_SESSION['tipo']) && $aux == "admG"){
?>

<!DOCTYPE html>
<html>
	
	<head>
        <meta charset="UTF-8">
		<title>ADM - INDEX</title>
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
            <li>OLÁ, <?php echo strtoupper($_SESSION['nome']);?> !</li>
            <li><a href="inicio.php">INÍCIO</a></li>
            <li><a href="admIndex.php">DASHBOARD</a></li>
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

        <label id="donoconta">ADMIN</label>
        <br>
        <br>

        <div>
          <ul id="gerencia1">
          <li id="li1"><a href="/progweb-blog/view/createPosts.php" id="link1">Adicionar Novo Post</a></li>
          <li id="li1"><a href="" id="link1">Gerenciar comentários</a></li>
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