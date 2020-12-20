<?php
class Video{

    public function __construct()
    {
    }
    /**
     * Return all the user info
     */
    public function getVideoLinks($conn, $course){
        $query = "SELECT youtubeLink FROM Video WHERE coursename ='".$course."';";
        $result = pg_exec($conn, $query);
        return $result;
    }
}
?>