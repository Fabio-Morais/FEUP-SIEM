<?php
include_once(dirname(__FILE__) . "/tables/Order.php");
include_once(dirname(__FILE__) . "/tables/Teacher.php");
include_once(dirname(__FILE__) . "/tables/Student.php");
include_once(dirname(__FILE__) . "/tables/User.php");
include_once(dirname(__FILE__) . "/tables/Courses.php");
include_once(dirname(__FILE__) . "/tables/Video.php");

final class DataBase
{
    private $conn = null;
    private $order;
    private $teacher;
    private $student;
    private $user;
    private $course;
    private $video;

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
        $this->course = new Courses();
        $this->video = new Video();

    }
    /**
     * Private ctor so nobody else can instantiate it
     *
     */
    public function connect()
    {   try{

            $this->conn = pg_connect("host=localhost  dbname=postgres user=postgres password=siem");
            //$this->conn = pg_connect("host=db dbname=siem2013 user=siem2013 password=fabiofernando");

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
    public function getUser($username)
    {
        return $this->user->getUser($this->conn, $username);
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
    public function getCoursesStudent($userName)
    {
        return $this->student->getCoursesStudent($this->conn, $userName);
    }
    public function getSalary($teacherUserName)
    {
        return $this->teacher->getSalary($this->conn, $teacherUserName);
    }

    public function insert($data)
    {
        return $this->user->ins($this->conn, $data);
    }

    public function editUserInfo($userName, $user)
    {
        return $this->user->editUserInfo($this->conn,$userName, $user);
    }

    public function addUser($name, $email, $role, $username)
    {
        return $this->user->addUser($this->conn,$name, $email, $role, $username);
    }

    public function usernameExists($username)
    {
        return $this->user->usernameExists($this->conn, $username);
    }

    public function deleteUser($username)
    {
        return $this->user->deleteUser($this->conn, $username);
    }

    public function addUserColor($username,$color)
    {
        return $this->user->addUserColor($this->conn,$username, $color);
    }

    public function changePassword($username,$passwordHash)
    {
        return $this->user->changePassword($this->conn,$username, $passwordHash);
    }

    public function getCoursesPrices()
    {
        return $this->course->getCoursesPrices($this->conn);
    }

    public function getAllCoursesExceptStudentOwn($username)
    {
        return $this->course->getAllCoursesExceptStudentOwn($this->conn,$username);
    }
    public function getCourseInfo($coursename)
    {
        return $this->course->getCourseInfo($this->conn, $coursename);
    }
        
    public function getCoursesTeacher($username)
    {
        return $this->teacher->getCoursesTeacher($this->conn, $username);
    }

    public function getCoursesTeacherStudent($teacher, $username)
    {
        return $this->teacher->getCoursesTeacherStudent($this->conn, $teacher, $username);
    }
            
    public function getTotalCoursesTeacher($username)
    {
        return $this->teacher->getTotalCoursesTeacher($this->conn, $username);
    }
            
    public function setGradeStudent($username, $grade, $course)
    {
        return $this->student->setGradeStudent($this->conn, $username,  $grade, $course);
    }

    public function getTotalYearProfit()
    {
        return $this->order->getTotalYearProfit($this->conn);
    }
    public function getTotalMonthProfit()
    {
        return $this->order->getTotalMonthProfit($this->conn);
    }

    public function getTotalDailyProfit()
    {
        return $this->order->getTotalDailyProfit($this->conn);
    }

    public function getOrdersByUser($username)
    {
        return $this->order->getOrdersByUser($this->conn, $username);
    }

    public function getStudentCourses($username)
    {
        return $this->student->getStudentCourses($this->conn, $username);
    }

    public function getVideoLinks($coursename)
    {
        return $this->video->getVideoLinks($this->conn, $coursename);
    }

    public function getSellsCourses()
    {
        return $this->order->getSellsCourses($this->conn);
    }
    public function getSellsCoursesMoney()
    {
        return $this->order->getSellsCoursesMoney($this->conn);
    }
    public function getTotalCourses()
    {
        return $this->order->getTotalCourses($this->conn);
    }
    public function addOrder($price, $course, $username)
    {
        return $this->order->addOrder($this->conn, $price, $course, $username);
    }

    public function addUserStudent($name, $email, $username, $passhash, $phone, $nif)
    {
        return $this->user->addUserStudent($this->conn, $name, $email, $username, $passhash, $phone, $nif);
    }

    public function addStudent($username)
    {
        return $this->student->addStudent($this->conn, $username);
    }
    public function addFirstOrder($productname, $username)
    {
        return $this->order->addFirstOrder($this->conn, $productname, $username);
    }

    public function enrollStudent($username, $coursename)
    {
        return $this->student->enrollStudent($this->conn, $username, $coursename);
    }

    public function getStudentAverage($username)
    {
        return $this->student->getStudentAverage($this->conn, $username);
    }

    public function getAllOrders()
    {
        return $this->order->getAllOrders($this->conn);
    }
}
