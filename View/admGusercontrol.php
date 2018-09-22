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
            <li><a href="inicio.html">INÍCIO</a></li>
            <li><a href="inicio.html">POSTAGENS</a></li>
            <li><a href="login.html">SUA CONTA</a></li>
        </ul>

        <hr id="traco">
    </div>

    <br>
    <br>
    <br>
    <br>
    <br>


    <div id="corpo_texto2">
        
      <div class="centro3">

        <label id="donoconta"> ADM G - User Control</label>
        <br>
        <br>  
             
        <table id="tabela1">
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

             <br>
        <br>

        <div id="alinhar1">
            
          <div id="menueditar">

             <label id="subtitulo">Editar Usuário</label>
             <br>
                                  
                <form action="/progweb-blog/class/userCRUD.php" method="post">
                       
                  <table id="tabela">  
                    <tr>
                      <td>
                        <input type="text" name="cod" placeholder="Código Identificador"><br>
                      </td>

                      <td>
                        <input type="text" name="nome" placeholder="Novo Nome"><br>  
                      </td>
                    </tr>

                    <tr>
                      <td>
                        <input type="email" name="email" placeholder="Novo Email"><br>
                      </td>

                      <td>
                        <input type="password" name="senha" placeholder="Nova Senha"><br>  
                      </td>
                    </tr>
                    
                    <tr>
                      <td>
                        <select name="tipo" id="permissao">
                          <option value="0" selected="selected">Alterar Permissão</option>
                          <option value="1">Adm Geral</option>
                          <option value="2">Adm</option>
                          <option value="3">Redator</option>
                          <option value="4">Usuário</option>
                        </select>
                      </td>

                      <td>
                        <input type="submit" name="submit" value="Salvar" id="botao2"><br>
                      </td>
                    </tr> 
                 </table>

                </form>
          </div>





          <div id="menuexcluir">

            <label id="subtitulo">Excluir Usuário</label>
            <br>
                 
            <form action="/progweb-blog/class/userCRUD.php" method="post">
             
                <table align="center">
                  
                    <tr>     
                      <td>  
                        <input type="text" name="cod" placeholder="Código Identificador"><br>
                      </td>
                    </tr>
                    <tr>
                      <td>  
                        <input type="text" name="email" placeholder="Email"><br>
                      </td>
                    </tr>
                    <tr>
                      <td>  
                        <input type="submit" name="submit" value="Salvar" id="botao1"><br>
                      </td>                     
                    </tr>
                 
                </table>
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
