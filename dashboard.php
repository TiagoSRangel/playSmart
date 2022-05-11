<?php 
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['unique_id'])){ // se a sessão não existir volta para a página de login
    header("location: login.php"); 
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Dashboard</title>
</head>
<body>
    <div class="new-background"></div>

    <div class="menu-bg">
        <div class="menu">
            <a class="aimg" href="home.php"><img class="logosmall" src="logojogo3.png" alt=""></a>
            <nav class="menu-nav">
                <ul>
                    <li class="item"><a href="home.php">Dashboard</a></li>
                    <li class="item"><a href="games.php">Jogos</a></li>
                    <li class="item"><a href="profile.php">Perfil</a></li>
                </ul>
            </nav>
        </div>
    </div>  
    <div class="content-width">

        <div class="main">
            <div>
                <?php 
                    $sql = mysqli_query($conn, "SELECT * FROM user WHERE unique_id = {$_SESSION['unique_id']}");
                    if(mysqli_num_rows($sql) > 0){
                        $row = mysqli_fetch_assoc($sql);
                    }
                ?>
                <div class="details">
                    <h1>Conta: <?php echo  $row['username']?></h1>
                    <br>
                    <h1 class="title">Estes são os jogos mais populares de momento</h1>
                    <a class="jogo" href="games/tic-tac-toe-main/"><p>Jogo do Galo - Duas Pessoas</p></a>
                    <a class="jogo" href="games/connect-four-game-js/"><p>4 em linha - Duas Pessoas</p></a> 
                    <a class="jogo" href="games/memory/"><p>Jogo da Memória - Uma Pessoa</p></a> 
                    <a class="jogo" href="games/lotto-js-game/"><p>Loto - Uma Pessoa</p></a> 
                    <a class="jogo" href="games/bingo-js/"><p>Bingo - Uma Pessoa</p></a> 
                </div>
            </div>    
            
            <div>
                <h2>Jogadores Ativos</h2>
                <div class="users-list">
                    
                </div>
            </div>
        </div>
        <a class="btl-logout" href="php/logout.php?logout_id=<?php echo $row['unique_id']; ?>" class="logout">Terminar Sessão</a>
    </div>
    
    <script src="javascript/todosbackground.js"></script>
    <script src="javascript/users-list.js"></script>
    

</body>
</html>