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
    <div class="centro">
         <div class="box_centro" align="center">
             <div><h1> ADMIN G</h1></div>
           
         <div>
      
            
            <ul>
                <li><a href="/progweb-blog/View/admGadd.php">Adicionar Usuários</a></li>
                <li><a href="/progweb-blog/View/admGusercontrol.php">Gerenciar Usuários</a></li>
                <li><a href="">Gerenciar Posts</a></li>
                <li><a href="">Gerenciar comentários?</a></li>
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

