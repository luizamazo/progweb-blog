<?php 

session_start();

if(isset($_SESSION['logado'])){
    session_destroy();
    header("Location: /progweb-blog/View/inicio.php");
}


?>