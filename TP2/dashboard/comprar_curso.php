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
    $courses = $db->getAllCoursesExceptStudentOwn($_SESSION['user']);
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
                                        <div class="input-group mb-3 mt-1">
                                            <input type="text" class="form-control search" placeholder="Search"  name="search" value="">
                                            <div class="input-group-append">
                                            </div>
                                        </div>
                                        <ul class="list-menu">
                                            <li><a type="button" class="menuCategory text-primary font-weight-bold" onclick="categoryFunction(this)" data-value="all">Todos </a></li>
                                            <li><a type="button" class="menuCategory" onclick="categoryFunction(this)" data-value="soft">Software </a></li>
                                            <li><a type="button" class="menuCategory" onclick="categoryFunction(this)" data-value="ml">Machine Learning </a></li>
                                            <li><a type="button" class="menuCategory" onclick="categoryFunction(this)" data-value="web">Web Development </a></li>
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

                                        <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">

                                        <div id="slider-range"></div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Min</label>
                                                <input class="form-control minPrice" placeholder="0€" type="number" name="minPrice" value="0">
                                            </div>
                                            <div class="form-group text-right col-md-6">
                                                <label>Max</label>
                                                <input class="form-control maxPrice" placeholder="100€" type="number" name="maxPrice" value="100">
                                            </div>
                                        </div> <!-- form-row.// -->
                                    </div><!-- card-body.// -->
                                </div>
                            </article> <!-- filter-group .// -->

                        </div> <!-- card.// -->

                    </aside> <!-- col.// -->
                    <main class="col-md-9">
                        <header class="border-bottom mb-4 pb-3">
                            <div class="form-inline">
                                <span class="mr-md-auto" id="numberCourses"><?php echo pg_num_rows($courses) ?> Cursos encontrados </span>
                                <select class="mr-2 form-control" onchange="selectChange(this)">
                                    <option value="1" >Posição</option>
                                    <option value="2">Ordenar por nome</option>
                                    <option value="3">Ordenar por preço</option>
                                </select>
                                <div class="btn-group">
                                    <a class="btn btn-outline-secondary" onclick="changeSort(this)" id="sortIconAsc">
                                        <i class="fas fa-sort-amount-up" ></i>
                                    </a>
                                    <a class="btn btn-outline-secondary" onclick="changeSort(this)" id="sortIconDesc">
                                        <i class="fas fa-sort-amount-down"> </i>
                                    </a>

                                </div>
                            </div>

                        </header><!-- sect-heading -->

                        <div class="d-flex flex-wrap justify-content-start items">
                            <?php
                            if ($connected) :
                                $row = pg_fetch_assoc($courses);
                                while (isset($row["coursename"])) {
                                    echo "<div class=\"p-2 content all ".$row["type"]." \" style=\"width:250px\" >";
                                    echo "<figure class=\"card card-product-grid contentSearch\">";
                                    echo "  <div class=\"img-wrap\" type=\"button\" class=\"btn-overlay\" data-toggle=\"modal\" data-target=\"#exampleModalLong\" onclick=\"showProductDetail('".$row["coursename"]."', this)\">";
                                    echo "      <span class=\"badge badge-danger\"> Promo </span>";
                                    echo "      <img src=\"public/img/courses/" . $row["image"] . "\">";
                                    echo "      <a type=\"button\" class=\"btn-overlay\" data-toggle=\"modal\" data-target=\"#exampleModalLong\" onclick=\"showProductDetail('".$row["coursename"]."', this)\"><i class=\"fa fa-search-plus\" ></i> Info</a>";
                                    echo "  </div> ";
                                    echo "  <figcaption class=\"info-wrap\"> ";
                                    echo "      <div class=\"fix-height\"> ";
                                    echo "          <a type=\"button\" data-toggle=\"modal\" data-target=\"#exampleModalLong\" onclick=\"showProductDetail('".$row["coursename"]."', this)\" class=\"title text-capitalize \">" . $row["coursename"] . "</a> ";
                                    echo "          <div class=\"price-wrap mt-2\"> ";
                                    echo "              <span class=\"price\">" . $row["price"] ."€</span> ";
                                    echo "              <del class=\"price-old\">" . (intval($row["price"]) + 5) . "€</del> ";
                                    echo "          </div> ";
                                    echo "      </div> ";
                                    echo "      <button  class=\"btn btn-block btn-primary js-cd-add-to-cart my-btn\"  data-price=\"".$row["price"]."\" >Adicionar ao carrinho</button> ";
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

<!-- Product detail-->
<div class="modal fade "  id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog-full-width2 modal-dialog momodel modal-fluid modal-dialog-centered" role="document"  >
        <div class="modal-content-full-width2 modal-content "  >
            <div class="modal-header-full-width   modal-header text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="card">
                    <div class="row no-gutters">
                        <aside class="col-sm-4 border-right">
                            <article class="gallery-wrap">
                                <div class="img-wrap">
                                    <a ><img id="modalImg" src=""></a>
                                </div> <!-- img-big-wrap.// -->

                            </article> <!-- gallery-wrap .end// -->
                        </aside>
                        <main class="col-sm-8">
                            <article class="content-body">
                                <h2 class="title"><!-- COURSE NAME HERE --></h2>
                                <div class="rating-wrap mb-4">
                                    <ul class="rating-stars">
                                        <li style="width:90%" class="stars-active">
                                            <img src="public/img/icons/stars-active.svg" alt="">
                                        </li>
                                        <li>
                                            <img src="public/img/icons/starts-disable.svg" alt="">
                                        </li>
                                    </ul>
                                    <small class="label-rating text-muted">132 reviews</small>
                                </div> <!-- rating-wrap.// -->
                                <ul class="mb-4 list-dots">
                                    <!-- DETAILS HERE -->
                                </ul>
                                <div class="form-group ">
                                    <div class="text-center">
                                        <img src="public/img/certificate.png"  style="width: 20px">
                                        <label class="text-muted mr-4">Curso certificado</label>
                                        <img src="public/img/online.png"  style="width: 20px;">
                                        <label class="text-muted mr-4">Curso 100% online</label>
                                        <img src="public/img/language.png"  style="width: 20px;">
                                        <label class="text-muted mr-4">Português</label>
                                    </div>
                                </div>
                                <div class="h3 mb-4 text-center">
                                    <var class="price h4" id="modalPrice"><!-- PRICE HERE --></var>
                                </div> <!-- price-wrap.// -->



                            </article> <!-- product-info-aside .// -->
                        </main> <!-- col.// -->
                    </div> <!-- row.// -->
                </div> <!-- card.// -->

        </div>
    </div>
</div>


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
        $("#ex2").slider({});
    </script>
	<!--/ js -->
<script>
     function updateModal(response){
         var course = response['coursename'];
         var price = response['price'];
         var details = response['details'];
         var image = response['image'];

         $("h2.title")[0].innerText="Curso de "+course
         $(".content-body > ul")[0].innerHTML=details
         $("#modalPrice")[0].innerText="Preço: "+price +" €"
         $("#modalImg")[0].src="public/img/courses/"+image
         $(".label-rating")[0].innerHTML=(Math.floor(Math.random() * (100 - 70) ) + 70)+" reviews"
         var random= (Math.floor(Math.random() *(100 - 80) ) + 80);
         $(".stars-active").css("width", random+"%")
     }
    function showProductDetail(course, object){
        if (course == "") {
            return;
        }
        var xhttp;
        xhttp = new XMLHttpRequest();
        xhttp.open("GET", "webservices/getProductDetail.php?course="+encodeURIComponent(course), true);
        xhttp.send();
console.log(encodeURIComponent(course))
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var response = JSON.parse(this.responseText);//json encode to array
                console.log(response)
                updateModal(response)
            }
        };
    }
</script>
