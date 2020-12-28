<?php require_once(dirname(__FILE__) . "/../dataBase/dataBase.php"); ?>
<?php


$db = DataBase::Instance();
$connected = $db->connect();
$courses=[];
$query="";
if($connected){
    $query = $db->getCoursesTeacherStudent($_GET['teacher'], $_GET['student']);
    $i=0;
    while($courses[$i++] = pg_fetch_assoc($query));
    array_splice($courses, --$i, 1);
}
echo json_encode($courses);

?>