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

    $arr_video_ids = array();
} else
    Alerts::showError(Alerts::DATABASEOFF);
?>

<div class="container-fluid">
    <div class="justify-content-center m-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <?php
                    if($connected) :

                        while(isset($courses["coursename"])) {
                            echo " ". $courses["coursename"] . " ";                 #DEBUGGING
                            while(isset($videos["youtubelink"])){
                                echo " ". $videos["youtubelink"] . " ";             #DEBUGGING
                                array_push($arr_video_ids, $videos["youtubelink"]);
                                $videos = pg_fetch_assoc($videosQuery);
                            }
                            $courses = pg_fetch_assoc($coursesQuery);
                            $videosQuery = $db->getVideoLinks($courses['coursename']);
                            $videos = pg_fetch_assoc($videosQuery);
                        }
                    endif;

                    function getYouTubeThumbnailImage($video_id) {
                        return "http://i3.ytimg.com/vi/$video_id/hqdefault.jpg";
                    }

                    function extractVideoID($url){
                        $regExp = "/^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#\&\?]*).*/";
                        preg_match($regExp, $url, $video);
                        return $video[7];
                    }
                    ?>
                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" />
                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css" />
                    <div class="container">
                        <?php echo "<h3 class=\"text-center\">". $courses['coursename'] ."</h3>" ?>
                        <div class="row">
                            <?php foreach ($arr_video_ids as $video) { ?>
                                <?php
                                $video_id = extractVideoID($video);
                                $video_thumbnail = getYouTubeThumbnailImage($video_id);
                                ?>
                                <div class="col-md-4">
                                    <div class="pb-2">
                                        <a data-fancybox="video-gallery" href="<?php echo $video; ?>">
                                            <img src="<?php echo $video_thumbnail; ?>" class="img-thumbnail" />
                                        </a>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once(dirname(__FILE__) . "/templates/common/footer.php"); ?>