<?php
    session_start();

    include_once "config.php";

    $unique_id = $_SESSION['unique_id'];

    $sql = "SELECT * FROM user WHERE unique_id = {$unique_id}"; //vai selecionar todos as linhas exceto a da sessão criada
    
    $query = mysqli_query($conn, $sql); //realiza uma consulta na base de dados

    $row = mysqli_fetch_assoc($query);

    $output = '<style>
                    body { 
                        background-image: url("background/'.$row['unique_id']."/".$row['imgbg'].'");
                        background-attachment: fixed;
                        background-size: cover;  
                        background-position: center;
                        }
                </style>';     
    echo $output;
?>