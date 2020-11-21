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
        $query = "SELECT distinct username FROM explicafeup.course INNER JOIN explicafeup.enrolled e on course.name = e.coursename WHERE teacher = '".$teacherUsername."';";
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
     * Return the total courses of student $username
     */
    public function getStudentGrade($conn, $username){
        $query = "SELECT grade from Student where username='".$username.";";
        return pg_exec($conn, $query);
    }
}

?>