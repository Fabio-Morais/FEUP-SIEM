<?php require_once(dirname(__FILE__) . "/templates/common/header.php"); ?>
<?php require_once(dirname(__FILE__) . "/templates/common/navbar.php"); ?>
<?php require_once(dirname(__FILE__) . "/templates/common/title.php"); ?>


<div class="container-fluid">
    <div class="justify-content-center m-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="d-flex flex-wrap" style="float:right;height:100%">
                    <h6 style="margin:auto">Ano</h6>
                    <select id="outer2" class="custom-select2 m-2">
                        <option value="2021">2021</option>
                        <option value="2020">2020</option>
                    </select>
                    <h6 style="margin:auto" class="ml-3">Tipo de Gráfico</h6>
                    <select id="outer" class="custom-select m-2">
                        <option value="option1">Lucro total</option>
                        <option value="option2">Número de vendas por curso</option>
                        <option value="option3">Lucro de vendas por curso</option>
                    </select>

                </div>

                    <div class="card-header ">
                        <i class="fas fa-chart-area mr-1"></i>
                        Lucro total
                    </div>

                    <div class="card-body  canvasClass"><canvas id="myAreaChart" width="100%" height="30"></canvas></div>
                    <div class="card-footer small text-muted ">Atualizado a <?php echo date("d-m-Y - H:i:s")?></div>


        </div>
    </div>

</div>

<?php require_once(dirname(__FILE__) . "/templates/common/footer.php"); ?>

