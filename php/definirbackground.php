<?php
    session_start();
    $unique_id = $_SESSION['unique_id'];
    include_once "config.php";
    
    $bgimg_id = mysqli_real_escape_string($conn, $_GET['bgimg_id']); //ysqli_real_escape_string - limpa a string para enviar para a base de dados || $_GET[""] - serve para obter os numeros que vem proveniente daqule url
    
    $sql = mysqli_query($conn, "UPDATE user SET imgbg = '{$bgimg_id}' WHERE unique_id='{$unique_id}'");
    header("location: ../profile.php");   
?>