<?php require_once(dirname(__FILE__) . "/templates/common/header.php"); ?>
<?php require_once(dirname(__FILE__) . "/templates/common/navbar.php"); ?>
<?php require_once(dirname(__FILE__) . "/templates/common/title.php"); ?>
<?php require_once(dirname(__FILE__) . "/includes/common/functions.php"); ?>

<?php
$db = DataBase::Instance();
$connected = false;
if ($db->connect()) {
    $coursesQuery = $db->getStudentCourses($_SESSION['user']);
    $connected = true;
    $courses = pg_fetch_assoc($coursesQuery);
    if(isset($courses['coursename'])){
        $videosQuery = $db->getVideoLinks($courses['coursename']);
        $videos = pg_fetch_assoc($videosQuery);
    }
    $coursesQuery2 = $db->getStudentCourses($_SESSION['user']);
    $courses2 = pg_fetch_assoc($coursesQuery2);
} else
    Alerts::showError(Alerts::DATABASEOFF);
?>

<div class="container-fluid ">
    <div class="justify-content-center m-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <select id="outer" class="custom-select m-1 aulaClass">
                    <option disabled selected value> -- Selecionar Curso --</option>
                    <?php
                    while (isset($courses2["coursename"])) {
                        echo "<option value='" . preg_replace("/\s+/", "", clean($courses2['coursename'])) . "'> " . ucwords($courses2["coursename"]) . " </option>";
                        $courses2 = pg_fetch_assoc($coursesQuery2);
                    }
                    ?>
                </select>
                <div class="card-header">
                    <i class="fab fa-youtube"></i>
                    Aula Online
                </div>

                <div class="row" style="padding-top: 10px">
                    <?php
                    $countCourses = pg_num_rows($coursesQuery);
                    if ($connected) :
                        while (isset($courses["coursename"])) {
                            $videosQuery = $db->getVideoLinks($courses['coursename']);
                            $videos = pg_fetch_assoc($videosQuery);
                            while (isset($videos["youtubelink"])) {
                                $video_id = extractVideoID($videos["youtubelink"]);
                                $video_thumbnail = getYouTubeThumbnailImage($video_id);

                                echo "<div class=\"col-md-4 " . preg_replace("/\s+/", "", clean($courses['coursename'])) . " all\" style=\"display:none\"  >";
                                echo "<div class=\"pb-2 animate__animated  animate__zoomIn\">";
                                echo "<a data-fancybox=\"video-gallery\" href=\" " . $videos["youtubelink"] . " ;\">";
                                echo "<div class=\"card-header\">";
                                echo "<img src=\"" . $video_thumbnail . "\" class=\"img-thumbnail\" />";
                                echo "</div>";
                                echo "</a>";
                                echo "</div>";
                                echo "</div>";
                                $videos = pg_fetch_assoc($videosQuery);
                            }
                            $courses = pg_fetch_assoc($coursesQuery);
                        }
                    endif;
                    ?>

                </div>
                <?php if($countCourses <= 0):?>
                    <div class="d-flex flex-column py-4 ">
                        <img src="public/img/teste.png" width="300" heigh="300" class="m-auto">
                        <h2 class="m-auto">É necessário comprar um curso!</h2>
                    </div>
                <?php endif;?>
            </div>
        </div>
    </div>
</div>


<?php require_once(dirname(__FILE__) . "/templates/common/footer.php"); ?>

