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
                    <aside class="col-xl-3 ">
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
                                                <input type="text" class="form-control" placeholder="Search" id="myInput" name="search">
                                                <div class="input-group-append">
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

                        <div class="d-flex flex-wrap justify-content-start items">
                            <?php
                            if ($connected) :
                                $row = pg_fetch_assoc($courses);
                                while (isset($row["coursename"])) {
                                    echo "<div class=\"p-2 content\" style=\"width:250px\">";
                                    echo "<figure class=\"card card-product-grid contentSearch\">";
                                    echo "  <div class=\"img-wrap\">";
                                    echo "      <span class=\"badge badge-danger\"> Promo </span>";
                                    echo "      <img src=\"public/img/courses/" . $row["image"] . "\">";
                                    echo "      <a class=\"btn-overlay\" href=\"#\"><i class=\"fa fa-search-plus\"></i> Info</a>";
                                    echo "  </div> ";
                                    echo "  <figcaption class=\"info-wrap\"> ";
                                    echo "      <div class=\"fix-height\"> ";
                                    echo "          <a href=\"#\" class=\"title text-capitalize\">" . $row["coursename"] . "</a> ";
                                    echo "          <div class=\"price-wrap mt-2\"> ";
                                    echo "              <span class=\"price\">" . $row["price"] ."€</span> ";
                                    echo "              <del class=\"price-old\">" . (intval($row["price"]) + 5) . "€</del> ";
                                    echo "          </div> ";
                                    echo "      </div> ";
                                    echo "      <a  class=\"btn btn-block btn-primary js-cd-add-to-cart my-btn\"  data-price=\"".$row["price"]."\">Adicionar ao carrinho</a> ";
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

<div class="cd-cart js-cd-cart ">
	<a href="#0" class="cd-cart__trigger text-replace">
		<ul class="cd-cart__count"> <!-- cart items count -->
			<li>0</li>
			<li>0</li>
		</ul> <!-- .cd-cart__count -->
	</a>

	<div class="cd-cart__content ">
		<div class="cd-cart__layout ">
			<header class="cd-cart__header ">
				<h2>Cart</h2>
				<span class="cd-cart__undo">Item removed. <a href="#0">Undo</a></span>
			</header>

			<div class="cd-cart__body ">
                <form action="carrinho.php" id="carrinho" method="POST">
				<ul id="cartElements">
					<!-- products added to the cart will be inserted here using JavaScript -->
				</ul>
                </form>
			</div>

			<footer class="cd-cart__footer">
				<a type="button" class="cd-cart__checkout" id="submitButton">
          <em>Checkout : <span>0</span>€
            <svg class="icon2 icon--sm" viewBox="0 0 24 24"><g fill="none" stroke="currentColor"><line stroke-width="2" stroke-linecap="round" stroke-linejoin="round" x1="3" y1="12" x2="21" y2="12"/><polyline stroke-width="2" stroke-linecap="round" stroke-linejoin="round" points="15,6 21,12 15,18 "/></g>
            </svg>
          </em>
        </a>
			</footer>
		</div>
	</div> <!-- .cd-cart__content -->

</div> <!-- cd-cart -->


<?php require_once(dirname(__FILE__) . "/templates/common/footer.php"); ?>

	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
	<script src="public/js/cart/flyto.js"></script>
    <script>
        $('.items').flyto({
            item      : '.card-product-grid',
            target    : '.cd-cart__header',
            button    : '.my-btn'
        });
        document.getElementById("submitButton").onclick = function () {
            document.getElementById("carrinho").submit();
        }
    </script>
	<!--/ js -->