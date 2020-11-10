<?php
$aux = 2;
$username = "aluno";
?>

<?php
//deteta a cidade que estamos
$user_ip = getenv('REMOTE_ADDR');
$geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$user_ip"));
$country = $geo["geoplugin_countryName"];
$city = $geo["geoplugin_city"];

//json com o ID de todas as cidades
$string = file_get_contents("../src/json/city_list.json");
$json_a = json_decode($string, true);

$id = "2735943";//id do porto

foreach($json_a as $item) { //foreach element in $arr
    $uses = $item['name']; //etc
    if($uses == $city){
        $id = $item['id'];
        break;
    }
}

$apiKey = "49fb978a57bb7cc84127bdd1700a3d94";
$cityId = $id;
$googleApiUrl = "http://api.openweathermap.org/data/2.5/weather?id=" . $cityId . "&lang=pt&units=metric&APPID=" . $apiKey;

$ch = curl_init();

curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_VERBOSE, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$response = curl_exec($ch);

curl_close($ch);
$data = json_decode($response);
$currentTime = time();

?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>ExplicaFeup - Dashboard</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link href="css/main.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>


</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a href="index.php"><img src="img/icon.png" class="icon ml-3"></a>
        <a class="navbar-brand" href="index.php">ExplicaFeup</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
        <!-- Profile-->
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#">Perfil</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="login.html">Logout</a>
                </div>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">

                        <div class="sb-sidenav-menu-heading">Menu principal</div>
                        <a class="nav-link" href="../index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <?php if ($aux == 0) : ?>
                            <div class="sb-sidenav-menu-heading">Aprender</div>
                            <a class="nav-link" href="aluno/avaliacao.php">
                                <div class="sb-nav-link-icon"><i class="far fa-file-alt"></i></div>
                                Avaliação
                            </a>

                            <a class="nav-link" href="aluno/aula.php">
                                <div class="sb-nav-link-icon"><i class="fab fa-youtube"></i></div>
                                Aula
                            </a>
                            <div class="sb-sidenav-menu-heading">Notas de cursos</div>
                            <a class="nav-link" href="aluno/notas.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Notas
                            </a>
                            <div class="sb-sidenav-menu-heading">Cursos</div>
                            <a class="nav-link" href="aluno/comprar_curso.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-shopping-cart"></i></div>
                                Comprar curso
                            </a>
                            <a class="nav-link" href="aluno/historico.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-history"></i></div>
                                Historico
                            </a>
                        <?php elseif ($aux == 1) : ?>
                            <a class="nav-link" href="prof/alunos.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-user-graduate"></i></div>
                                Alunos
                            </a>
                            <a class="nav-link" href="prof/salario.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-euro-sign"></i></div>
                                Salário
                            </a>
                        <?php elseif ($aux == 2) : ?>
                            <a class="nav-link" href="admin/users.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                Users
                            </a>
                            <a class="nav-link" href="admin/estatisticas.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-bar"></i></div>
                                Estatisticas
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    <?php echo $username ?>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>

                <div class="container-fluid">
                    <h1 class="m-4 text-center">BEM VINDO <?php echo strtoupper($username) ?></h1>
                    <div class="justify-content-center m-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="report-container">
                                        <h2><?php echo $data->name; ?></h2>
                                        <div class="time">
                                            <div><?php echo date("l, j F, Y", $currentTime); ?></div>
                                            <div><?php echo ucwords($data->weather[0]->description); ?></div>
                                        </div>
                                        <div class="weather-forecast">
                                            <img src="http://openweathermap.org/img/w/<?php echo $data->weather[0]->icon; ?>.png" class="weather-icon" /> <?php echo $data->main->temp_max; ?>&deg;C<span class="min-temperature"><?php echo $data->main->temp_min; ?>&deg;C</span>
                                        </div>
                                        <div class="time">
                                            <div>Humidade: <?php echo $data->main->humidity; ?> %</div>
                                            <div>Vento: <?php echo $data->wind->speed; ?> km/h</div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if ($aux == 2) : ?>
                        <!-- Content Row -->
                        <div class="row justify-content-center">
                            <!-- Earnings (Monthly) Card Example -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Earnings (Monthly)</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Earnings (Monthly) Card Example -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-success shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                    Earnings (Annual)</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <!-- Pending Requests Card Example -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-warning shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                    Pending Requests</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            <?php endif; ?>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="align-items-center justify-content-between small">
                        <div class="text-muted text-center">Copyright &copy; Fábio Morais e Fernando Silva 2020</div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/datatables-demo.js"></script>
    <script src="js/main.js"></script>
    
</body>

</html>