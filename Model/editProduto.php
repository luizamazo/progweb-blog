<?php

session_start();

    if(isset($_SESSION['logado'])){

        include 'navbar.html';
        include 'editProduto.html';

        if(isset($_POST['submit'])) {
            
            $produto = $_POST['produto'];
            $valor = $_POST['valor'];
            $quantidade = $_POST['quantidade'];
            $descricao = $_POST['desc'];


            $link = mysqli_connect("localhost", "root", "", "mtDB");

            $result = mysqli_query($link, "UPDATE produtos SET produto = '$produto', 
            valor = '$valor', quantidade = '$quantidade', descricao = '$descricao' WHERE id = 1 ");
            
            if($result){
                echo "Alterado com sucesso!";
            }else{
                die("Deu ruim em algo" . mysqli_error($link));
            } 
        }
    }else{
    echo "Precisa estar logado pra ver essa página";
    }




?>