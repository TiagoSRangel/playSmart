<?php
    session_start();
    include_once "config.php";
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    if(!empty($username) && !empty($email) && !empty($password)){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){ //verificar se é um email válido
            $sql = mysqli_query($conn, "SELECT * FROM user WHERE email = '{$email}'");
            if(mysqli_num_rows($sql) > 0){ //verificar se exite alguem o mesmo email
                echo "$email - Este email já existe!";
            }else{
                if(isset($_FILES['image'])){
                    $img_name = $_FILES['image']['name'];
                    $img_type = $_FILES['image']['type'];
                    $tmp_name = $_FILES['image']['tmp_name'];
                    
                    $img_explode = explode('.',$img_name);
                    $img_ext = end($img_explode);
    
                    $extensions = ["jpeg", "png", "jpg"];
                    if(in_array($img_ext, $extensions) === true){
                        $types = ["image/jpeg", "image/jpg", "image/png"];
                        if(in_array($img_type, $types) === true){
                            $time = time();
                            $new_img_name = $time.$img_name;
                            if(move_uploaded_file($tmp_name,"images/".$new_img_name)){
                                $ran_id = rand(time(), 100000000);
                                $state = "Active now";
                                $encrypt_pass = md5($password);
                                $insert_query = mysqli_query($conn, "INSERT INTO user (unique_id, username, email, password, img, state)
                                VALUES ({$ran_id}, '{$username}', '{$email}', '{$encrypt_pass}', '{$new_img_name}', '{$state}')");
                                if($insert_query){
                                    $select_sql2 = mysqli_query($conn, "SELECT * FROM user WHERE email = '{$email}'");
                                    if(mysqli_num_rows($select_sql2) > 0){
                                        $result = mysqli_fetch_assoc($select_sql2);
                                        $_SESSION['unique_id'] = $result['unique_id'];
                                        echo "success";
                                    }else{
                                        echo "Este email não existe!";
                                    }
                                }else{
                                    echo "Alguma coisa correu mal. Por favor, tenta de novo!";
                                }
                            }
                        }else{
                            echo "Por favor, envia uma imagem do tipo - jpeg, png, jpg";
                        }
                    }else{
                        echo "Por favor, envia uma imagem do tipo - jpeg, png, jpg";
                    }
                }
            }
        }else{
            echo "$email não é valido";
        }
    }else{
        echo "Todos os campos são obrigatórios!";
    }
?>