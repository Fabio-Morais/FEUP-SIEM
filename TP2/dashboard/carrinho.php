<?php require_once(dirname(__FILE__) . "/templates/common/header.php"); ?>
<?php require_once(dirname(__FILE__) . "/templates/common/navbar.php"); ?>

<?php require_once(dirname(__FILE__) . "/templates/common/title.php"); ?>

<?php require_once(dirname(__FILE__) . "/includes/common/alerts.php");
?>

<?php

$course = "";
$image = "";
$price = "";
$size = "";
if (isset($_POST["course"])) {
    $course = $_POST["course"];
    $image = $_POST["image"];
    $price = $_POST["price"];
    $size = sizeof($course);
}
/*
 *
 * USAR YUM FORM ESCONDIDO
 * <input type = "hidden" name = "topic" value = "something" />

 * */
?>
<div class="container-fluid ">
    <div class="row justify-content-md-center ">
        <main class="col-md-8 ">
            <div class="card">
                <form action="action/checkout.php" id="checkout" method="POST">

                    <table class="table table-borderless table-shopping-cart">
                        <thead class="text-muted">
                        <tr class="small text-uppercase">
                            <th scope="col">Produto</th>
                            <th scope="col" width="120">Quantidade</th>
                            <th scope="col" width="120">Preço</th>
                            <th scope="col" class="text-right" width="200"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $total = 0;
                        for ($i = 0; $i < $size; $i++):?>
                            <input type="hidden" name="course[]" value="<?php echo $course[$i] ?>" class="<?php echo preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(" ","",$course[$i])) ?>"/>
                            <input type="hidden" name="image[]" value="<?php echo $image[$i] ?>" class="<?php echo str_replace(" ","",$course[$i]) ?>"/>
                            <input type="hidden" name="price[]" value="<?php echo explode("€", $price[$i])[0]?>" class="<?php echo str_replace(" ","",$course[$i]) ?>"/>

                            <tr>
                                <td>
                                    <figure class="itemside">
                                        <div class="aside"><img src="<?php echo $image[$i] ?>"
                                                                class="img-sm"></div>
                                        <figcaption class="info">
                                            <a href="#" class="title text-dark">Curso de <?php echo ucwords($course[$i]) ?></a>
                                            <p class="text-muted small">Curso Online</p>
                                        </figcaption>
                                    </figure>
                                </td>
                                <td>
                                    <select class="form-control">
                                        <option>1</option>
                                    </select>
                                </td>
                                <td>
                                    <div class="price-wrap">
                                        <var class="price<?php echo preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(" ","",$course[$i])) ?>"><?php echo explode("€", $price[$i])[0];
                                            $total += explode("€", $price[$i])[0] ?> €</var>
                                    </div> <!-- price-wrap .// -->
                                </td>
                                <td class="text-right">
                                    <a type="button" class="btn btn-light" id="<?php echo str_replace(" ","",$course[$i]) ?>" onclick="remove(this, <?php echo $i ?>)">
                                        Remover</a>
                                </td>
                            </tr>
                        <?php endfor; ?>
                        </tbody>
                    </table>

                    <div class="card-body border-top">
                        <a type="submit" class="btn btn-primary float-md-right" id="submitButton"> Comprar <i
                                    class="fa fa-chevron-right"></i> </a>
                        <a href="comprar_curso.php" class="btn btn-light"> <i class="fa fa-chevron-left"></i> Continuar
                            a comprar </a>
                    </div>
                </form>
            </div> <!-- card.// -->

            <div class="alert alert-success mt-3">
                <p class="icontext"><i class="icon text-success fa fa-truck"></i> Entrega dos cursos de imediato
                </p>
            </div>

        </main> <!-- col.// -->
        <aside class="col-md-3">

            <div class="card">
                <div class="card-body">
                    <dl class="dlist-align">
                        <dt>Preço total:</dt>
                        <dd class="text-right" id="totalPrice"><?php echo $total ?> €</dd>
                    </dl>
                    <dl class="dlist-align">
                        <dt>Iva (24%):</dt>
                        <dd class="text-right" id="iva"><?php echo $total * 0.24 ?> €</dd>
                    </dl>
                    <dl class="dlist-align">
                        <dt>Total:</dt>
                        <dd class="text-right  h5" id="finalPrice"><strong><?php echo $total + $total * 0.24 ?>
                                €</strong></dd>
                    </dl>
                    <hr>
                    <p class="text-center mb-3">
                        <img src="public/img/payments.png" height="26">
                    </p>

                </div> <!-- card-body.// -->
            </div> <!-- card .// -->
        </aside> <!-- col.// -->
    </div>

</div>


<?php require_once(dirname(__FILE__) . "/templates/common/footer.php"); ?>
<script>
    document.getElementById("submitButton").onclick = function () {
        document.getElementById("checkout").submit();
    }
    function getCookie(name) {
        const value = `; ${document.cookie}`;
        const parts = value.split(`; ${name}=`);
        if (parts.length === 2) return parts.pop().split(';').shift();
    }
    function createCookie(cname, cvalue, exdays, dayMinute) {
        var d = new Date();
        if (dayMinute == "day")
            d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        else if (dayMinute == "minute")
            d.setTime(d.getTime() + (exdays * 60 * 1000));

        var expires = "expires=" + d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }
    //window.history.replaceState(null, null, window.location.pathname);
    function remove(e, count) {
        var course = e.id.replace(/[^\w\s]/gi, '')
        var price = document.getElementsByClassName("price"+course+"")[0].innerHTML.split("€")[0]
        totalPrice = document.getElementById("totalPrice").innerText.split("€")[0]
        iva = document.getElementById("iva").innerText.split("€")[0]
        finalPrice = document.getElementById("finalPrice").innerText.split("€")[0]

        totalPrice = parseInt(totalPrice) - parseInt(price)
        iva = 0.24 * totalPrice
        iva = iva.toFixed(2)
        finalPrice = parseFloat(iva) + parseFloat(totalPrice)
        finalPrice = finalPrice.toFixed(2)
        document.getElementById("totalPrice").innerText = totalPrice + " €";
        document.getElementById("iva").innerText = iva + " €";
        document.getElementById("finalPrice").innerText = finalPrice + " €";

        var asd = JSON.parse(getCookie('cartCookie'))//get the cookie
        /*search for the id or class that are defined and delete from the array*/
        for(i=asd.length; i >= 0; i--){
            if($(asd[i]).filter("#"+course).html() != null || $(asd[i]).filter("."+course).html() != null){
                asd.splice(i, 1);
            }
        }
        /*reset the cookie*/
        var json_str = JSON.stringify(asd);
        createCookie('cartCookie', json_str,1, "day");
        $("."+course).remove()
        e.parentNode.parentNode.parentNode.removeChild(e.parentNode.parentNode);
    }
</script>
