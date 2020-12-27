<?php require_once(dirname(__FILE__) . "/../dataBase/dataBase.php"); ?>
<?php


$db = DataBase::Instance();
$connected = $db->connect();
if($connected){
    $aux = $_GET['course'];
    if($aux == "cc++")
        $query = $db->getCourseInfo("c/c++");
    else
        $query = $db->getCourseInfo($aux);
}
$courses = pg_fetch_assoc($query);

echo json_encode($courses)
?>