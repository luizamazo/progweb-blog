<?php 
require_once("../class/postCRUD.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link rel="stylesheet" type="text/css" href="style.css">
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
            <li><a href="inicio.html">INÍCIO</a></li>
            <li><a href="inicio.html">POSTAGENS</a></li>
            <li><a href="login.html">SUA CONTA</a></li>
        </ul>

        <hr>
    </div>

    <br>
    <br>
    <br>
    <br>
    <br>

    POSTAGENS

    <?php  $posts = selectPost();
     foreach($posts as $post){
      ?>
     <h2><a href='index.php?id=<?php echo $post['post_id']; ?>' ><?php echo $post['titulo']; ?></a></h2>
     <p>
        Posted on <?php $post['data']; ?>
        Por <?php echo $post['autor']; ?></a>
     </p>
     <div><?php echo nl2br($post['conteudo']); ?></div>
     <menu>
        <ul>
            <li><a href='postCRUD.php?id=<?php echo $post['id']; ?>' >Delete This Post</a></li>
            <li><a href='postCRUD.php?id=<?php echo $post['id']; ?>' >Edit This Post</a></li>
        </ul>
     </menu>
     <?php   
     }
     ?>
    </body>



    <div id="caixa_inicio">
        
        <div class="posts">
            
            <?php 
                /*
                $posts = selectPost();
                if(count($posts) > 0){
                   foreach($posts as $post){
                      foreach($post as $value){
                        echo "<h1>" . $post["titulo"] . "</h1>";
                        echo "<h6>". $post["autor"] . "</h6>";
                        echo "<h4>". $post["conteudo"] . "</h4>";
                    }
                }
            }
            */
            ?>

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