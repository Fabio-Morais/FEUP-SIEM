</main>

<footer class="py-4 bg-light mt-auto">
    <div class="container-fluid">
        <div class="align-items-center justify-content-between small" style="justify-content: center">
            <div class="text-muted text-center">Copyright &copy; Fábio Morais e Fernando Silva 2020</div>
            <div class="text-center" style="margin-top: 5px"><button type="button" class="butnDownloads" data-toggle="modal" data-target="#myModal">
                    Downloads
            </button></div>
        </div>
    </div>
</footer>
</div>
</div>

<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header" id="modalDownloads" style="display: block">
                <h4>Downloads</h4>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="d-flex flex-wrap justify-content-around">
                    <div style="width:550px">
                        <div class="d-flex flex-column" style="border-right: solid #DEE2E6">
                            <!-- 1 imagem-->
                            <div class="d-flex m-2 flex-wrap justify-content-start">
                                <div style="width:180px">
                                    <img src="../img/fabio.jpeg" id="photoInit">
                                </div>
                                <div class="ml-4 my-auto" style="width:280px">
                                    <p id="initialText"><b>Nome: </b>Fábio Morais</p>
                                    <p id="initialText"><b>Email: </b>up201504257@fe.up.pt</p>
                                    <div class="ml my-auto" style="width:280px; text-align: center;">
                                        <a href="https://www.linkedin.com/in/fabi0morais/" target="_blank" id="social2" class="fab fa-linkedin"></a>
                                        <a href="https://github.com/Fabio-Morais" target="_blank" id="social2" class="fab fa-github"></a>
                                    </div>
                                </div>
                            </div>

                            <!-- 2 imagem-->
                            <div class="d-flex m-2 flex-wrap justify-content-start">
                                <div style="width:180px">
                                    <img src="../img/fernando.jpg" id="photoInit">
                                </div>
                                <div class="ml-4 my-auto" style="width:280px">
                                    <p id="initialText"><b>Nome: </b>Fernando Silva</p>
                                    <p id="initialText"><b>Email: </b>up201604125@fe.up.pt</p>
                                    <div class="ml my-auto" style="width:280px; text-align: center;">
                                        <a href="https://www.linkedin.com/in/fernando-silva-778628161/" id="social2" class="fab fa-linkedin"></a>
                                        <a href="https://github.com/fernandojpsilva" id="social2" class="fab fa-github"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="modalText" class="my-auto" style="width:540px">
                        <h5>Obrigado pela visita!</h5>
                        <p>Trabalho realizado no âmbito da unidade curricular <b>Sistemas de Informação Empresariais</b>,
                            pertencente ao plano de estudos do MIEEC da FEUP.</p>
                        <p><b>Professor José Faria</b></p>
                        <p><b>Professor Armindo Carvalho</b></p>
                        <br>
                        <p>Website otimizado e testado para resoluções até 1920 x 1080. Testado para mobile.</p>
                        <p><b>Browser preferencial: </b> Chrome</p>
                    </div>
                </div>
                <div>
                    <div class="flex-wrap flex-center justify-content-center">
                        <div id="downloadButton"><a href="Mockup_TP2.ppt" download><button class="button buttonRed"
                                                                                              href="add-website-here" target="_blank">
                                    <div class="flex-column"><i class="far fa-file-powerpoint"></i> <br>Download ppt</div>
                                </button></a></div>
                        <div id="downloadButton"><a href="ExplicaFeup_TP2.zip" download><button class="button buttonRed"
                                                                                        href="add-website-here" target="_blank">
                                    <div class="flex-column"><i class="far fa-file-code"></i> <br>Download Website</div>
                                </button></a></div>
                        <div id="downloadButton"><a href="ExplicaFeup_css.zip" download><button class="button buttonRed"
                                                                                    href="add-website-here" target="_blank">
                                    <div class="flex-column"><i class="fab fa-css3-alt"></i> <br>Download CSS</div>
                                </button></a></div>
                    </div>
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>

        </div>
    </div>
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
<script src="public/js/cookie.js"></script>
<script src="public/js/forms/validateForms.js"></script>
<script src="includes/libs/nif-pt.js"></script>
<script src="public/js/ajax.js"></script>
<script src="public/js/chart.js"></script>
<script src="public/js/chartDraw.js"></script>

<!--Get the title of the page-->
<?php $title = basename($_SERVER['SCRIPT_NAME']);  ?>

<?php if ($title == "users.php" || $title == "alunos.php" || $title == "comprar_curso.php") :?>
    <script src="public/js/pagination.js"></script>
    <script src="public/js/filters.js"></script>
<?php endif;?>

<?php if ($title == "perfil.php" ) :?>
    <script src="public/js/forms/validatePassword.js"></script>
    <script src="includes/libs/jscolor.js"></script>

<?php endif;?>


<?php if ($title == "comprar_curso.php" ) :?>
    <script src="public/js/cart/util.js"></script>
    <script src="public/js/cart/main.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script><!-- effect-->
    <script src="public/js/cart/flyto.js"></script><!-- effect-->
<?php endif;?>

<?php if ($title == "index.php" ) :?>
    <script src="includes/libs/postIt/jquery.postitall.js"></script>
    <script src="public/js/postIt.js"></script>
<?php endif;?>

<?php if ($title == "chat.php" ) :?>
    <script src="public/js/chat.js"></script>
    <script src="public/js/ajax.js"></script>
    <script src="public/js/filters.js"></script>
<?php endif;?>

</body>

</html>