<?php 
include_once "../model/postCRUD.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link rel="stylesheet" type="text/css" href="./css/style.css">
	<title>Início</title>

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
            <?php 
              if(!isset($_SESSION['logado'])){
                    echo '<li><a href="">OLÁ, ANÔNIMO!</a></li>';
                }else{
                    echo '<li><a href="">OLÁ, '. strtoupper($_SESSION['nome']) .'!</a></li>';
                } 
            ?>
            
            <li><a href="inicio.php" id="atual">INÍCIO</a></li>
            <?php 
               if(!isset($_SESSION['logado'])){
                    echo '<li><a href="login.html">ENTRAR</a></li>';
               } 

              if(isset($_SESSION['logado'])){
                if($_SESSION['logado'] == true){
                    if($_SESSION['tipo'] == 1){
                        echo  '<li><a href="admGIndex.php">DASHBOARD</a></li>';
                    }else if($_SESSION['tipo'] == 2){
                        echo  '<li><a href="admIndex.php">DASHBOARD</a></li>';
                    }else if($_SESSION['tipo'] == 3){
                        echo  '<li><a href="redaIndex.php">DASHBOARD</a></li>';
                    }else if($_SESSION['tipo'] == 4){
                        echo  '<li><a href="userIndex.php">DASHBOARD</a></li>';
                    }
                    echo '<li><a href="../class/logout.php">SAIR</a></li>';
                }
              }

              var_dump($_SESSION);
              if(!isset($_SESSION['logado'])){
                echo '<li><a href="cadastro.html">CADASTRAR-SE</a></li>';
              }
            ?>
        </ul>

        <hr id="traco">
    </div>

    <br>
    <br>
    <br>
    <br>
    <br>

    
    <div><h2>POSTAGENS</h2></div>
    <div id="caixa_inicio">
        
        <?php  
            $obj = new postCRUD();
            $posts = $obj->callSelectP();
                foreach($posts as $post){
                 
                    $cod = $post['id'];
                    $check = $obj->checkDel($cod);
                    $edit = $obj->checkEdit($cod);

                    if($check == false){
        ?>
                        <h2><?php echo $post['titulo']; ?></h2>
                        <p>
                            <h5>Postado por <?php echo ucfirst($post['autor_original']); ?> | <?php echo $post['data_original']; 
                            if($edit == true){
                                    echo "<br>Editado por: " . ucfirst($post['autor_editado']) . " | ". $post['data_editado'];
                                }
                        ?> </h5>
                        </p>
                        
                        <div><?php echo nl2br($post['conteudo']); ?></div>
                    
                    <?php 
                    if(isset($_SESSION['tipo'])){
                            if($_SESSION['tipo'] == 1 || $_SESSION['tipo'] == 2){
                    ?>
                    <menu>
                        <ul>
                            <li><a href='editPosts.php?id=<?php echo $post['id']; ?>' class="botao6" id="link1"> Editar Post</a></li>
                            <li><a href='delPosts.php?id=<?php echo $post['id'];?>&titulo=<?php echo $post['titulo'];?>' class="botao6" id="link1"> Deletar Post</a></li>
                        </ul>
                    </menu>
                    <?php 
                        } 
                     }  if(isset($_SESSION['logado']) && $_SESSION['logado'] == true){

                     ?>
                    <br><br><h3>Deixe seu comentário!</h3>
                    <form action="/progweb-blog/controller/cmCRUDController.php?id=<?php echo $post['id'];?>" method="post" >
                            Nome:
                            <input type="text" name="nome">
                            <br><br>
                            Mensagem:
                            <br><textarea name="conteudo" rows="5" cols="60"></textarea>
                            <br><br>
                            <input type="hidden" name="cctkn" value="true">
                            <input type="submit" value="Enviar">
                    </form>
                    <hr>       
                    <?php   
                        }
                        
                    }
                }
           
           
            ?>
        
        <div class="posts">
            
            
           

        </div>
        <div class="msg"></div>
        <div class="posts"></div>
        <div class="msg"></div>
        <div class="posts"></div>
        <div class="msg"></div>
    </div>
    <div id="fundo"></div>
  

</body>

</html>