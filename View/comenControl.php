<?php 
 
 require_once("../config.php");
 require_once("../class/auth.php");
 require_once("../Model/postCRUD.php");
 require_once("../Model/cmCRUD.php");
   
   if($_SESSION['logado'] == true){
?>

<!DOCTYPE html>
<html>
	
	<head>
        <meta charset="UTF-8">
		<title>USER - INDEX</title>
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
            <li><a href="userIndex.php" id="atual">DASHBOARD</a></li>
            <li><a href="/progweb-blog/class/logout.php">SAIR</a></li>
        </ul>

        <hr id="traco">
    </div>

    <br>
    <br>
    <br>
    <br>
    <br>

    <div id="invisivel"><h2>...</h2></div>
    <div id="corpo_ccontrol">
      
      <div class="centrocontrol">
        <label class="text1">COMENTÁRIOS DO USUÁRIO</label>
        
        <br>
        <br>

        <div>
          <ul id="gerencia1">
            <?php 

            $objp = new postCRUD();
            $objc = new cmCRUD();
            $vp = $objp->callSelectP();
            $vc = $objc->callSelectCM();
            $uc = $objc->callCMUser();

         foreach($vp as $post){

            $check = $objp->checkDel($post["id"]);
            $edit = $objp->checkEdit($post["id"]); 
       
             foreach($uc as $com){
                
                $checkCM = $objc->checkDelCM($com["id"]);
                $editCM = $objc->checkEditCM($com["id"]);
                
                if($post["id"] == $com["post_id"]){ 
                     if($checkCM == false){ ?>
                            <hr>
                            <h2><?php echo $post['titulo']; ?></h2>
                            
                        <p>
                        <h5>    Postado por <?php echo ucwords($post['autor_original']); ?> | <?php echo $post['data_original']; 
                                if($edit == true){
                                        echo "<br>Editado por: " . ucwords($post['autor_editado']) . " | ". $post['data_editado'];
                                    }?>
                        </h5>
                            </p>
                            <div><?php echo nl2br($post['conteudo']); ?></div>
                        <hr>
                        <p>
                        <h4> Comentado por 
                            <?php 
                                echo ucwords($com['autor_original']); 
                            ?> | 
                            <?php 
                                echo $com['data_original']; 
                                if($editCM == true){
                                echo "<br>Editado por: " . ucwords($com['autor_editado']) . " | ". $com['data_editado']; } 
                            ?>
                        </h4>
                        </p>
                            <div><?php echo nl2br($com['conteudo']); ?></div>
                    <?php
                        }
                    }
                } 
            }
            ?>
          </ul>  
        </div>
             
      </div>

    </div>  
	</body>
</html>

<?php 
}else{
    echo "<script>alert('Você não está autorizado a ver essa página!'); window.location = '../View/inicio.php';</script>";
}
?>