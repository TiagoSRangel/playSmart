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
    <title>Perfil</title>
</head>
<body>
    <div class="new-background"></div>
    
    <div class="menu-bg">
        <div class="menu">
            <a class="aimg" href="home.php"><img class="logosmall" src="logojogo3.png" alt=""></a>
            <nav class="menu-nav">
                <ul>
                    <li class="item"><a href="dashboard.php">Dashboard</a></li>
                    <li class="item"><a href="games.php">Jogos</a></li>
                    <li class="item"><a href="perfil.php">Perfil</a></li>
                </ul>
            </nav>
        </div>
    </div> 
    <div class="content-width">

        <div class="profile">
            <?php 
                $sql = mysqli_query($conn, "SELECT * FROM user WHERE unique_id = {$_SESSION['unique_id']}");
                if(mysqli_num_rows($sql) > 0){
                    $row = mysqli_fetch_assoc($sql);
                }
            ?>
            <div class="imgperfil">
                <h1>Perfil</h1>
                <img class="profileImg" src="php/images/<?php echo $row['img']; ?>" alt="">
            </div>
            
            <div class="details">
                <div class="username">
                    <p>Username</p>
                    <p><?php echo $row['username']?></p>
                </div>
                <div class="email">
                    <p>Email</p>
                    <p><?php echo $row['email']?></p>
                </div>
            </div>
        </div>     

        <div class="mainbackground">    
            
            <div class="formbackground">
                <h1>Imagem de Fundo</h1>
                <form action="#" method="POST" enctype="multipart/form-data">
                    <div class="image">
                        <label>Submeta uma imagem de fundo</label> <br>
                        <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg">
                    </div>
                    <div class="buttonBackground">
                        <input class="btn-bg" type="submit" name="submit" value="Submeter"/>
                    </div>
                </form>
                <h1>Selecione uma imagem de fundo</h1>
                <div class="mostarbackground"></div>
            </div>
            
        </div>

            <a class="btl-logout" href="php/logout.php?logout_id=<?php echo $row['unique_id']; ?>" class="logout">Terminar Sessão</a>

            <script src="javascript/background.js"></script>
            <script src="javascript/todosbackground.js"></script>

        

    </div>


</body>
</html>