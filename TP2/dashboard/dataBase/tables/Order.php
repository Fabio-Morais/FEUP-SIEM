<?php
class Order{

    public function __construct()
    {
    }


    public function getTotalCustomYearProfit($conn, $year){
        $query = "SELECT  SUM(CAST(price as INT)) as price,to_char(to_date(purchasedate, 'DD/MM/YYYY'),'DD/MM/YYYY') as date
                    FROM explicafeup.Orderr
                    WHERE to_char(to_date(purchasedate, 'DD/MM/YYYY'),'YYYY') = '".$year."'
                    GROUP BY to_date(purchasedate, 'DD/MM/YYYY')
                    ORDER BY to_date(purchasedate, 'DD/MM/YYYY');";
        $result = pg_exec($conn, $query);
        return $result;
    }
    public function getTotalMonthProfit($conn){
        $query = "SELECT SUM(CAST(price AS int)) FROM Orderr WHERE to_char(to_date(purchasedate, 'DD/MM/YYYY'),'MM/YYYY') = to_char(now()::date,  'MM/YYYY');";
        $result = pg_exec($conn, $query);
        return $result;
    }
    public function getTotalDailyProfit($conn){
        $query = "SELECT SUM(CAST(price AS int)) FROM Orderr WHERE to_char(to_date(purchasedate, 'DD/MM/YYYY'),'DD/MM/YYYY') = to_char(now()::date,  'DD/MM/YYYY');";
        $result = pg_exec($conn, $query);
        return $result;
    }
    public function getOrdersByUser($conn, $username){
        $query = "SELECT * FROM orderr WHERE idstudent ='".$username."';";
        $result = pg_exec($conn, $query);
        return $result;
    }


    /**
     * Return total sells by courses (number)
     */
    public function getSellsCoursesByYear($conn, $year, $max){
        if($max > 0)
            $query = "SELECT Count(*), productname FROM orderr 
                    WHERE to_char(to_date(purchasedate, 'DD/MM/YYYY'),'YYYY') = '".$year."'
                    GROUP BY productname
                    ORDER BY Count(*) DESC
                    LIMIT ".$max." ;";
        else
            $query = "SELECT Count(*), productname FROM orderr 
                        WHERE to_char(to_date(purchasedate, 'DD/MM/YYYY'),'YYYY') = '".$year."'
                        GROUP BY productname";
        $result = pg_exec($conn, $query);
        return $result;
    }

    /**
     * Return sum of total sells by courses (€)
     */
    public function getSellsCoursesMoneyYear($conn, $year, $max){
        if($max > 0)
            $query = "SELECT sum(CAST(price AS int)), productname FROM orderr 
                    WHERE to_char(to_date(purchasedate, 'DD/MM/YYYY'),'YYYY') = '".$year."'
                    GROUP BY productname
                    ORDER BY sum(CAST(price AS int)) DESC
                    LIMIT ".$max." ;";
        else
            $query = "SELECT sum(CAST(price AS int)), productname FROM orderr 
                    WHERE to_char(to_date(purchasedate, 'DD/MM/YYYY'),'YYYY') = '".$year."'
                    GROUP BY productname;";
        $result = pg_exec($conn, $query);
        return $result;
    }

    /**
     * Return total sells by courses (€)
     */
    public function getTotalCourses($conn){
        $query = "SELECT COUNT(*) FROM orderr";
        $result = pg_exec($conn, $query);
        return $result;
    }

    /**
     * Add order
     */
    public function addOrder($conn, $price, $course, $username){
        $query = "INSERT INTO orderr (price, productname,idstudent) VALUES ('$price', '$course', '$username')";
        echo $query;
        $result = pg_exec($conn, $query);
        return $result;
    }

    /**
     * Add First Order
     */
    public function addFirstOrder($conn, $productname, $username){
        $query = "INSERT INTO Orderr (price, productname, idstudent) 
                VALUES ((SELECT price FROM course WHERE coursename ='$productname'),'$productname','$username')";
        $result = pg_exec($conn, $query);
        return $result;
    }

    /**
     * Get All Orders
     */
    public function getAllOrders($conn){
        $query = "SELECT * FROM orderr";
        $result = pg_exec($conn, $query);
        return $result;
    }

    /**
     * Get All years
     */
    public function getYears($conn){
        $query = "SELECT distinct to_char(to_date(purchasedate, 'DD/MM/YYYY'),'YYYY') as year FROM explicafeup.orderr";
        $result = pg_exec($conn, $query);
        return $result;
    }
}

?>