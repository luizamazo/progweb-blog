<?php

require_once("../config.php");
    include "sql.php";

    $link = new sql();
    $conn = $link->createConn();
// auth pro index inicial

    $auth = $_SESSION['tipo'];


    foreach($auth as $tipo){
        foreach($tipo as $value)
            switch($value){
            
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
}
   



?>