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


                        <div class="row justify-content-start ">
                                <?php
                                if ($connected) :
                                    $row = pg_fetch_assoc($courses);
                                    while (isset($row["coursename"])) {
                                        echo "<div class=\"col-m-3 m-4\">";
                                        echo "<div class=\"product-grid\">";
                                        echo "<div class=\"product-image\">";
                                        echo "<a href=\"#\">";
                                        echo "<img class=\"pic-1\" src=\"public/img/courses/".$row["image"]."\">";
                                        echo "</a>";

                                        echo "</div>";
                                        echo "<div class=\"product-content\">";
                                        echo "<h3 class=\"title\"><a href=\"#\">".$row["coursename"]."</a></h3>";
                                        echo "<div class=\"price\"> ".$row["price"]."€<span class=\"ml-2\">".(intval($row["price"])+5)."€</span> </div>";
                                        echo " <a class=\"add-to-cart\" href=\"  \">Comprar</a>";
                                        echo "</div>";
                                        echo " </div>";
                                        echo "</div>";
                                        $row = pg_fetch_assoc($courses);
                                    }
                                endif;
                                ?>


                            </div>

                </div>
            </div>
        </div>


    </div>
<?php require_once(dirname(__FILE__) . "/templates/common/footer.php"); ?>