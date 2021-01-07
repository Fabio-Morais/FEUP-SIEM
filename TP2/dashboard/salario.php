<?php require_once(dirname(__FILE__) . "/templates/common/header.php"); ?>
<?php require_once(dirname(__FILE__) . "/templates/common/navbar.php"); ?>
<?php require_once(dirname(__FILE__) . "/templates/common/title.php"); ?>

<?php require_once(dirname(__FILE__) . "/includes/common/alerts.php"); ?>
<?php include_once(dirname(__FILE__) . "/dataBase/dataBase.php");
/*Para retirar a visibilidade do erro*/
/*error_reporting(E_ERROR | E_PARSE);*/
$db = DataBase::Instance();
$salaryQuery = "";
$connected = false;

if ($db->connect()) {
    $salaryQuery = $db->getSalary($_SESSION['user']);
    $salaryQuery2 = $db->getSalary($_SESSION['user']);
    $connected = true;
    $salary = pg_fetch_assoc($salaryQuery);
    $row = pg_fetch_assoc($salaryQuery2);
} else
    Alerts::showError(Alerts::DATABASEOFF);


$data = array();
$label = array();
if ($connected) :
    while (isset($row["username"])) {
        array_push($label, $row['salarydate']);
        array_push($data, $row['salary']);
        $row = pg_fetch_assoc($salaryQuery2);
    }
endif;
?>

endif;
<div class="container-fluid">
    <div class="justify-content-center m-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <select id="outer" class="custom-select m-2">
                    <option value="option1" >Gráfico</option>
                    <option value="option2" >Tabela</option>
                </select>

                <div class="card-header option1">
                    <i class="fas fa-chart-area mr-1"></i>
                    Gráfico Salário recebido
                </div>
                <div class="card-body option1"><canvas id="myAreaChart" width="100%" height="30"></canvas></div>
                <div class="card-footer small text-muted option1">Atualizado a <?php echo date("d-m-Y - H:i:s")?></div>

                <div class="card-header option2">
                    <i class="fas fa-table"></i>
                    Tabela Salário recebido
                </div>
                <div class=" card-body table-responsive option2 ">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Data</th>
                            <th>Salário (€)</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if($connected) :
                            while(isset($salary["salary"])) {
                                $newdate = date("d-M-Y", strtotime($salary['salarydate']));
                                $mydate = strtotime($salary['salarydate']);
                                echo "<tr>";
                                echo "<td scope=\"row\" data-sort=".$mydate." >".$newdate."</td>";
                                echo "<td>" . $salary["salary"] . "</td>";
                                echo "</tr>";
                                $salary = pg_fetch_assoc($salaryQuery);
                            }
                        endif;
                        ?>
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>

</div>





<?php require_once(dirname(__FILE__) . "/templates/common/footer.php"); ?>

<script type="module">

    import ChartBuild from './public/js/chart.js';
    function aaa() {
        var option = $("option:selected").val();
        if ( option=== "option1") {
            var data = <?php echo json_encode($data)?>;
            var label = <?php echo json_encode($label)?>;
            let chart = new ChartBuild(0, "myAreaChart", data, "salário", label);
            chart.labelTextAxis("Data", "Lucro (€)");
            chart.execute()
        }
    }
    $(document).ready(function () {
        aaa();
        $(".option2").hide();
        $('.option1').show();
        $('#outer').change(function () {
            $('.option2').hide();
            $('.option1').hide();
            $('.'+$(this).val()).show();
            aaa();
        })
    });

</script>

