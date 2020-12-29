<?php require_once(dirname(__FILE__) . "/templates/common/header.php"); ?>
<?php require_once(dirname(__FILE__) . "/templates/common/navbar.php"); ?>
<?php require_once(dirname(__FILE__) . "/templates/common/title.php"); ?>

<?php require_once(dirname(__FILE__) . "/includes/common/alerts.php"); ?>
<?php include_once(dirname(__FILE__) . "/dataBase/dataBase.php");
/*Para retirar a visibilidade do erro*/
/*error_reporting(E_ERROR | E_PARSE);*/
$db = DataBase::Instance();
$salary = "";
$connected = false;

if ($db->connect()) {
    $salary = $db->getSalary($_SESSION['user']);/*Mudar o username para o que vem da session*/
    $connected = true;
} else
    Alerts::showError(Alerts::DATABASEOFF);

?>

<div class="container-fluid">
    <div class="justify-content-center m-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <select id="outer" class="custom-select m-2">
                    <option value="option1" onclick="aux()">Gráfico</option>
                    <option value="option2" >Tabela</option>
                </select>
                <div class="card-header option2">
                    <i class="fas fa-table"></i>
                    Tabela Salário recebido
                </div>
                <div class=" card-body table-responsive option2 ">

                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Data</th>
                                <th>Salario (€)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $data = array();
                            $label = array();
                            if ($connected) :

                                $row = pg_fetch_assoc($salary);
                                while (isset($row["username"])) {
                                    array_push($label, $row['salarydate']);
                                    array_push($data, $row['salary']);
                                    echo "<tr>";
                                    echo "<td>" . $row['salarydate'] . "</td>";
                                    echo "<td>" . $row['salary'] . "</td>";
                                    echo "</tr>";
                                    $row = pg_fetch_assoc($salary);
                                }
                            endif;

                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="card-header option1">
                    <i class="fas fa-chart-area mr-1"></i>
                    Gráfico Salário recebido
                </div>
                <div class="card-body option1"><canvas id="myAreaChart" width="100%" height="30"></canvas></div>

            </div>
        </div>
    </div>

</div>





<?php require_once(dirname(__FILE__) . "/templates/common/footer.php"); ?>
<script>
    $(document).ready(function () {
        $(".option2").hide();
        $('.option1').show();
        $('#outer').change(function () {
            $('.option2').hide();
            $('.option1').hide();
            $('.'+$(this).val()).show();
        })
    });

</script>
<script type="module">

        import ChartBuild from './public/js/chart.js';
        var data = <?php echo json_encode($data)?>;
        var label = <?php echo json_encode($label)?>;
            let chart = new ChartBuild(0,"myAreaChart",data,"salário",label);
            chart.labelTextAxis(0, "Data", "Lucro (€)");
            chart.execute()



</script>

