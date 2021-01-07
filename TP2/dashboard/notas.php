<?php require_once(dirname(__FILE__) . "/templates/common/header.php"); ?>
<?php require_once(dirname(__FILE__) . "/templates/common/navbar.php"); ?>
<?php require_once(dirname(__FILE__) . "/templates/common/title.php"); ?>

<?php
$db = DataBase::Instance();
$connected = false;
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
                        echo "<div id=\"course\" class=\"all  animate__animated  animate__fadeIn ". $courses['coursename'] ." box\">";
                        echo    "<div id=\"imgBorder\"><img src=\"../img/courses/". $info['image'] ." \" id=\"imgCourse\"></div>";
                        echo    "<h3>" . ucwords($courses['coursename']) . "</h3>";  // Primeira letra maiuscula
                        if($courses['coursegrade'] != -1)
                            echo    "<h4>Nota: " . $courses['coursegrade'] . " Valores</h4>";
                        else
                            echo    "<h4>Nota: Sem avaliação</h4>";
                        echo "</div>";
                        $courses = pg_fetch_assoc($coursesQuery);
                        if(isset($courses["coursename"])){
                            $infoQuery = $db->getCourseInfo($courses['coursename']);
                            $info = pg_fetch_assoc($infoQuery);
                        }
                    }
                endif;
                ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once(dirname(__FILE__) . "/templates/common/footer.php"); ?>