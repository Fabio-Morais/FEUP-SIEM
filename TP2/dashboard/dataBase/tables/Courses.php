<?php
class Courses{

    public function __construct()
    {
    }
    /**
     * Return all the courses info
     */
    public function getCoursesPrices($conn){
        $query = "SELECT * FROM course";
        $result = pg_exec($conn, $query);
        return $result;
    }

    public function getCourseInfo($conn, $coursename){
        $query = "SELECT * FROM course WHERE coursename = '".$coursename."';";
        $result = pg_exec($conn, $query);
        return $result;
    }

}

?>