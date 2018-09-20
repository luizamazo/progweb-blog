<?php

session_start();

    if(isset($_SESSION['logado'])){

        include 'navbar.html';
        $link = mysqli_connect("localhost", "root", "", "mtDB");
        $result = mysqli_query($link, "SELECT id, produto, quantidade, valor FROM 
        produtos");
        $allprop = array(); //um array pra salvar todas as propriedades ali debaixo
        
        if(mysqli_num_rows($result) > 0){
            echo '<table border="1">';
                echo "<tr>";
                while($prop = mysqli_fetch_field($result)){ //pra pegar os campos do db pra header
                    echo "<td> (campos)" . $prop->name . "</td>"; //name = nome da coluna
                    array_push($allprop, $prop->name); //salva os nomes no array la de cima
                    //percorri só os nomes do bd e adicionei eles no vetor
                }
                echo "</tr>";

                while($row = mysqli_fetch_array($result)){ 
                    echo "<tr>";
                    //como eu fiz um array dos campos, aqui eu acesso os valores desses campos (qe eu peguei ali em cima e salvei num array
                    //dai eu percorro esse array e pego os valores dele)
                    foreach($allprop as $value){ //atribuo à valor os campos do bd id, produto etc
                        echo "<td>". $row[$value] . "</td>";//pega itens usando a propriedade
                   //imprimo ^^^ o valor dos campos do array associativo
                    }
                    echo "</tr>";
                }
           
                /*foreach($result as $res){ //pego a query e faço uma variavel pra elemento individual do array
                    var_dump($res);
                    foreach($res as $key){ //pego os elementos do array associativo (index e valor) e imprimi só o valor
                        echo "<br> AQUI KEY <br>";
                        var_dump($key);
                    }
                */
            echo "</table>";
        }else{
            die("Deu ruim em algo" . mysqli_error($link));
        } 
      
    }else{
          echo "Precisa estar logado pra ver essa página";
    }




?>