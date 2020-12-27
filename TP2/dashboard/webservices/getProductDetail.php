<?php require_once(dirname(__FILE__) . "/../dataBase/dataBase.php"); ?>
<?php


$db = DataBase::Instance();
$connected = $db->connect();
if($connected){
    $query = $db->getCourseInfo($_GET['course']);
}
$courses = pg_fetch_assoc($query);

echo json_encode($courses)
?>