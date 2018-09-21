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
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>


	<body>
    <div class="centro">
         <div class="box_centro" align="center">
             <div><h1> ADMIN</h1></div>
           
         <div>
      
            
            <ul>
                <li><a href="">Gerenciar Posts</a></li>
                <li><a href="">Gerenciar comentários</a></li>
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