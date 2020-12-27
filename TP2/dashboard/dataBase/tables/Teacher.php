<?php
class Teacher{

    public function __construct()
    {
    }
    /**
     * Salario - professor
     * Return salary historic of teacher $teacherUserName
     */
    public function getSalary($conn, $teacherUserName){
        $query = "select * from Salary WHERE username = '".$teacherUserName."';";
        $result = pg_exec($conn, $query);
        return $result;
    }

    /**
     * Perfil
     * Return the courses of teacher $username
     */
    public function getCoursesTeacher($conn, $teacher){
        $query = "SELECT * from course where teacher='".$teacher."' ;";
        return pg_exec($conn, $query);
    }

    
    /**
     * Perfil
     * Return the courses of teacher $username
     */
    public function getCoursesTeacherStudent($conn, $teacher, $username){
        $query = "SELECT * from explicafeup.enrolled as e INNER JOIN explicafeup.course as x ON e.coursename = x.coursename WHERE username='".$username."' and teacher='".$teacher."'";
        return pg_exec($conn, $query);
    }

        
    /**
     * Perfil
     * Return the total courses of teacher $username
     */
    public function getTotalCoursesTeacher($conn, $username){
        $query = "SELECT count(*) from course where teacher='".$username."' group by teacher;";
        return pg_exec($conn, $query);
    }


}

?>