<?php 
include_once "../Model/postCRUD.php";
include_once "../Model/cmCRUD.php";
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
        //@ABRE IF = IMPRIMIR POSTS
        foreach($posts as $post){     
            $cod = $post['id'];
            $check = $obj->checkDel($cod);
            $edit = $obj->checkEdit($cod);

                //@ABRE IF = SE POSTS ESTIVEREM ATIVOS, IMPRIME 
                if($check == false){ 
        ?>
                    <br>
                    <br>
                  
                        <hr>
                        <h2>
                        <?php echo $post['titulo']; ?></h2>
                        <p><h5>Postado por <?php echo ucwords($post['autor_original']); echo " | " . $post['data_original']; 
                            
                        //@ABRE IF = SE POST FOI EDITADO
                        if($edit == true){
                            echo "<br>Editado por: " . ucwords($post['autor_editado']) . " | ". $post['data_editado'];
                        }//@FECHA IF = SE POST FOI EDITADO
                            
                        ?> 
                        </h5>
                        </p>
                        
                        <!-- IMPRIME O CONTEÚDO DO POST -->
                        <div><?php echo nl2br($post['conteudo']); ?></div>
                    
                    <?php 
                        //@ABRE IF = SE AUTENTICADO E FOR ADM G OU ADM, VÊ AÇÕES DE POSTS
                        if(isset($_SESSION['tipo'])){
                            if($_SESSION['tipo'] == 1 || $_SESSION['tipo'] == 2){
                    ?>
                            <menu>
                            <ul class="menu_posts">
                                <li><a href='editPosts.php?id=<?php echo $cod; ?>' class="botao8 " id="link1"> Editar Post</a></li>
                                <li><a href='delPosts.php?id=<?php echo $cod;?>&titulo=<?php echo $post['titulo'];?>' class="botao8" id="link1"> Deletar Post</a></li>
                            </ul>
                            </menu>
               
                    
                    <?php 
                        }  
                     }//@FECHA IF = SE AUTENTICADO E FOR ADM G OU ADM, VÊ AÇÕES DE POSTS

                        //@ABRE IF = SE LOGADO, PODE COMENTAR
                        if(isset($_SESSION['logado']) && $_SESSION['logado'] == true){
                    ?>

                        <br><br><h3>Deixe seu comentário!</h3>
                        <form action="/progweb-blog/Controller/cmCRUDController.php?id=<?php echo $post['id'];?>" method="post" >
                            Nome: <?php echo ucwords($_SESSION['nome']);?>
                            <br><br>
                            Mensagem:
                            <br><textarea name="conteudo" rows="5" cols="60"></textarea>
                            <br><br>
                            <input type="hidden" name="cct" value="true">
                            <input type="submit" name="submit" value="Enviar" class="enviar" id="link1">
                        </form>

                    <?php   
                        } //@END IF = SE LOGADO, PODE COMENTAR
                        
                        //@ABRE IF = QUALQUER UM PODE VISUALIZAR COMENTÁRIOS FEITOS
                        if(!isset($_SESSION['tipo']) || isset($_SESSION['tipo'])){
                            echo '<div class="h3coment"> 
                                 <h3 >Comentários</h3>
                                 </div>';
    
                            $objcm = new cmCRUD();
                            $comentarios = $objcm->callSelectCM();
                            
                            //IMPRIME COMENTÁRIOS
                            foreach($comentarios as $com){
                                
                                $postId = $post["id"];
                                $postidCM = $com["post_id"];
                                $comID = $com["id"];
                                $comConteudo = $com["conteudo"];
                                $comUser = $com["autor_original"];

                                $checkCM = $objcm->checkDelCM($comID);
                                $editCM = $objcm->checkEditCM($comID);
                              
                                //@ABRE IF = IMPRIME COMENTÁRIOS SÓ SE ESTIVEREM ATIVOS
                                if($checkCM == false){
                                    //@ABRE IF = SE O ID DO POST ATUAL EQUIVALE AO ID DO POST EM QUE FOI FEITO O COMENTÁRIO
                                
                                    if($postId == $postidCM){ 
                    ?>             
                                        <hr>
                                        <p>
                                        <h5>Comentado por 
                    <?php               echo ucwords($com['autor_original']) . " | " . $com['data_original'];
                
                                        //@ABRE IF = SE COMENTÁRIO FOI EDITADO
                                        if($editCM == true){
                                            echo "<br>Editado por: " . ucwords($com['autor_editado']) . " | ". $com['data_editado']; 
                                        }//@FECHA IF = SE COMENTÁRIO FOI EDITADO 
                    ?>
                                        </h5>
                                        </p>

                                        <!-- IMPRIME CONTEÚDO DO COMENTÁRIO -->
                                        <div><?php echo nl2br($comConteudo); ?></div>
                    <?php
                                        //@ABRE IF = SE USUÁRIO AUTENTICADO, MOSTRAR AÇÕES
                                        if(isset($_SESSION['tipo'])){
                                           
                                           //@ABRE IF = SE FOR USUÁRIO, MOSTRA AÇÕES QUE É SÓ DO USUÁRIO
                                           if($_SESSION['tipo'] == 4 && $_SESSION['nome'] == $com["autor_original"]){  
                   ?>      
                                           <menu>
                                               <ul class="menu_comen">
                                                   <li ><a href='/progweb-blog/View/editComen.php?ed=<?php echo $comID; ?>' class="botao7" id="link1"> Editar Comentário</a></li>
                                                   <li><a href='/progweb-blog/Controller/cmCRUDController.php?del=<?php echo $comID;?>&dct=true' class="botao7" id="link1"> Deletar Comentário</a></li>
                                               </ul>
                                           </menu>
                                           <hr>
                                           
                   <?php                   }//@FECHA IF = SE FOR USUÁRIO, MOSTRA AÇÕES QUE É SÓ DO USUÁRIO

                                           //@ABRE IF = SE FOR USUÁRIO, ELE SÓ PODE RESPONDER COMENTÁRIOS DOS OUTROS
                                           if($_SESSION['tipo'] == 4 && $_SESSION['nome'] != $com["autor_original"]){ 
                                        echo "<menu>";
                                        echo   '<ul class="menu_comen">';
                                               echo '<li><a href="/progweb-blog/View/replyComen.php?postid=' . $postId . '&resp=' . $comID . '&user=' . $comUser .
                                               '&conte=' . $comConteudo . ' "class="botao7" id="link1">Responder Comentário</a></li>';
                                        echo   "</ul>";
                                        echo "</menu>";
                                           }//@ FECHA IF = USUÁRIO N RESPONDE SEUS PRÓPRIOS COMENTÁRIOS
                                           
                                           // @ABRE IF = SE FOR ADM OU REDATOR APARECE TODOS AS 3 AÇÕES PARA COMENTÁRIOS
                                           if($_SESSION['tipo'] == 1 || $_SESSION['tipo'] == 2 || $_SESSION['tipo'] == 3){ 
                   ?>  
                                               <menu>
                                                   <ul>
                                                       <?php echo '<li><a href="/progweb-blog/View/replyComen.php?postid=' . $postId . '&resp=' . $comID . '&user=' . $comUser .
                                                       '&conte=' . $comConteudo . ' "class="botao7" id="link1">Responder Comentário</a></li>'; ?>
                                                       <li><a href='/progweb-blog/View/editComen.php?ed=<?php echo $comID; ?>' class="botao7" id="link1"> Editar Comentário</a></li>
                                                       <li><a href='/progweb-blog/Controller/cmCRUDController.php?del=<?php echo $comID;?>&dct=true' class="botao7" id="link1"> Deletar Comentário</a></li>
                       <?php                            
                                                    echo "</ul>";
                                                echo "</menu>";
                                            } //@FECHA IF = 3 AÇÕES PRA ADMS E REDATOR
                                        }//@FECHA IF = USUARIO AUTENTICADO, MOSTRAR AÇÕES

                                        $resposta = $objcm->callSelectR();
                                        
                                        //IMPRIME RESPOSTAS 
                                        foreach($resposta as $resp){
                                            $postrespID = $resp["post_id"];
                                            $respID = $resp["resp_id"];
                                            $respConteudo = $resp["conteudo"];
                                            
                                            //@ABRE IF = SE ID DO POST ATUAL FOR IGUAL AO ID DO POST EM QUE TEVE A RESPOSTA E SE O ID DA RESPOSTA FOR IGUAL AO DO COMENTÁRIO
                                            //PRA IMPRIMIR LOGO ABAIXO DO COMENTÁRIO RESPONDIDO
                                            if($postId == $postrespID && $respID == $comID){      
                    ?>
                                                <p>
                                                <h5>Comentado por  
                    <?php                       
                                                echo ucwords($resp["autor_original"]) . " em resposta a " . ucwords($resp['resp_user']) . " | " . $resp["data_original"]; 
                    ?>
                                                
                    <?php                       //@ABRE IF = SE COMENTÁRIO FOI EDITADO
                                                if($editCM == true){
                                                    echo "<br>Editado por: " . ucwords($resp['autor_editado']) . " | ". $resp['data_editado']; 
                                                }//@FECHA IF = SE COMENTÁRIO FOI EDITADO 
                    ?>
                                                </h5>
                                                </p>

                                                <!-- IMPRIME CONTEÚDO DO COMENTÁRIO -->
                                                <div><?php echo nl2br($respConteudo); ?> </div>
                    <?php
                                            //@ABRE IF = SE USUÁRIO AUTENTICADO, MOSTRAR AÇÕES
                                            if(isset($_SESSION['tipo'])){
                                           
                                                //@ABRE IF = SE FOR USUÁRIO, MOSTRA AÇÕES QUE É SÓ DO USUÁRIO
                                                if($_SESSION['tipo'] == 4 && $_SESSION['nome'] == $com["autor_original"]){  
                    ?>      
                                                <menu>
                                                    <ul class="menu_comen">
                                                        <li ><a href='/progweb-blog/View/editComen.php?ed=<?php echo $respID; ?>' class="botao7" id="link1"> Editar Comentário</a></li>
                                                        <li><a href='/progweb-blog/Controller/cmCRUDController.php?del=<?php echo $respID;?>&dct=true' class="botao7" id="link1"> Deletar Comentário</a></li>
                                                    </ul>
                                                </menu>
                                                <hr>
                                                
                    <?php                       }//@FECHA IF = SE FOR USUÁRIO, MOSTRA AÇÕES QUE É SÓ DO USUÁRIO

                                                //@ABRE IF = SE FOR USUÁRIO, ELE SÓ PODE RESPONDER COMENTÁRIOS DOS OUTROS
                                                if($_SESSION['tipo'] == 4 && $_SESSION['nome'] != $com["autor_original"]){
                                            echo "<menu>";
                                                echo '<ul class="menu_comen">'; 
                                                    echo '<li><a href="/progweb-blog/View/replyComen.php?postid=' . $postId . '&resp=' . $comID . '&user=' . $resp["autor_original"] .
                                                    '&conte=' . $respConteudo . ' "class="fix2" >Responder Comentário</a></li>'; 
                                                echo "</ul>";
                                            echo "</menu>";
                                                }//@ FECHA IF = USUÁRIO N RESPONDE SEUS PRÓPRIOS COMENTÁRIOS
                                                
                                                // @ABRE IF = SE FOR ADM OU REDATOR APARECE TODOS AS 3 AÇÕES PARA COMENTÁRIOS
                                                if($_SESSION['tipo'] == 1 || $_SESSION['tipo'] == 2 || $_SESSION['tipo'] == 3){ 
                    ?>  
                                                    <menu>
                                                                <ul class="menu_comen">
                                                                    <?php echo '<li><a href="/progweb-blog/View/replyComen.php?postid=' . $postId . '&resp=' . $comID . '&user=' . $resp["autor_original"] .
                                                                    '&conte=' . $respConteudo . ' "class="fix" >Responder Comentário</a></li>'; ?>
                                                                    <li ><a href='/progweb-blog/View/editComen.php?ed=<?php echo $respID; ?>' class="fix" > Editar Comentário</a></li>
                                                                    <li><a href='/progweb-blog/Controller/cmCRUDController.php?del=<?php echo $respID;?>&dct=true' class="fix" > Deletar Comentário</a></li>
                                                                </ul>
                                                        </menu>
                    <?php
                                            } //@FECHA IF = 3 AÇÕES PRA ADMS E REDATOR
                                        }//@FECHA IF = USUARIO AUTENTICADO, MOSTRAR AÇÕES                             
               
                                    
                                            } //@FECHA IF = PRA IMPRIMIR LOGO ABAIXO DO COMENTÁRIO RESPONDIDO  
                                        }//@FECHA IF = IMPRIME RESPOSTAS        
                                  }//@FECHA IF = SE O ID DO POST ATUAL EQUIVALE AO ID DO POST EM QUE FOI FEITO O COMENTÁRIO
                            }//@END IF = SÓ IMPRIME COMENTÁRIOS ATIVOS
                         }//FECHA FOREACH PRA IMPRIMIR COMENTÁRIOS
                            
                    }//@FECHA IF = QUALQUER UM PODE VISUALIZAR COMENTÁRIOS FEITOS
            }//@FECHA IF = SE POSTS ESTÃO ATIVOS 
        }//FECHA FOREACH PARA IMPRIMIR POSTS       
        
        ?>
        </div>
        
    </div>
    
  

</body>

</html>