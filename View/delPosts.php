<?php 
   
   require_once("../config.php");
   require_once "../class/auth.php";
     
     //$aux = auth::checkUser();
     if(isset($_SESSION['tipo']) && $_SESSION['tipo'] != 2 && $_SESSION['tipo'] != 4){
     //if(isset($_SESSION['tipo']) && $aux == "admG"){
        $cod = $_GET['id'];
        $titulo = $_GET['titulo'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    
    <title>DELETAR POST</title>

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
              <?php if($_SESSION['tipo'] == 1){ ?>
                <li><a href="admGIndex.php">DASHBOARD</a></li>
            <?php }else if($_SESSION['tipo'] == 2){ ?>
                <li><a href="admIndex.php">DASHBOARD</a></li>
            <?php } ?>
            <li><a href=/progweb-blog/class/logout.php>SAIR</a></li>
        </ul>

        <hr id="traco">
    </div>

    <br>
    <br>
    <br>
    <br>
    <br>


    <div id="corpo_texto1">
        
        <div class="centro1">

            <div><h1> DESEJA MESMO DELETAR "" </h1></div>


            <form action="/progweb-blog/class/postCRUD.php" method="post">
            
            <input type="text" name="titulo" placeholder="Novo Título"><br><br>
            <textarea name="conteudo" id="conteudo" cols="30" rows="20" placeholder="Novo Conteúdo"></textarea><br><br>
            <input type="hidden" name="id" value="<?php $cod; ?>">
            <input type="submit" name="submit" value="Salvar"><br>
            </form>

    
    </div>
    </div>

</body>

</html>

<?php 
}else{
    echo "Você não está autorizado a acessar essa página";
}

?>
