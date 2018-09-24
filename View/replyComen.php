<?php 
   
   require_once("../config.php");
   require_once "../class/auth.php";

     
     
     if(isset($_SESSION['tipo']) && $_SESSION['logado'] == true){
        
        $postID = $_GET['postid'];
        $respID = $_GET['resp'];
        $comConteudo = $_GET['conte'];
        $comUser = $_GET['user'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    
    <title>RESPONDER COMENTÁRIO</title>

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
       <?php 
            if($_SESSION['tipo'] == 1){ 
               echo '<li><a href="admGIndex.php">DASHBOARD</a></li>';
             }else if($_SESSION['tipo'] == 2){ 
                echo '<li><a href="admIndex.php">DASHBOARD</a></li>';
             } 
        ?>
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
     <div class="corpo_edtComent">
        
        
        <div class="centro_edtComent">

           <label class="text1">EM RESPOSTA A</label>

         <div style="color: red;"><h5><?php echo ucwords($comUser);?>:"<?php echo $comConteudo; ?>"</h5></div>
             
         <?php  echo '<form action="/progweb-blog/Controller/cmCRUDController.php?id='.$postID.'&user='. $comUser . '&resp='. $respID . '" method="post">'; ?>
            
            <textarea name="conteudo" id="conteudo_cposts" cols="30" rows="20" required placeholder="Insira aqui a sua resposta"></textarea><br><br>
            <input type="hidden" name="cct" value="true">
            <input type="submit" name="submit" value="Salvar" class="botao4" id="link1"><br>
            </form>
      
            
    </div>
    </div>

</body>

</html>

<?php 
}else{
    echo "<script>alert('Você não está autorizado a ver essa página!'); window.location = '../View/inicio.php';</script>";
}

?>
