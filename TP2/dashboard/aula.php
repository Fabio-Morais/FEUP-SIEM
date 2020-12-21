<?php require_once(dirname(__FILE__) . "/templates/common/header.php"); ?>
<?php require_once(dirname(__FILE__) . "/templates/common/navbar.php"); ?>

<?php require_once(dirname(__FILE__) . "/templates/common/title.php"); ?>

<?php include_once(dirname(__FILE__) . "/dataBase/dataBase.php");
/*Para retirar a visibilidade do erro*/
/*error_reporting(E_ERROR | E_PARSE);*/
$db = DataBase::Instance();
$coursesQuery = "";
$videosQuery = "";
$videos = "";
$courses = "";
$connected = false;

if ($db->connect()) {
    $coursesQuery = $db->getStudentCourses($aux['username']);
    $connected = true;
    $courses = pg_fetch_assoc($coursesQuery);
    $videosQuery = $db->getVideoLinks($courses['coursename']);
    $videos = pg_fetch_assoc($videosQuery);
    $coursesQuery2 = $db->getStudentCourses($aux['username']);
    $courses2 = pg_fetch_assoc($coursesQuery2);
} else
    Alerts::showError(Alerts::DATABASEOFF);
?>
<?php


function getYouTubeThumbnailImage($video_id) {
    return "http://i3.ytimg.com/vi/$video_id/hqdefault.jpg";
}

function extractVideoID($url){
    $regExp = "/^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#\&\?]*).*/";
    preg_match($regExp, $url, $video);
    return $video[7];
}
?>

<div class="container-fluid">
    <div class="justify-content-center m-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <select id="outer" class="custom-select m-1">
                    <option disabled selected value> -- Selecionar Curso -- </option>
                    <?php

                    while(isset($courses2["coursename"]))
                    {
                        echo "<option value='". preg_replace("/\s+/", "", $courses2['coursename']) ."'> ". ucwords($courses2["coursename"]) ." </option>";
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
                            if($connected) :
                                while(isset($courses["coursename"])) {
                                    while(isset($videos["youtubelink"])){
                                        $video_id = extractVideoID($videos["youtubelink"]);
                                        $video_thumbnail = getYouTubeThumbnailImage($video_id);
                                        echo "<div class=\"col-md-4 ". preg_replace("/\s+/", "", $courses['coursename']) ."\">";
                                        echo "<div class=\"pb-2\">";
                                        echo    "<a data-fancybox=\"video-gallery\" href=\" ".$videos["youtubelink"]." ;\">";
                                        echo        "<div class=\"card-header\">";
                                        echo            "<img src=\"".$video_thumbnail." \" class=\"img-thumbnail\" />";
                                        echo        "</div>";
                                        echo    "</a>";
                                        echo "</div>";
                                        echo "</div>";
                                        $videos = pg_fetch_assoc($videosQuery);
                                    }
                                    $courses = pg_fetch_assoc($coursesQuery);
                                    $videosQuery = $db->getVideoLinks($courses['coursename']);
                                    $videos = pg_fetch_assoc($videosQuery);
                            }
                            endif;
                            ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $(".webapis").hide();
        $(".webdevelopment").hide();
        $(".machinelearning").hide();
        $(".c\\/c++").hide();
        $(".matematica").hide();
        $(".java").hide();
        $(".python").hide();
        $('#outer').change(function () {
            $(".webapis").hide();
            $(".webdevelopment").hide();
            $(".machinelearning").hide();
            $(".c\\/c++").hide();
            $(".matematica").hide();
            $('.java').hide();
            $(".python").hide();
            $('.'+$(this).val()).show();
        })
    });
</script>
<?php require_once(dirname(__FILE__) . "/templates/common/footer.php"); ?>