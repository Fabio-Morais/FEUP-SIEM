<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>ExplicaFeup - Registo</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Pagamento</h3></div>
                                    <div class="card-body">
                                        <form method="post" action="dashboard/action/checkRegister.php">
                                            <?php
                                              if (isset($_SESSION['error'])){
                                                echo "<div class=\"form-group\">
                                                            <span style='color:red;'>* Por favor, preencha todos os campos</span>
                                                        </div>";
                                                        $_SESSION['error'] = FALSE;
                                              }
                                              if (isset($_SESSION['passerror'])){
                                                echo "<div class=\"form-group\">
                                                            <span style='color:red;'>* As passwords não correspondem</span>
                                                        </div>";
                                                        $_SESSION['passerror'] = FALSE;
                                              }
                                              if (isset($_SESSION['usererror'])){
                                                echo "<div class=\"form-group\">
                                                            <span style='color:red;'>* O nome de utilizador já existe</span>
                                                        </div>";
                                                        $_SESSION['usererror'] = FALSE;
                                              }
                                            ?>
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <h3 class="big" >Informação pessoal</h3>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1">Username</label>
                                                <input class="form-control py-4" id="user" type="user" name="user" placeholder="Username" required/>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1">Password</label>
                                                <input class="form-control py-4" id="password" type="password" name="password" placeholder="Password" required/>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1">Confirmar Password</label>
                                                <input class="form-control py-4" id="confirmarpassword" type="password" name="confirmarpassword" placeholder="Password" required/>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1">Email</label>
                                                <input class="form-control py-4" id="email" type="email" name="email" placeholder="Email" required/>
                                            </div>
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <h3 class="big" >Detalhes de Pagamento</h3>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1">Nome no Cartão</label>
                                                <input class="form-control py-4" id="name" type="name" name="name" placeholder="Nome" required/>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1">NIF</label>
                                                <input class="form-control py-4" id="nif" type="nif" name="nif" placeholder="NIF" required/>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1">Nº Cartão</label>
                                                <input class="form-control py-4" id="card" type="card" name="card" placeholder="Nº Cartão" required/>
                                            </div>
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <h1 class="small" >Valor </h1>
                                                <input class="btn btn-primary" type="submit" value="Comprar"/>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="login.php">Já tem conta? Faça login!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
