<?php
class Student{

    public function __construct()
    {
    }
    public function getAllStudent($conn){
        $query = "select * from Student;";
        return pg_exec($conn, $query);
    }
    /**
     * Alunos - professor
     * Return all the students for all the courses that the $username teacher teaches
     */
    public function getAllStudentsTeacher($conn, $teacherUsername){
        $query = "SELECT image,pp.username, grade, color FROM (SELECT aux.username, grade FROM (SELECT distinct username FROM course INNER JOIN enrolled e on course.coursename = e.coursename WHERE teacher = '".$teacherUsername."') AS aux LEFT JOIN student on student.username = aux.username) AS pp inner join userr ee on pp.username = ee.username;";
        return pg_exec($conn, $query);
    }
    /**
     * Comprar curso e notas
     * Return the courses and grades of student $username
     */
    public function getStudentCourseGrade($conn, $username){
        $query = "select * from Enrolled WHERE username='".$username."';";
        return pg_exec($conn, $query);
    }
    /**
     * Historico
     * Return the purchases historic of student $username
     */
    public function getPurchaseHistoric($conn, $username){
        $query = "select * from explicafeup.Orderr WHERE idstudent = '".$username."';";
        return pg_exec($conn, $query);
    }

    /**
     * Menu Users admin
     * Return the total courses of student $username
     */
    public function getTotalCoursesStudent($conn, $username){
        $query = "SELECT count(*) from enrolled where username='".$username."' group by username;";
        return pg_exec($conn, $query);
    }
    
    /**
     * Menu Users admin
     * Return the courses of student $username
     */
    public function getCoursesStudent($conn, $username){
        $query = "SELECT * from enrolled where username='".$username."' ;";
        return pg_exec($conn, $query);
    }

       
    /**
     * Menu Alunos professor
     * Set the grade $grade of student $username
     */
    public function setGradeStudent($conn, $username,  $grade, $course){
        $query = "UPDATE explicafeup.enrolled SET coursegrade= ".$grade." WHERE username='".$username."' and coursename='". $course."';";
        return pg_exec($conn, $query);
    }

    public function getStudentCourses($conn, $username){
        $query = "SELECT * FROM enrolled WHERE username ='".$username."';";
        $result = pg_exec($conn, $query);
        return $result;
    }

    /**
     * Add Student
     */
    public function addStudent($conn, $username){
        $query = "INSERT INTO Student (username) VALUES('".$username."')";
        $result = pg_exec($conn, $query);
        return $result;
    }

    /**
     * Enroll Student
     */
    public function enrollStudent($conn, $username, $coursename){
        $query = "INSERT INTO enrolled (username, coursename, coursegrade) VALUES('".$username."', '".$coursename."', -1)";
        $result = pg_exec($conn, $query);
        return $result;
    }
    /**
     * Student average
     */
    public function getStudentAverage($conn, $username){
        $query = "SELECT avg(coursegrade) from enrolled where username='".$username."' and coursegrade>-1";
        $result = pg_exec($conn, $query);
        return $result;
    }
}

?>