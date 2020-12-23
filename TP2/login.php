<?php session_start(); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" type="image/x-icon" href="img/icon.png" />

    <title>Login</title>

    <link href="css/styles.css" rel="stylesheet">
    <link href="css/signin.css" rel="stylesheet">
</head>

<body class="text-center">
    <form class="form-signin" method="post" action="dashboard/action/checkLogin.php">
        <img class="mb-4" src="img/icon.png" alt="" width="100" height="100">
        <h1 class="h3 mb-3 font-weight-normal">Login</h1>
        <?php
        if (isset($_SESSION['error']))
            echo "<div class=\"form-group\"> <span style='color:red;'>* Username e/ou password incorretos</span> </div>";
        ?>
        <?php
        if (isset($_SESSION['errorInexistente']))
            echo "<div class=\"form-group\"> <span style='color:red;'>* O utilizador não existe</span> </div>";
        ?>
        <label for="user" class="sr-only">Username</label>
        <input id="user" type="user" name="user" class="form-control" placeholder="Username" required autofocus>

        <label for="inputPassword" class="sr-only">Password</label>
        <input id="password" type="password" name="password" class="form-control" placeholder="Password" required>

        <div class="checkbox mb-3" style="text-align: left; margin-left: 5px">
            <label>
                <input type="checkbox" value="remember-me"> Lembrar-me
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit" value="Login">Entrar</button>
        <p class="mt-5 mb-3 text-muted">&copy; Fábio Morais e Fernando Silva 2020</p>
    </form>
</body>
</html>
