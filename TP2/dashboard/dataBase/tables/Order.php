<?php
class Order{

    public function __construct()
    {
    }
    public function getCourseCount($conn){
        $query = "select productname, count(*) from Orderr GROUP BY productname;";
        $result = pg_exec($conn, $query);
        return $result;
    }
    public function getProfitByCourse($conn){
        $query = "select productname, sum(CAST(price AS DECIMAL(10,2))) from explicafeup.Orderr GROUP BY productname;";
        $result = pg_exec($conn, $query);
        return $result;
    }
    public function getTotalProfit($conn){
        $query = "select sum(CAST(price AS DECIMAL(10,2))) from explicafeup.Orderr;";
        $result = pg_exec($conn, $query);
        return $result;
    }
    public function getTotalYearProfit($conn){
        $query = "SELECT  SUM(CAST(price as INT)) as price,to_char(to_date(purchasedate, 'DD/MM/YYYY'),'DD/MM/YYYY') as date FROM Orderr WHERE to_char(to_date(purchasedate, 'DD/MM/YYYY'),'YYYY') = to_char(now()::date,  'YYYY') GROUP BY purchasedate ORDER BY to_date(purchasedate, 'DD/MM/YYYY');";
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
}

?>