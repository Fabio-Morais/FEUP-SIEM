<?php
session_start();
include_once(dirname(__FILE__) . "/dataBase/dataBase.php");
/*Para retirar a visibilidade do erro*/
/*error_reporting(E_ERROR | E_PARSE);*/
$db = DataBase::Instance();

$courses = "";
$coursesQuery = "";
$connected = false;
$curso = $_GET['course'];

if ($db->connect()) {
    $coursesQuery = $db->getCourseInfo($curso);
    $connected = true;
} else
    Alerts::showError(Alerts::DATABASEOFF);

?>

<!doctype html>
<html lang="pt">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../img/icon.png">

    <title>Registo</title>

    <link href="public/css/styles.css" rel="stylesheet">
    <link href="public/css/register.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container">
    <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="../img/icon.png" alt="" width="72" height="72">
        <h2>Registo</h2>
    </div>

    <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Carrinho</span>
                <span class="badge badge-secondary badge-pill">1</span>
            </h4>
            <ul class="list-group mb-3">
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <?php
                        $courses = pg_fetch_assoc($coursesQuery);
                        echo "<h6 class=\"my-0\">".ucwords($courses['coursename'])."</h6>";
                        echo "<small class=\"text-muted\">Curso de ".ucwords($courses['coursename'])."</small>";
                        ?>
                    </div>
                    <?php
                    echo "<span class=\"text-muted\">".$courses['price']."€</span>";
                    ?>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span>Total (EUR)</span>
                    <?php
                    echo "<strong>".$courses['price']."€</strong>";
                    ?>
                </li>
            </ul>
        </div>



        <div class="col-md-8 order-md-1">
            <?php
            if (isset($_SESSION['usererror']))
                echo "<div class=\"form-group\"> <span style='color:red;'>* O username já existe</span> </div>";
            elseif (isset($_SESSION['passerror']))
                echo "<div class=\"form-group\"> <span style='color:red;'>* As passwords não correspondem</span> </div>";
            ?>
            <h4 class="mb-3">Informação Pessoal</h4>
            <?php
               echo "<form class=\"needs-validation\" method=\"post\" action=\"action/checkRegister.php?course=".urlencode($courses['coursename'])."\" novalidate>";
            ?>

                <div class="mb-3">
                    <label for="name">Nome</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nome" value="" required>
                    <div class="invalid-feedback">
                        Nome inválido.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="user">Username</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">@</span>
                        </div>
                        <input type="text" class="form-control" id="user" name="user" placeholder="Username" required>
                        <div class="invalid-feedback" style="width: 100%;">
                            Your username is required.
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                    <div class="invalid-feedback">
                        Password inválida.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="confirmarpassword">Confirmar Password</label>
                    <input type="password" class="form-control" id="confirmarpassword" name="confirmarpassword" placeholder="Password" required>
                    <div class="invalid-feedback">
                        Password inválida.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="email">Email <span class="text-muted">(Opcional)</span></label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="nome@exemplo.com">
                </div>


                <div class="mb-3">
                    <label for="nif">NIF <span class="text-muted">(Opcional)</span></label>
                    <input type="text" class="form-control" id="nif" name="nif" placeholder="ex: 123456789">
                </div>

                <div class="mb-3">
                    <label for="phone">Nº Telefone <span class="text-muted">(Opcional)</span></label>
                    <input type="phone" class="form-control" id="phone" name="phone" placeholder="ex: 912345678">
                </div>


                <hr class="mb-4">
                <button class="btn btn-primary btn-lg btn-block" type="submit">Comprar</button>
            </form>
        </div>
    </div>

    <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mt-5 mb-3 text-muted">&copy; Fábio Morais e Fernando Silva 2020</p>
    </footer>
</div>

</body>
</html>
