</main>
<footer class="py-4 bg-light mt-auto">
    <div class="container-fluid">
        <div class="align-items-center justify-content-between small">
            <div class="text-muted text-center">Copyright &copy; Fábio Morais e Fernando Silva 2020</div>
        </div>
    </div>
</footer>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script><!--pode ser aqui-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<script src="public/js/main.js"></script>
<script src="public/js/table.js"></script>
<script src="public/js/scripts.js"></script>
<script src="public/js/validateForms.js"></script>
<script src="includes/libs/nif-pt.js"></script>

<!--Get the title of the page-->
<?php $title = basename($_SERVER['SCRIPT_NAME']);  ?>

<?php if ($title == "users.php" || $title == "alunos.php" || $title == "comprar_curso.php") :?>
    <script src="public/js/users.js"></script>
    <script src="public/js/ajax.js"></script>
    <script src="public/js/filters.js"></script>

<?php endif;?>

<?php if ($title == "perfil.php" ) :?>
    <script src="public/js/validatePassword.js"></script>
<?php endif;?>


<?php if ($title == "comprar_curso.php" ) :?>
    <script src="public/js/cart/util.js"></script>
    <script src="public/js/cart/main.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


<?php endif;?>
</body>

</html>