<?php 

    session_start();
    
    include "sql.php";

    spl_autoload_register(function($class_name){
        $filename = "class" . DIRECTORY_SEPARATOR. $class_name. ".php";
        if(file_exists($filename)){
            require_once($filename);
        }
    })

/* FUNÇÃO PRA CONEXAO COM MYSQLI 
   function dbConn(){
        $conn = "";
        $host = "localhost";
        $user = "root";
        $pass = "";
        $dbname = "mtDB";

        $conn = mysqli_connect($host, $user, $pass, $dbname);

        if(!$conn){
            die("NFUNCIONOU" . mysqli_connect_errno());
        }else{
            return $conn;
        }
    }
    */

?>