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
		<title>ADMINSTRADOR GERAL</title>
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
        <li><a href="">OLÁ, <?php echo ucwords($_SESSION['nome']);?>!</a></li>
            <li><a href="inicio.php">INÍCIO</a></li>
            <li><a href="admGIndex.php" id="atual">DASHBOARD</a></li>
            <li><a href=/progweb-blog/class/logout.php>SAIR</a></li>
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
        <br>
        <label id="donoconta">ADMINISTRADOR GERAL</label>
        <br>
        <br>
        <br>
        <br>
        <div>
          <ul id="gerencia">
            <li id="li2"><a href="/progweb-blog/View/admGadd.php" class="tam_admG" id="link1">Adicionar Usuários</a></li>
            <li id="li2"><a href="/progweb-blog/View/createPosts.php" class="tam_admG" id="link1">Adicionar Novo Post</a></li>
            <li id="li2"><a href="/progweb-blog/View/admGusercontrol.php" class="tam_admG" id="link1">Gerenciar Usuários</a></li>
          </ul>  
        </div>
             
      </div>

    </div>  

	</body>
</html>

<?php 
}else{
    echo "<script>alert('Você não está autorizado a ver essa página!'); window.location = '../view/inicio.php';</script>";
}

?>

