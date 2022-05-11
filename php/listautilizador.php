<?php
    session_start();
    include_once "config.php";
    $outgoing_id = $_SESSION['unique_id'];
    $state = "Active now";
    $sql = "SELECT * FROM user WHERE NOT unique_id = {$outgoing_id} AND state = '{$state}' ORDER BY id DESC"; //vai selecionar todos as linhas exceto a da sessão criada
    $query = mysqli_query($conn, $sql); //realiza uma consulta na base de dados
    $output = "";
    if(mysqli_num_rows($query) == 0){
        $output .= "No users are available to chat"; //.=serve para concatenar --> $var  = "test"; $var .= "value"; echo $var; o resultado é testvalue
    }elseif(mysqli_num_rows($query) > 0){
        
        while($row = mysqli_fetch_assoc($query)){ //vai percorrer todas as linhas e quando não existirem mais nenhumas sai do ciclo while
          
            //($row['state'] == "Offline now") ? $offline = "offline" : $offline = "";
    
            $output .= '<a><img class="profileimgsm" src="php/images/'. $row['img'] .'" alt="">
                        <div class="details-user">
                            <p>'. $row['username'].'</p>
                            <p>'. $row['email'].'</p>
                        </div>
                        </a>';
        }

    }
    echo $output;
?>