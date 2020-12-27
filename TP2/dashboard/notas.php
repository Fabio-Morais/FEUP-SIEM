<?php require_once(dirname(__FILE__) . "/templates/common/header.php"); ?>
<?php require_once(dirname(__FILE__) . "/templates/common/navbar.php"); ?>

<?php require_once(dirname(__FILE__) . "/templates/common/title.php"); ?>

<?php
/*Para retirar a visibilidade do erro*/
/*error_reporting(E_ERROR | E_PARSE);*/
$db = DataBase::Instance();
$coursesQuery = "";
$courses = "";
$connected = false;
$infoQuery = "";
$info = "";
if ($db->connect()) {
    $coursesQuery = $db->getStudentCourses($_SESSION['user']);
    $connected = true;
} else
    Alerts::showError(Alerts::DATABASEOFF);

?>



<div class="container-fluid">
    <div class="justify-content-center m-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row" style="justify-content: center">
                <?php
                $courses = pg_fetch_assoc($coursesQuery);
                $infoQuery = $db->getCourseInfo($courses['coursename']);
                $info = pg_fetch_assoc($infoQuery);
                if($connected) :
                    while(isset($courses["coursename"])){
                        echo "<div id=\"course\" class=\"all ". $courses['coursename'] ." box\" data-aos=\"fade-up\" data-aos-delay=\"100\" data-aos-once=\"true\">";
                        echo    "<div id=\"imgBorder\"><img src=\"../img/courses/". $info['image'] ." \" id=\"imgCourse\"></div>";
                        echo    "<h3>" . ucwords($courses['coursename']) . "</h3>";  // Primeira letra maiuscula
                        echo    "<h4>Nota: " . $courses['coursegrade'] . " Valores</h4>";
                        echo "</div>";
                        $courses = pg_fetch_assoc($coursesQuery);
                        $infoQuery = $db->getCourseInfo($courses['coursename']);
                        $info = pg_fetch_assoc($infoQuery);
                    }
                endif;
                ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="../js/courses.js"></script>
<?php require_once(dirname(__FILE__) . "/templates/common/footer.php"); ?>