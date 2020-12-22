<?php require_once(dirname(__FILE__) . "/templates/common/header.php"); ?>
<?php require_once(dirname(__FILE__) . "/templates/common/navbar.php"); ?>

<?php require_once(dirname(__FILE__) . "/templates/common/title.php"); ?>

<?php require_once(dirname(__FILE__) . "/includes/common/alerts.php");
?>

<?php include_once(dirname(__FILE__) . "/dataBase/dataBase.php");
/*Para retirar a visibilidade do erro*/
/*error_reporting(E_ERROR | E_PARSE);*/
$db = DataBase::Instance();
$users = "";
$connected = false;

if ($db->connect()) {
    $courses = $db->getAllCoursesExceptStudentOwn($aux['username']);
    $connected = true;
} else
    Alerts::showError(Alerts::DATABASEOFF);
?>
<div class="container-fluid">
    <div class="justify-content-center m-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">

                <div class="row">
                    <aside class="col-md-3">
                        <div class="card">
                            <article class="filter-group">
                                <header class="card-header">
                                    <a href="#" data-toggle="collapse" data-target="#collapse_1" aria-expanded="true" class="">
                                        <i class="icon-control fa fa-chevron-down"></i>
                                        <h6 class="title">Categoria</h6>
                                    </a>
                                </header>
                                <div class="filter-content collapse show" id="collapse_1" style="">
                                    <div class="card-body">
                                        <form class="pb-3">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Search">
                                                <div class="input-group-append">
                                                    <button class="btn btn-light" type="button"><i class="fa fa-search"></i></button>
                                                </div>
                                            </div>
                                        </form>

                                        <ul class="list-menu">
                                            <li><a href="#">Software </a></li>
                                            <li><a href="#">Machine Learning </a></li>
                                            <li><a href="#">Web Development </a></li>
                                        </ul>

                                    </div> <!-- card-body.// -->
                                </div>
                            </article> <!-- filter-group  .// -->

                            <article class="filter-group">
                                <header class="card-header">
                                    <a href="#" data-toggle="collapse" data-target="#collapse_3" aria-expanded="true" class="">
                                        <i class="icon-control fa fa-chevron-down"></i>
                                        <h6 class="title">Preço </h6>
                                    </a>
                                </header>
                                <div class="filter-content collapse show" id="collapse_3" style="">
                                    <div class="card-body">
                                        <input type="range" class="custom-range" min="0" max="100" name="">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Min</label>
                                                <input class="form-control" placeholder="0€" type="number">
                                            </div>
                                            <div class="form-group text-right col-md-6">
                                                <label>Max</label>
                                                <input class="form-control" placeholder="50€" type="number">
                                            </div>
                                        </div> <!-- form-row.// -->
                                        <button class="btn btn-block btn-primary">Aplicar</button>
                                    </div><!-- card-body.// -->
                                </div>
                            </article> <!-- filter-group .// -->

                        </div> <!-- card.// -->

                    </aside> <!-- col.// -->
                    <main class="col-md-9">

                        <header class="border-bottom mb-4 pb-3">
                            <div class="form-inline">
                                <span class="mr-md-auto"><?php echo pg_num_rows($courses) ?> Cursos encontrados </span>
                                <select class="mr-2 form-control">
                                    <option>Latest items</option>
                                    <option>Trending</option>
                                    <option>Most Popular</option>
                                    <option>Cheapest</option>
                                </select>
                                <div class="btn-group">
                                    <a href="#" class="btn btn-outline-secondary" data-toggle="tooltip" title="List view">
                                        <i class="fa fa-bars"></i></a>
                                    <a href="#" class="btn  btn-outline-secondary active" data-toggle="tooltip" title="Grid view">
                                        <i class="fa fa-th"></i></a>
                                </div>
                            </div>
                        </header><!-- sect-heading -->

                        <div class="row">
                            <?php
                            if ($connected) :
                                $row = pg_fetch_assoc($courses);
                                while (isset($row["coursename"])) {
                                    echo "<div class=\"col-md-4\">";
                                    echo "<figure class=\"card card-product-grid\">";
                                    echo "  <div class=\"img-wrap\">";
                                    echo "      <span class=\"badge badge-danger\"> Promo </span>";
                                    echo "      <img src=\"public/img/courses/" . $row["image"] . "\">";
                                    echo "      <a class=\"btn-overlay\" href=\"#\"><i class=\"fa fa-search-plus\"></i> Info</a>";
                                    echo "  </div> ";
                                    echo "  <figcaption class=\"info-wrap\"> ";
                                    echo "      <div class=\"fix-height\"> ";
                                    echo "          <a href=\"#\" class=\"title\">" . $row["coursename"] . "</a> ";
                                    echo "          <div class=\"price-wrap mt-2\"> ";
                                    echo "              <span class=\"price\">" . $row["price"] ."€</span> ";
                                    echo "              <del class=\"price-old\">" . (intval($row["price"]) + 5) . "€</del> ";
                                    echo "          </div> ";
                                    echo "      </div> ";
                                    echo "      <a href=\"#\" class=\"btn btn-block btn-primary\">Adicionar ao carrinho</a> ";
                                    echo "  </figcaption> ";
                                    echo " </figure> ";
                                    echo "</div>";
                                    $row = pg_fetch_assoc($courses);
                                }
                            endif;
                            ?>
                        </div> <!-- row end.// -->


                    </main> <!-- col.// -->

                </div>




            </div>
        </div>
    </div>


</div>




<?php require_once(dirname(__FILE__) . "/templates/common/footer.php"); ?>

