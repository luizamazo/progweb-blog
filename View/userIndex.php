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
    <div class="centro">
         <div class="box_centro" align="center">
             <div><h1> USER </h1></div>
           
         <div>
      
            
            <ul>
                <li><a href="/progweb-blog/View/inicial.html">Ver Posts do Blog</a></li>
                <li><a href="/progweb-blog/View/userControl.php">Gerenciar Comentários</a></li>
            </ul>

         </div>
   
    </div>

	</body>
</html>

<?php 
}else{
    echo "Você não está autorizado a acessar essa página";
}

?>