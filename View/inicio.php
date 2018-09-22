<?php 
require_once("../class/postCRUD.php");

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
            <li><a href="inicio.php">INÍCIO</a></li>
            <li><a href="login.html">ENTRAR</a></li>
            <li><a href="cadastro.html">CADASTRAR-SE</a></li>
        </ul>

        <hr>
    </div>

    <br>
    <br>
    <br>
    <br>
    <br>

    POSTAGENS

    <div id="caixa_inicio">
        
        <?php  $posts = selectPost();
            foreach($posts as $post){
            ?>
            <h2><?php echo $post['titulo']; ?></h2>
            <p>
                <h5>Postado por <?php echo $post['autor']; ?>
                | <?php echo $post['data']; ?>
            
            </h5>
            </p>
            <div><?php echo nl2br($post['conteudo']); ?></div>
            
            <?php 
            if(isset($_SESSION['tipo'])){
                    if($_SESSION['tipo'] == 1 || $_SESSION['tipo'] == 2){
            ?>
            <menu>
                <ul>
                    <li><a href='editPosts.php?id=<?php echo $post['id']; ?>' id="botao3"> Editar Post</a></li>
                    <li><a href='delPosts.php?id=<?php echo $post['id']; ?>' id="botao3"> Deletar Post</a></li>
                </ul>
            </menu>
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