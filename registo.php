<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Registar</title>
</head>
<body>
    <div class="container">
        <div class="panel-main">
            <div class="panel-left">
                <h1 class="titulologo">PlaySmart</h1>
                <img class="logobig" src="logojogo3.png" alt="">
            </div>
            <div class="panel-right">
                <h1>Registar</h1>
                <form class="form-right" action="#" method="POST" enctype="multipart/form-data">      
                    <div class="error-text"></div>
                    <div class="textfield">
                        <label for="username" required>Username</label>
                        <input type="text" name="username" required></input>
                    </div>
                    <div class="textfield">
                        <label for="email">Email</label>
                        <input type="email" name="email" required></input>
                    </div>
                    <div class="textfield">
                        <label for="password">Password</label>
                        <input type="password" name="password" required></input>
                    </div>
                    <div class="selectimage">
                        <label>Submeter imagem de perfil</label>
                        <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg">
                    </div>
                    <div class="button">               
                        <input class="btn-panel" type="submit" name="submit" value="Registar"></input>
                    </div>
                    <p>Já és um membro? <a class="astyle" href="login.php">Sign in</a></p>
                </form>
            </div>       
        </div>
    </div>

    <script src="javascript/signup.js"></script>

</body>
</html>