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



}

?>