<?php 
   
   require_once("../config.php");
   require_once "../class/auth.php";
     
     //$aux = auth::checkUser();
     if(isset($_SESSION['tipo']) && $_SESSION['tipo'] != 4){
     //if(isset($_SESSION['tipo']) && $aux == "admG"){
        $cod = $_GET['id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    
    <title>EDITAR POST</title>

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
            <li><a href="">OLÁ, <?php echo strtoupper($_SESSION['nome']);?> !</a></li>
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
     <div id="corpo_cposts">
        
        
        <div class="centro_cposts">

           <label class="text1">EDITAR POST</label>
           <br> 
           <br>

           <?php  echo '<form action="/progweb-blog/controller/postCRUDController.php?id='. $cod . '" method="post">'; ?>
            
            <input type="text" name="titulo" id="titulo_cposts" placeholder="Insira aqui o novo título"><br><br>
            <textarea name="conteudo" id="conteudo_cposts" cols="30" rows="20" placeholder="Insira aqui o novo conteúdo"></textarea><br><br>
            <input type="hidden" name="id" value="<?php $cod; ?>">
            <input type="hidden" name="ept" value="true">
            <input type="submit" name="submit" value="Salvar" class="submit" id="link1"><br>
            </form>
                
            <?php "chama o edit por objeto?" ?>
    
    </div>
    </div>

</body>

</html>

<?php 
}else{
    echo "Você não está autorizado a acessar essa página";
}

?>
