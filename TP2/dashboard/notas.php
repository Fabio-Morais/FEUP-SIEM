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
                if(isset($courses['coursename'])){
                    $infoQuery = $db->getCourseInfo($courses['coursename']);
                    $info = pg_fetch_assoc($infoQuery);
                }
                $countCourses = pg_num_rows($coursesQuery);
                $aux=0;
                if($connected) :
                    while(isset($courses["coursename"])){

                    if ($courses['coursegrade'] == -1) {
                        $aux++;
                        $courses = pg_fetch_assoc($coursesQuery);
                        if(isset($courses['coursename'])){
                            $infoQuery = $db->getCourseInfo($courses['coursename']);
                            $info = pg_fetch_assoc($infoQuery);
                        }
                        continue;
                    }
                        echo "<div id=\"course\" class=\"all animate__animated  animate__fadeIn ". $courses['coursename'] ." box\">";
                        echo    "<div id=\"imgBorder\"><img src=\"../img/courses/". $info['image'] ." \" id=\"imgCourse\"></div>";
                        echo    "<h3 style='z-index: 100'>" . ucwords($courses['coursename']) . "</h3>";  // Primeira letra maiuscula

                        if ($courses['coursegrade'] > 9.5) {
                            echo "<h4>Nota: " . $courses['coursegrade'] . " Valores</h4>";
                            echo "<div class=\"outer\"><img class=\"imgl\" width=\"20%\" src=\"public/img/pos.png\"><img class=\"imgr\" width=\"20%\" src=\"public/img/pos.png\"></div>";
                        }
                        elseif (10 > $courses['coursegrade'] && $courses['coursegrade'] >= 0) {
                            echo "<h4>Nota: " . $courses['coursegrade'] . " Valores</h4>";
                            echo "<div class=\"outer\"><img class=\"imgc\" width=\"30%\" src=\"public/img/f.png\"></div>";
                        }
                        else
                            echo "<h4>Nota: Sem avaliação</h4>";

                        echo "</div>";
                        $courses = pg_fetch_assoc($coursesQuery);
                        if(isset($courses["coursename"])){
                            $infoQuery = $db->getCourseInfo($courses['coursename']);
                            $info = pg_fetch_assoc($infoQuery);
                        }
                    }
                endif;
                ?>
                    <?php if($countCourses == $aux):?>
                    <div class="d-flex flex-column py-4">
                        <img src="public/img/teste.png" width="300" heigh="300" style="margin:auto">
                        <h2 >Nao existe notas disponiveis</h2>
                    </div>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once(dirname(__FILE__) . "/templates/common/footer.php"); ?>