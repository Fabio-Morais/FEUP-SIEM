<?php require_once(dirname(__FILE__) . "/templates/common/header.php"); ?>
<?php require_once(dirname(__FILE__) . "/templates/common/navbar.php"); ?>

<?php require_once(dirname(__FILE__) . "/templates/common/title.php"); ?>

    <div class="container-fluid">
        <div class="justify-content-center m-4">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-area mr-1"></i>
                    Area Chart Example
                </div>
                <div class="card-body"><canvas id="myAreaChart" width="100%" height="30"></canvas></div>
            </div>
        </div>

    </div>

<?php require_once(dirname(__FILE__) . "/templates/common/footer.php"); ?>
<!--Incluir os graficos para gerar-->
<?php require_once(dirname(__FILE__) . "/includes/charts.php"); ?>

