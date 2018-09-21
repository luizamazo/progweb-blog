<?php 
 
 require_once("../config.php");
 require_once("../class/auth.php");
 require_once("../class/userCRUD.php");
   
   //$aux = auth::checkUser();
   if(isset($_SESSION['tipo']) && $_SESSION['tipo'] == 1){
   //if(isset($_SESSION['tipo']) && $aux == "admG"){
?>

<!DOCTYPE html>
<html>
	
	<head>
        <meta charset="UTF-8">
		<title>ADMIN G - CONTROL</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>


	<body>
    <div class="centro">
         <div class="box_centro" align="center">
             <div><h1> ADM G - User Control</h1></div>

             <table border="1">
                <tr>
                    <th>Identificador</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Tipo</th>
                    <th>Estado</th>
                    <!--<th>Ações</th>-->
                </tr>

                
                    <?php 

                        $results = selectUser();
                        foreach($results as $res){
                            echo "<tr>";
                            foreach($res as $value){
                                echo "<td>". $value . "</td>";
                            }
                           
                            /* echo "<td>";
                            echo '<a href="admGUedit.php">Editar | </a>';
                            echo '<a href="admGUdel.php">Excluir</a>';
                            echo "</td>";
                            */

                            echo "</tr>";
                        }
                    ?>      
             </table>

             <div><h1> Editar Usuário</h1></div>
                 
                 <div>
                 <form action="/progweb-blog/class/userCRUD.php" method="post">
                     
                     <input type="text" name="cod" placeholder="Código Identificador"><br>
                     <input type="text" name="nome" placeholder="Novo nome"><br>
                     <input type="email" name="email" placeholder="Novo email"><br>
                     <input type="password" name="senha" placeholder="Nova senha"><br>
                     <select name="tipo" id="permissao">
                         <option value="0" selected="selected">Alterar Permissão</option>
                         <option value="1">Adm Geral</option>
                         <option value="2">Adm</option>
                         <option value="3">Redator</option>
                         <option value="4">Usuário</option>
                     </select>
                     
                     <input type="submit" name="submit" value="Salvar"><br>
                 </form>
                 </div>

                  <div><h1> Excluir Usuário</h1></div>
                 
                 <div>
                 <form action="/progweb-blog/class/userCRUD.php" method="post">
                     
                     <input type="text" name="cod" placeholder="Código Identificador"><br>
                     <input type="text" name="email" placeholder="Email"><br>
                     
                     <input type="submit" name="submit" value="Salvar"><br>
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
