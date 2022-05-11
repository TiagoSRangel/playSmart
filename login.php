<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="panel-main">
            <div class="panel-left">
                <h1 class="titulologo">PlaySmart</h1>
                <img class="logobig" src="logojogo3.png" alt="">
            </div>
            <div class="panel-right">
                <h1>Login</h1>
                <form  class="form-right" action="#" method="POST" enctype="multipart/form-data">
                    <div class="error-text"></div>
                    <div class="textfield">
                        <label for="emai">Email</label>
                        <input type="text" name="email" required></input>
                    </div>
                    <div class="textfield">
                        <label for="password">Password</label>
                        <input type="password" name="password" required></input>
                    </div>
                    <div class="button">             
                        <input class="btn-panel" type="submit" name="submit" value="Login">
                    </div>       
                </form>
                <p>Ainda não és membro? <a class="astyle" href="register.php">Inscreve-te</a></p>   
            </div>
        </div>
    </div>   

    <script src="javascript/signin.js"></script>

</body>
</html>