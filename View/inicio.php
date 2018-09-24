<?php 
include_once "../model/postCRUD.php";
include_once "../model/cmCRUD.php";
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
        <label id="titulo">12 Horas de Terror </label>
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
                    echo '<li><a href="">OLÁ, '. ucwords($_SESSION['nome']) .'!</a></li>';
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
                            <h5>Postado por <?php echo ucwords($post['autor_original']); ?> | <?php echo $post['data_original']; 
                            if($edit == true){
                                    echo "<br>Editado por: " . ucwords($post['autor_editado']) . " | ". $post['data_editado'];
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
                            <li><a href='editPosts.php?id=<?php echo $post['id']; ?>' class="botao7" id="link1"> Editar Post</a></li>
                            <li><a href='delPosts.php?id=<?php echo $post['id'];?>&titulo=<?php echo $post['titulo'];?>' class="botao7" id="link1"> Deletar Post</a></li>
                        </ul>
                    </menu>
                    <?php 
                        } 
                     }  
                        if(isset($_SESSION['logado']) && $_SESSION['logado'] == true){

                     ?>
                            <br><br><h3>Deixe seu comentário!</h3>
                            <form action="/progweb-blog/controller/cmCRUDController.php?id=<?php echo $post['id'];?>" method="post" >
                                    Nome: <?php echo ucwords($_SESSION['nome']);?>
                                    <br><br>
                                    Mensagem:
                                    <br><textarea name="conteudo" rows="5" cols="60"></textarea>
                                    <br><br>
                                    <input type="hidden" name="cct" value="true">
                                    <input type="submit" name="submit" value="Enviar">
                            </form>
                            
               

                        <?php   
                        } if(!isset($_SESSION['tipo']) || isset($_SESSION['tipo'])){
                            echo "<hr>";
    
                            $objcm = new cmCRUD();
                            $comentarios = $objcm->callSelectCM();
                            
                            foreach($comentarios as $com){
                                
                                $postId = $post["id"];
                                $postidCM = $com["post_id"];
                                $comID = $com["id"];
                            
                                $checkCM = $objcm->checkDelCM($comID);
                                $editCM = $objcm->checkEditCM($comID);
                                if($checkCM == false){
                                    if($postId == $postidCM){ ?>
                                        <p>
                                        <h4>Comentado por <?php echo ucwords($com['autor_original']); ?> | <?php echo $com['data_original']; 
                                        if($editCM == true){
                                        echo "<br>Editado por: " . ucwords($com['autor_editado']) . " | ". $com['data_editado']; } 
                                        ?>
                                        </h4>
                                        </p>
                                        <div><?php echo nl2br($com['conteudo']); ?></div>
                                        <?php if(!isset($_SESSION['logado'])){  echo "<hr>"; } ?>
                                    
                        
                                    <?php if(isset($_SESSION['tipo'])){
                                        
                                                    if($_SESSION['tipo'] == 4 && $_SESSION['nome'] == $com["autor_original"]){  ?>
                                        
                                            <menu>
                                                <ul>
                                                    <li><a href='/progweb-blog/view/editComen.php?ed=<?php echo $comID; ?>' class="botao7" id="link1"> Editar Comentário</a></li>
                                                    <li><a href='/progweb-blog/controller/cmCRUDController.php?del=<?php echo $comID;?>&dct=true' class="botao7" id="link1"> Deletar Comentário</a></li>
                                                </ul>
                                            </menu>
                                            <hr>
                                            
                                            <?php }else if($_SESSION['tipo'] == 1 || $_SESSION['tipo'] == 2 || $_SESSION['tipo'] == 3){ ?>  
                                            
                                                <menu>
                                                <ul>
                                                    <li><a href='/progweb-blog/view/editComen.php?ed=<?php echo $comID; ?>' class="botao7" id="link1"> Editar Comentário</a></li>
                                                    <li><a href='/progweb-blog/controller/cmCRUDController.php?del=<?php echo $comID;?>&dct=true' class="botao7" id="link1"> Deletar Comentário</a></li>
                                                    <li><a href='replyComen.php?idCM=<?php echo $com['id'];?>' class="botao7" id="link1"> Responder Comentário</a></li>  
                                                </ul>
                                            </menu> 
                                            
                                            <hr>
                                            <?php  
                                }  
                            }
                        }
                    }
                }
                            
            }
    } 
}  ?>
        </div>
        
    </div>
    
  

</body>

</html>