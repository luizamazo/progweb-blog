<?php 
   
   require_once("../config.php");
   require_once "../class/auth.php";
     
     //$aux = auth::checkUser();
     if(isset($_SESSION['tipo']) && $_SESSION['tipo'] != 2 && $_SESSION['tipo'] != 4){
     //if(isset($_SESSION['tipo']) && $aux == "admG"){
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    
    <title>CRIAR POST</title>

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


    <div id="corpo_cposts">
        
        
        <div class="centro_cposts">          

            <div id="criar_cposts"><h1> CRIAR NOVO POST </h1></div>
            <form action="/progweb-blog/class/postCRUD.php" method="post">
            
            <input type="text" name="titulo" placeholder="Insira aqui o título do post" id="titulo_cposts"><br><br>
            <textarea name="conteudo" id="conteudo_cposts" cols="30" rows="20" placeholder="Insira aqui o conteúdo do post!!!" ></textarea><br><br>
            
            <input type="submit" name="submit" value="Criar Post"><br>
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
