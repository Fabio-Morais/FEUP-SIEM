<?php require_once(dirname(__FILE__) . "/templates/common/header.php"); ?>
<?php require_once(dirname(__FILE__) . "/templates/common/navbar.php"); ?>

<?php require_once(dirname(__FILE__) . "/templates/common/title.php"); ?>

<?php require_once(dirname(__FILE__) . "/includes/common/alerts.php"); ?>
<?php include_once(dirname(__FILE__) . "/dataBase/dataBase.php");
/*Para retirar a visibilidade do erro*/
/*error_reporting(E_ERROR | E_PARSE);*/
$db = DataBase::Instance();
$yearQuery = "";
$connected = false;

if ($db->connect()) {
    $yearQuery = $db->getTotalYearProfit();/*Mudar o username para o que vem da session*/
    $connected = true;
} else
    Alerts::showError(Alerts::DATABASEOFF);

?>

<div class="container-fluid">
    <div class="justify-content-center m-4">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-chart-area mr-1"></i>
                Lucro Total
            </div>
            <div class="card-body"><canvas id="myAreaChart" width="100%" height="30"></canvas></div>
            <div class="card-footer small text-muted">Atualizado a <?php
;echo date("d-m-Y - H:i:s")?></div>

            <?php
            $data = array();
            $label = array();
            if ($connected) :
                $year = pg_fetch_assoc($yearQuery);
                while (isset($year["date"])) {

                    array_push($label, $year['date']);
                    array_push($data, $year['price']);
                    $year = pg_fetch_assoc($yearQuery);
                }
            endif;
            ?>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-chart-area mr-1"></i>
                Lucro Total
            </div>
            <div class="card-body"><canvas id="myPieChart" width="100%" height="30"></canvas></div>

        </div>
    </div>

</div>

<?php require_once(dirname(__FILE__) . "/templates/common/footer.php"); ?>
<!--Incluir os graficos para gerar-->
<script type="module">
    import ChartBuild from '/public/js/chart.js';
    var data = <?php echo json_encode($data) ?>;
    var label = <?php echo json_encode($label) ?>;
    let chart = new ChartBuild(0,"myAreaChart",data,"Lucro", label);
    chart.labelTextAxis( "Data", "Lucro (€)");
    chart.execute();
    data=[2,3];
    label=['red','blue'];
    let chart2 = new ChartBuild(1,"myPieChart",data,"Lucro", label);
    chart2.execute();

</script>