<?php
include_once(dirname(__FILE__) . "/tables/Order.php");
include_once(dirname(__FILE__) . "/tables/Teacher.php");
include_once(dirname(__FILE__) . "/tables/Student.php");
include_once(dirname(__FILE__) . "/tables/User.php");


final class DataBase
{
    private $conn = null;
    private $order;
    private $teacher;
    private $student;
    private $user;

    /**
     * Call this method to get singleton
     *
     * @return DataBase
     */
    public static function Instance()
    {
        static $inst = null;
        if ($inst === null) {
            $inst = new DataBase();
        }
        return $inst;
    }

    /**
     * Private ctor so nobody else can instantiate it
     *
     */
    private function __construct()
    {
        $this->student = new Student();
        $this->order = new Order();
        $this->teacher = new Teacher();
        $this->user = new User();

    }
    /**
     * Private ctor so nobody else can instantiate it
     *
     */
    public function connect()
    {   try{
            $this->conn = pg_connect("host=db dbname=siem2013 user=siem2013 password=fabiofernando");
        }catch(Exception $e){
            return false;
        }  
        if (!$this->conn) {
            return false;
        }
        $query = "set schema 'explicafeup';";
        pg_exec($this->conn, $query);
        return true;
    }

    public function getAllStudent()
    {
        return $this->student->getAllStudent($this->conn);
    }
    public function getAllUsers()
    {
        return $this->user->getAllUsers($this->conn);
    }
    public function getAllStudentsTeacher($teacherUserName)
    {
        return $this->student->getAllStudentsTeacher($this->conn, $teacherUserName);
    }
    public function getStudentCourseGrade($userName)
    {
        return $this->student->getStudentCourseGrade($this->conn, $userName);
    }
    public function getPurchaseHistoric($userName)
    {
        return $this->student->getPurchaseHistoric($this->conn, $userName);
    }
    public function getTotalCoursesStudent($userName)
    {
        return $this->student->getTotalCoursesStudent($this->conn, $userName);
    }
    public function getSalary($teacherUserName)
    {
        return $this->teacher->getSalary($this->conn, $teacherUserName);
    }

}
