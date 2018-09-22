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
            <li><a href="admGIndex.php">DASHBOARD</a></li>
            <li><a href=/progweb-blog/class/logout.php>SAIR</a></li>
        </ul>

        <hr id="traco">
    </div>

    <br>
    <br>
    <br>
    <br>
    <br>


    <div id="corpo_texto5">
        
      <div class="centro6">

        <label id="donoconta"> ADMIN G - Criar Novo Usuário</label>
        <br>
        <br>  

        <div id="menu1">

            <form action="/progweb-blog/class/userCRUD.php" method="post">

                 <table id="tabela1">
                 
                    <tr>     
                      <td> 
                        <input type="text" name="nome" placeholder="Nome"><br>
                        <input type="email" name="email" placeholder="Email"><br>
                        <input type="password" name="senha" placeholder="Senha"><br>
                      </td>       

                      <td>  
                        <select name="tipo" id="escolha">
                            <option value="0" selected="selected">Tipo de Acesso</option>
                            <option value="2">Administrador</option>
                            <option value="3">Redator</option>
                            <option value="4">Usuário</option>
                        </select>

                        <br>
                        <br>

                        <input type="submit" name="submit" value="Criar" id="botao3"><br>
                      </td>              
                    </tr>
                   
                </table>
          
            </form>
         </div>

	</body>
</html>

<?php 
}else{
    echo "Você não está autorizado a acessar essa página";
}

?>
