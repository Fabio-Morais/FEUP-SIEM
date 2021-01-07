<?php
/**
 * Cria uma objeto da classe Weather, que vai buscar à API a informação do tempo relativo à cidade em que o utilizador se encontra, relativamente ao IP
 */
require_once(dirname(__FILE__) . "/includes/common/weather.php");
$weather = new Weather();
$data = $weather->get_data();
$currentTime = $weather->get_time();
?>

<?php include_once(dirname(__FILE__) . "/includes/common/alerts.php"); ?>
<?php require_once(dirname(__FILE__) . "/templates/common/header.php"); ?>
<?php require_once(dirname(__FILE__) . "/templates/common/navbar.php"); ?>
<?php

include_once(dirname(__FILE__) . "/dataBase/dataBase.php");
/*Para retirar a visibilidade do erro*/
/*error_reporting(E_ERROR | E_PARSE);*/
$db = DataBase::Instance();
$dailyEarning['sum']="0";
$monthEarning['sum']="0";
$totalCourses['count']="0";
$connected = false;
if ($db->connect()) {

    $monthEarningQuery = $db->getTotalMonthProfit();
    $dailyEarningQuery = $db->getTotalDailyProfit();
    $totalCoursesQuery = $db->getTotalCourses();

    $connected = true;
    $monthEarning = pg_fetch_assoc($monthEarningQuery);
    $dailyEarning = pg_fetch_assoc($dailyEarningQuery);
    $totalCourses = pg_fetch_assoc($totalCoursesQuery);

    if(empty($dailyEarning['sum']) ){
        $dailyEarning['sum']="0";
    }
    if(empty($monthEarning['sum']) ){
        $monthEarning['sum']="0";
    }

} else
    Alerts::showError(Alerts::DATABASEOFF);


?>

<div class="container-fluid" >

    <h1 class="m-4 p-4 text-center ">BEM VINDO <?php echo strtoupper($_SESSION['user']) ?></h1>
    <div class="justify-content-center m-4 p-4 animate__animated animate__fadeIn animate__delay-1s " >
        <div class="card border-left-primary shadow" id="weatherCard" >
            <div class="report-container ">
                <h2><?php echo $data->name; ?></h2>
                <div class="time">
                    <div><?php echo utf8_encode ($currentTime); ?></div>
                    <div class="font-weight-bold"><?php echo ucwords($data->weather[0]->description); ?></div>
                </div>
                <div class="weather-forecast">
                    <img src="http://openweathermap.org/img/w/<?php echo $data->weather[0]->icon; ?>.png" class="weather-icon" /> <?php echo $data->main->temp; ?>&deg;C
                </div>
                <div class="d-flex justify-content-around mb-4 ">
                    <div><i class="fas fa-tint fa-lg pr-2 customIconWeather" ></i>Humidade: <?php echo $data->main->humidity; ?> %</div>
                    <div><i class="fas fa-wind fa-lg pr-2 customIconWeather" ></i>Vento: <?php echo $data->wind->speed; ?> km/h</div>
                </div>
            </div>
        </div>
    </div>
<?php if ($_SESSION['role'] != 2) : ?>
    <div style="margin:auto; width:10%; height:150px" >
        <div class="idAddDemoPostit" ></div>
    </div>
<?php endif; ?>
    <?php if ($_SESSION['role'] == 2) : ?>
        <!-- Content Row -->
        <div class="row justify-content-center">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4 animate__animated animate__fadeInDown animate__delay-1s">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1 indexBox">
                                    Ganhos (Diários)</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800 indexBox2">€ <?php echo $dailyEarning['sum'] ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-euro-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4 animate__animated animate__fadeInDown animate__delay-1s">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1 indexBox">
                                Ganhos (Mensais)</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800 indexBox2">€ <?php echo $monthEarning['sum'] ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar  fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4 animate__animated animate__fadeInDown animate__delay-1s">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1 indexBox">
                                    Cursos Vendidos</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800 indexBox2 "><?php echo $totalCourses['count']?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-graduation-cap fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
<?php endif; ?>

<?php require_once(dirname(__FILE__) . "/templates/common/footer.php"); ?>