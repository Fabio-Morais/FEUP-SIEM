<?php require_once(dirname(__FILE__) . "/templates/common/header.php"); ?>
<?php require_once(dirname(__FILE__) . "/templates/common/navbar.php"); ?>

<?php require_once(dirname(__FILE__) . "/templates/common/title.php"); ?>

<?php require_once(dirname(__FILE__) . "/includes/common/alerts.php"); ?>
<?php include_once(dirname(__FILE__) . "/dataBase/dataBase.php");
/*Para retirar a visibilidade do erro*/
/*error_reporting(E_ERROR | E_PARSE);*/
$db = DataBase::Instance();
$yearQuery = "";
$courseQuery="";
$connected = false;

if ($db->connect()) {
    $yearQuery = $db->getTotalYearProfit();
    $courseQuery = $db->getSellsCourses();
    $courseTotalQuery = $db->getSellsCoursesMoney();
    $ordersQuery = $db->getAllOrders();
    $connected = true;
} else
    Alerts::showError(Alerts::DATABASEOFF);

?>

<div class="container-fluid">
    <div class="justify-content-center m-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <select id="outer" class="custom-select m-2">
                    <option value="option1">Lucro total</option>
                    <option value="option2">Número de vendas por curso</option>
                    <option value="option3">Lucro de vendas por curso</option>
                </select>

                    <div class="card-header option1">
                        <i class="fas fa-chart-area mr-1"></i>
                        Lucro total
                    </div>

                    <div class="card-body option1"><canvas id="myAreaChart" width="100%" height="30"></canvas></div>
                    <div class="card-footer small text-muted option1">Atualizado a <?php echo date("d-m-Y - H:i:s")?></div>

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
                    <!--Numero de cursos comprados, ORDER BY COURSE-->
                    <?php
                    $dataPie = array();
                    $labelPie = array();
                    if ($connected) :
                        $course = pg_fetch_assoc($courseQuery);
                        while (isset($course["count"])) {
                            array_push($labelPie, $course['productname']);
                            array_push($dataPie, $course['count']);
                            $course = pg_fetch_assoc($courseQuery);
                        }
                    endif;
                    ?>
                    <!--Preço total de cursos comprados, ORDER BY COURSE-->
                    <?php
                    $dataBar = array();
                    $labelBar = array();
                    if ($connected) :
                        $courseTotal = pg_fetch_assoc($courseTotalQuery);
                        while (isset($courseTotal["sum"])) {
                            array_push($labelBar, $courseTotal['productname']);
                            array_push($dataBar, $courseTotal['sum']);
                            $courseTotal = pg_fetch_assoc($courseTotalQuery);
                        }
                    endif;
                    ?>

            <div class="card-header option2">
                <i class="fas fa-chart-pie mr-1"></i>
                Número de vendas por curso
            </div>
            <div class="card-body option2"><canvas id="myPieChart" width="100%" height="30"></canvas></div>
            <div class="card-footer small text-muted option2">Atualizado a <?php echo date("d-m-Y - H:i:s")?></div>


            <div class="card-header option3">
                <i class="fas fa-chart-bar mr-1"></i>
                Lucro de vendas por curso
            </div>
            <div class="card-body option3"><canvas id="myBarChart" width="100%" height="30"></canvas></div>
            <div class="card-footer small text-muted option3">Atualizado a <?php echo date("d-m-Y - H:i:s")?></div>
            </div>

        </div>
    </div>

</div>

<?php require_once(dirname(__FILE__) . "/templates/common/footer.php"); ?>
<!--Incluir os graficos para gerar-->

<script type="module">
    import ChartBuild from './public/js/chart.js';
    function aaa(){
        var option = $("option:selected").val();
        if ( option=== "option1") {
            var data = <?php echo json_encode($data) ?>;
            var label = <?php echo json_encode($label) ?>;
            console.log(data)
            let chart = new ChartBuild(0, "myAreaChart", data, "Lucro", label);
            chart.labelTextAxis("Data", "Lucro (€)");
            chart.execute();

        } else if (option === "option2") {
            var data = <?php echo json_encode($dataPie) ?>;
            var label = <?php echo json_encode($labelPie) ?>;
            let chart2 = new ChartBuild(1, "myPieChart", data, "Lucro", label);
            chart2.execute();

        } else if (option === "option3") {
            var data = <?php echo json_encode($dataBar) ?>;
            var label = <?php echo json_encode($labelBar) ?>;
            let chart3 = new ChartBuild(2, "myBarChart", data, "Lucro", label);
            chart3.labelTextAxis("Curso", "Lucro (€)")
            chart3.execute();
        }

    }


    $(document).ready(function () {
        aaa();
        $(".option3").hide();
        $(".option2").hide();
        $('.option1').show();
        $('#outer').change(function () {
            $(".option3").hide();
            $('.option2').hide();
            $('.option1').hide();
            $('.'+$(this).val()).show();
            aaa();
        })
    });

</script>
