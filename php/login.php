<?php 
    session_start();
    include_once "config.php";
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    if(!empty($email) && !empty($password)){
        $sql = mysqli_query($conn, "SELECT * FROM user WHERE email = '{$email}'");
        if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql); //guarda a linha num array
            $user_pass = md5($password);
            $enc_pass = $row['password'];
            if($user_pass === $enc_pass){
                $state = "Active now";
                $sql2 = mysqli_query($conn, "UPDATE user SET state = '{$state}' WHERE unique_id = {$row['unique_id']}");
                if($sql2){
                    $_SESSION['unique_id'] = $row['unique_id']; //criar uma sessão com o id do utilizador que fez o login
                    echo "success";
                }else{
                    echo "Alguma coisa correu mal. Tente de novo!";
                }
            }else{
                echo "O email e password estão incorretos";
            }
        }else{
            echo "$email - Este email não existe!";
        }
    }else{
        echo "Todos os campos são obrigatórios!";
    }
?>