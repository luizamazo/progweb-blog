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
/* function checkUser(){
            $aux = $_SESSION['tipo'];
            global $admG;
            global $adm;
            global $reda;
            global $usu;

            foreach($aux as $tipo){
                foreach($tipo as $value){
                    if($value == 1){
                        $admG = "";
                        return $admG = "admG";
                    }else if($value == 2){
                        $adm = "";
                        return $adm = "adm";
                    }else if($value == 3){
                        $reda = "";
                        return $reda = "reda";
                    }else if($value == 4){
                        $usu = "";
                        return $usu = "usu";
                    }
                    
                }
            }
        }



$auth = new auth();

*/

?>