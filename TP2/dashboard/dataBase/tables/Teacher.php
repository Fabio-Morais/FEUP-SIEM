<?php
class Teacher{

    public function __construct()
    {
    }
    /**
     * Salario - professor
     * Return salary historic of teacher $teacherUserName
     */
    public function getSalary($conn){
        $query = "select * from Salary WHERE username = '".$teacherUserName."';";
        $result = pg_exec($conn, $query);
        return $result;
    }
}

?>