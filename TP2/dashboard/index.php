<?php

/**
 * Cria uma objeto da classe Weather, que vai buscar à API a informação do tempo relativo à cidade em que o utilizador se encontra, relativamente ao IP
 */
require_once(dirname(__FILE__) . "/includes/common/weather.php");
$weather = new Weather();
$data = $weather->get_data();
$currentTime = $weather->get_time();
?>


<?php require_once(dirname(__FILE__) . "/templates/common/header.php"); ?>
<?php require_once(dirname(__FILE__) . "/templates/common/navbar.php"); ?>



<div class="container-fluid">
    <h1 class="m-4 text-center">BEM VINDO <?php echo strtoupper($username) ?></h1>
    <div class="justify-content-center m-4" >
        <div class="card border-left-primary shadow " id="weatherCard" >
            <div class="report-container">
                <h2><?php echo $data->name; ?></h2>
                <div class="time">
                    <div><?php echo $currentTime; ?></div>
                    <div class="font-weight-bold"><?php echo ucwords($data->weather[0]->description); ?></div>
                </div>
                <div class="weather-forecast">
                    <img src="http://openweathermap.org/img/w/<?php echo $data->weather[0]->icon; ?>.png" class="weather-icon" /> <?php echo $data->main->temp; ?>&deg;C
                </div>
                <div class="d-flex justify-content-around mb-4 ">
                    <div><i class="fas fa-tint fa-lg text-info pr-2" style="font-size:30px"></i>Humidade: <?php echo $data->main->humidity; ?> %</div>
                    <div><i class="fas fa-wind fa-lg text-muted pr-2" style="font-size:30px"></i>Vento: <?php echo $data->wind->speed; ?> km/h</div>
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

<?php require_once(dirname(__FILE__) . "/templates/common/footer.php"); ?>