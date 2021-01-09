<?php

class Courses
{

    public function __construct()
    {
    }

    /**
     * Return all the courses info
     */
    public function getCoursesPrices($conn)
    {
        $query = "SELECT * FROM course";
        $result = pg_exec($conn, $query);
        return $result;
    }

    /**
     * Return all the courses that student don't have
     */
    public function getAllCoursesExceptStudentOwn($conn, $username)
    {
        $query = "SELECT course.coursename as coursename, price, type, image FROM explicafeup.course 
                    INNER JOIN (SELECT coursename FROM explicafeup.course EXCEPT SELECT coursename from explicafeup.enrolled
                    where username='" . $username . "') e on course.coursename = e.coursename;";
        $result = pg_exec($conn, $query);
        return $result;
    }

    public function getCourseInfo($conn, $coursename){
        $query = "SELECT * FROM course WHERE coursename = '".$coursename."';";
        $result = pg_exec($conn, $query);
        return $result;
    }

    public function getAverageByCourse($conn, $max){
        if($max > 0)
            $query = "SELECT ROUND(cast(avg(coursegrade) as decimal),2),coursename FROM explicafeup.enrolled 
                        WHERE coursegrade > -1 GROUP BY coursename ORDER BY ROUND(cast(avg(coursegrade) as decimal),2) 
                        DESC LIMIT ".$max." ";
        else
            $query = "SELECT ROUND(cast(avg(coursegrade) as decimal),2),coursename FROM explicafeup.enrolled WHERE coursegrade > -1 GROUP BY coursename";
        $result = pg_exec($conn, $query);
        return $result;
    }

}

?>