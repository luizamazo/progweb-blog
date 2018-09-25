<?php

require_once("../config.php");
include "sql.php";

class auth{

    public function authIndex(){
        
       $link = new sql();
       $conn = $link->createConn();
        // auth pro index inicial

       $auth = $_SESSION['tipo'];

                switch($auth){
                
                    case "1":
                        header("location: /progweb-blog/View/admGindex.php");
                        break;
                    case "2":
                        header("location: /progweb-blog/View/admIndex.php");
                        break;
                    case "3": 
                        header("location: /progweb-blog/View/redaIndex.php");
                        break;
                    case "4":
                        header("location: /progweb-blog/View/userIndex.php");
                        break;
                    default: 
                    
                        echo "deu ruim";    
                }
            }
        }

?>