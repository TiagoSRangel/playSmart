<?php
    session_start();

    include_once "config.php";

    $unique_id = $_SESSION['unique_id'];

    $sql = "SELECT * FROM imgbd WHERE unique_id = {$unique_id}"; //vai selecionar todos as linhas exceto a da sessão criada
    
    $query = mysqli_query($conn, $sql); //realiza uma consulta na base de dados

    $output = "";
    if(mysqli_num_rows($query) == 0){
        $output .= "Sem backgrounds disponiveis"; //.=serve para concatenar --> $var  = "test"; $var .= "value"; echo $var; o resultado é testvalue
    }elseif(mysqli_num_rows($query) > 0){
        while($row = mysqli_fetch_assoc($query)){ //vai percorrer todas as linhas e quando não existirem mais nenhumas sai do ciclo while
            $output .= '<a href="php/set-background.php?bgimg_id='.$row['img'] .'" ">
                            <img  class="image-bg" src="background/'.$_SESSION['unique_id']. '/'.$row['img'] .'" alt="'.$row['img'] .'">
                        </a>';
        }
    }
    echo $output;
?>