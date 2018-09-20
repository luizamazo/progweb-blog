<?php

session_start();

    if(isset($_SESSION['logado'])){

        include 'navbar.html';
        include 'cadProduto.html';

        if(isset($_POST['submit'])) {
            
            $produto = $_POST['produto'];
            $valor = $_POST['valor'];
            $quantidade = $_POST['quantidade'];
            $descricao = $_POST['desc'];

            $link = mysqli_connect("localhost", "root", "", "mtDB");

            $result = mysqli_query($link, "INSERT INTO produtos (produto, valor, 
            quantidade, descricao) VALUE('$produto', '$valor', '$quantidade',
            '$descricao')");
            
            if($result){
                echo "Inserido com sucesso!";
            }else{
                die("Deu ruim em algo" . mysqli_error($result));
            } 
        }
    }else{
    echo "Precisa estar logado pra ver essa página";
    }




?>