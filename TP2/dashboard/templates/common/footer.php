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

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="public/js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<script src="assets/demo/datatables-demo.js"></script>
<script src="public/js/main.js"></script>

<?php $title = basename($_SERVER['SCRIPT_NAME']);  ?>

<?php if ($title == "users.php" || $title == "alunos.php") :?>
<script src="public/js/users.js"></script>
<?php endif;?>


</body>

</html>