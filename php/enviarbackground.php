<?php
    session_start();
    include_once "config.php";

    $path = "../background/" . $_SESSION['unique_id'];
    
    if(!is_dir($path)){
        mkdir("../background/" .$_SESSION['unique_id']);
    }

    if(isset($_FILES['image'])){
        $img_name = $_FILES['image']['name'];
        $img_type = $_FILES['image']['type'];
        $tmp_name = $_FILES['image']['tmp_name']; //temp_name é o nome temprário do ficheiro enviado que é gerado automaticamente e armazenado na pasta temporária do servidor e a função move_uploaded_file vai tornar esse ficheiro permanente e vai ser guardado no servidor 
        
        $img_explode = explode('.',$img_name);
        $img_ext = end($img_explode);

        $extensions = ["jpeg", "png", "jpg"];
        if(in_array($img_ext, $extensions) === true){
            $types = ["image/jpeg", "image/jpg", "image/png"];
            if(in_array($img_type, $types) === true){
                $time = time();
                $new_img_name = $time.$img_name;
                if(move_uploaded_file($tmp_name,"../background/" . $_SESSION['unique_id'] . "/". $new_img_name)){
                    mysqli_query($conn, "INSERT INTO imgbd (unique_id, img) 
                    VALUES ({$_SESSION['unique_id']}, '{$new_img_name}')");                  
                }
            }else{
                echo "Por favor transfere uma imagem - jpeg, png, jpg";
            }
        }else{
            echo "Por favor transfere uma imagem - jpeg, png, jpg";
        }
    }

?>