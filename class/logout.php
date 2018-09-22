<?php 

session_start();

if(isset($_SESSION['logado'])){
    session_destroy();
    header("Location: /progweb-blog/view/inicio.php");
   
    /* if(session_status() == 0){
        echo "session disabled";
    }else if(session_status() == 1){
        echo "enabled but none exists";
    }else{
        echo "active and exists"
    }
    */
}


?>