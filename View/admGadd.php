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
            <li><a href="">OLÁ, <?php echo ucwords($_SESSION['nome']);?>!</a></li>
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

    <div id="invisivel"><h2>...</h2></div>
    <div id="corpo_texto5">
        
      <div class="centro6">

        <label class="text1"> Criar Novo Usuário</label>
        <br>
        <br>  

        <div id="menu1">

            <form action="/progweb-blog/Controller/userCRUDController.php" method="post">

                 <table id="tabela1">
                 
                    <tr>     
                      <td> 
                        <input type="text" name="nome" required placeholder="Nome" class="tam_input"><br>
                        <input type="email" name="email" required placeholder="Email" class="tam_input"><br>
                        <input type="password" name="senha" required placeholder="Senha" class="tam_input"><br>
                      </td>       

                      <td>  
                          Tipo de Acesso <br>
                        <select name="tipo" id="escolha">
                            <option value="1">Administrador Geral</option>
                            <option value="2">Administrador</option>
                            <option value="3">Redator</option>
                            <option value="4">Usuário</option>
                        </select>

                        <br>
                        <br>
                        <input type="hidden" name="cut" value="true">
                        <input type="submit" name="submit" value="Criar" class="botao5" id="link1"><br>
                      </td>              
                    </tr>
                   
                </table>
          
            </form>
         </div>

	</body>
</html>
<?php 
}else{
    echo "<script>alert('Você não está autorizado a ver essa página!'); window.location = '../View/inicio.php';</script>";
}

?>
