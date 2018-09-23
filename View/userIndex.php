<?php 
 
 require_once("../config.php");
 require_once("../class/auth.php");
 require_once("../model/userCRUD.php");
   
   if($_SESSION['logado'] == true){
?>

<!DOCTYPE html>
<html>
	
	<head>
        <meta charset="UTF-8">
		<title>USER - INDEX</title>
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
            <li><a href="userIndex.php" id="atual">DASHBOARD</a></li>
            <li><a href="/progweb-blog/class/logout.php">SAIR</a></li>
        </ul>

        <hr id="traco">
    </div>

    <br>
    <br>
    <br>
    <br>
    <br>

    <div id="invisivel"><h2>...</h2></div>
    <div id="corpo_texto3">
        
      <div class="centro4">

        <label class="text1">USER</label>
        <br>
        <br>

        <div>
          <ul id="gerencia1">
            <li id="li1"><a href="/progweb-blog/View/inicio.php"id="link1">Ver Posts do Blog</a></li>
            <li id="li1"><a href="/progweb-blog/Controller/userController.php" id="link1">Gerenciar comentários</a></li>
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