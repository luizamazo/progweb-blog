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
		<title>ADMIN G - ADD</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>


	<body>
    <div class="centro">
         <div class="box_centro" align="center">
             <div><h1> ADM G - Criar Nova Conta</h1></div>

         <div>
         <form action="/progweb-blog/class/userCRUD.php" method="post">
            
            <input type="text" name="nome" placeholder="Nome"><br>
            <input type="email" name="email" placeholder="Email"><br>
            <input type="password" name="senha" placeholder="Senha"><br>
            
            <select name="tipo" id="escolha">
                <option value="0" selected="selected">Tipo de Acesso</option>
                <option value="2">Administrador</option>
                <option value="3">Redator</option>
                <option value="4">Usuário</option>
            </select>
            <input type="submit" name="submit" value="Criar" id="botao"><br>

            
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
