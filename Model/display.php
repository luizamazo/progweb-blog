<?php 

require_once("../config.php");

if(isset($_SESSION['logado'])){
    include 'navbar.html';

    $check = "SELECT * FROM Usuarios WHERE email = '$_SESSION[email]' ";

    $results = mysqli_query($link, $check) or die(mysqli_error($link));
    
    if(mysqli_num_rows($results) > 0){
        while($row = mysqli_fetch_assoc($results)){
            echo "<br/>nome: " . $row["nome"] . "<br/>email: " . 
            $row["email"] . "<br/>";
            $_SESSION['id'] = $row["id"];
            $_SESSION['nome'] = ucfirst($row["nome"]);
        }
    }
    echo "Bem Vindo $_SESSION[nome]";
}else{
    echo "Precisa estar logado pra ver essa página";
}





?>