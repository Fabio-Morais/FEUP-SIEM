<?php require_once(dirname(__FILE__) . "/templates/common/header.php"); ?>
<?php require_once(dirname(__FILE__) . "/templates/common/navbar.php"); ?>

<?php require_once(dirname(__FILE__) . "/templates/common/title.php"); ?>

<?php require_once(dirname(__FILE__) . "/includes/common/alerts.php"); ?>
<?php include_once(dirname(__FILE__) . "/dataBase/dataBase.php");
/*Para retirar a visibilidade do erro*/
/*error_reporting(E_ERROR | E_PARSE);*/
$db = DataBase::Instance();
$ordersQuery="";
$connected = false;

if ($db->connect()) {
    $ordersQuery = $db->getAllOrders();
    $connected = true;
} else
    Alerts::showError(Alerts::DATABASEOFF);
?>

<div class="container-fluid">
    <div class="justify-content-center m-4">
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-history"></i>
            Histórico de Vendas
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Data de Compra</th>
                        <th>Data de Entrega</th>
                        <th>Curso</th>
                        <th>Preço</th>
                        <th>Estudante</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if($connected) :
                        $orders = pg_fetch_assoc($ordersQuery);
                        while(isset($orders["number"])) {
                            echo "<tr>";
                            echo "<td scope=\"row\">". $orders['purchasedate'] ."</td>";
                            echo "<td scope=\"row\">". $orders['deliverydate'] ."</td>";
                            echo "<td>". ucwords($orders['productname']) ."</td>";
                            echo "<td>". $orders['price'] ."€</td>";
                            echo "<td>". $orders['idstudent'] ."</td>";
                            echo "</tr>";
                            $orders = pg_fetch_assoc($ordersQuery);
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

</div>
<?php require_once(dirname(__FILE__) . "/templates/common/footer.php"); ?>
