<?php 
   
   require_once("../config.php");
   require_once "../class/auth.php";
     
     //$aux = auth::checkUser();
     if(isset($_SESSION['tipo']) && $_SESSION['tipo'] != 2 && $_SESSION['tipo'] != 4){
     //if(isset($_SESSION['tipo']) && $aux == "admG"){
?>

<!DOCTYPE html>
<html>
	
	<head>
        <meta charset="UTF-8">
		<title>CRIAR- POST</title>
		<link rel="stylesheet" type="text/css" href="./css/style.css">
	</head>


	<body>
    <div class="centro">
         <div class="box_centro" align="center">
             <div><h1> CRIAR NOVO POST </h1></div>

         <div>
         <form action="/progweb-blog/class/postCRUD.php" method="post">
            
            <input type="text" name="titulo" placeholder="Título"><br><br>
            <textarea name="conteudo" id="conteudo" cols="100" rows="50" placeholder="Conteúdo"></textarea><br><br>
            
            <input type="submit" name="submit" value="Criar Post"><br>
         </form>
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
