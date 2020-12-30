<?php require_once(dirname(__FILE__) . "/templates/common/header.php"); ?>
<?php require_once(dirname(__FILE__) . "/templates/common/navbar.php"); ?>

<?php require_once(dirname(__FILE__) . "/templates/common/title.php"); ?>

<?php

include_once(dirname(__FILE__) . "/dataBase/dataBase.php");
/*Para retirar a visibilidade do erro*/
/*error_reporting(E_ERROR | E_PARSE);*/
$db = DataBase::Instance();
$ordersQuery = "";
$connected = false;
if ($db->connect()) {

    $ordersQuery = $db->getOrdersByUser($_SESSION['user']);
    $connected = true;
    $orders = pg_fetch_assoc($ordersQuery);

} else
    Alerts::showError(Alerts::DATABASEOFF);

?>

<div class="container-fluid">
    <div class="justify-content-center m-4">
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-history"></i>
            Histórico de Compras
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Data de Compra</th>
                        <th>Data de Entrega</th>
                        <th>Curso</th>
                        <th>Preço</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if($connected) :
                        while(isset($orders["productname"])) {
                            echo "<tr>";
                            echo "<td scope=\"row\">". $orders['purchasedate'] ."</td>";
                            echo "<td scope=\"row\">". $orders['deliverydate'] ."</td>";
                            echo "<td>". ucwords($orders['productname']) ."</td>";
                            echo "<td>". $orders['price'] ."€</td>";
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

