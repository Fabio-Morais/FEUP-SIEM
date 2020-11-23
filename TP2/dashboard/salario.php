<?php require_once(dirname(__FILE__) . "/templates/common/header.php"); ?>
<?php require_once(dirname(__FILE__) . "/templates/common/navbar.php"); ?>

<?php require_once(dirname(__FILE__) . "/templates/common/title.php"); ?>

<?php include_once(dirname(__FILE__) . "/dataBase/dataBase.php");
/*Para retirar a visibilidade do erro*/
/*error_reporting(E_ERROR | E_PARSE);*/
$db = DataBase::Instance();
$salary = "";
$connected = false;

if ($db->connect()) {
    $salary = $db->getSalary("fabiouds");/*Mudar o username para o que vem da session*/
    $connected = true;
} else
    Alerts::showError(Alerts::DATABASEOFF);

?>

    <div class="container-fluid">
        <div class="justify-content-center m-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <select id="outer">
                        <option value="option1">Tabela</option>
                        <option value="option2">Gráfico</option>
                    </select>

                    <div  class="table-responsive option1">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Data</th>
                                <th>Salario (€)</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $data= array();
                            $label= array();
                            if ($connected) :

                                $row = pg_fetch_assoc($salary);
                                while (isset($row["username"])) {
                                    array_push($label, $row['salarydate']);
                                    array_push($data, $row['salary']);
                                echo "<tr>";
                                echo "<td>".$row['salarydate']."</td>";
                                echo "<td>".$row['salary']."</td>";
                                echo "</tr>";
                                $row = pg_fetch_assoc($salary);
                                }
                            endif;

                            ?>

<tr>
                                <td>Tiger Nixon</td>
                                <td>System Architect</td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                    <div class="card-header option2">
                        <i class="fas fa-chart-area mr-1"></i>
                        Area Chart Example
                    </div>
                    <div class="card-body option2"><canvas id="myAreaChart" width="100%" height="30"></canvas></div>

                </div>
            </div>
        </div>

    </div>





<?php require_once(dirname(__FILE__) . "/templates/common/footer.php");?>
<?php  require_once(dirname(__FILE__) . "/includes/charts.php"); execute($data, $label);?>

