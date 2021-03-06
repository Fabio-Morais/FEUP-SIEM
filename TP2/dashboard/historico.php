<?php require_once(dirname(__FILE__) . "/templates/common/header.php"); ?>
<?php require_once(dirname(__FILE__) . "/templates/common/navbar.php"); ?>
<?php require_once(dirname(__FILE__) . "/templates/common/title.php"); ?>

<?php
$db = DataBase::Instance();
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
                        while(isset($orders["number"])) {
                            $newdate_purchase = date("d-M-Y H:i:s", strtotime($orders['purchasedate']));
                            $mydate_purchase = strtotime($orders['purchasedate']);
                            $newdate_delivery = date("d-M-Y H:i:s", strtotime($orders['deliverydate']));
                            $mydate_delivery = strtotime($orders['deliverydate']);
                            echo "<tr>";
                            echo "<td scope=\"row\" data-sort=".$mydate_purchase." >".$newdate_purchase."</td>";
                            echo "<td scope=\"row\" data-sort=".$mydate_delivery." >".$newdate_delivery."</td>";
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

<?php require_once(dirname(__FILE__) . "/templates/common/footer.php"); ?>

