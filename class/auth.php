<?php

require_once("../config.php");
    include "sql.php";

    $link = new sql();
    $conn = $link->createConn();
// auth pro index inicial

    $auth = (int) $_SESSION['tipo'];
    echo $auth;
    
switch($auth){
       
        case "1":
            header("location: admGindex.php");
            break;
        case "2":
            header("location: admIndex.php");
            break;
        case "3": 
            header("location: redaIndex.php");
            break;
        case "4":
            header("location: userIndex.php");
            break;
        default: 
            echo "deu ruim";    
    }

   



?>