<?php require_once(dirname(__FILE__) . "/../dataBase/dataBase.php"); ?>

<?php

$db = DataBase::Instance();
$connected = $db->connect();
$returnArr="";

if($connected) {
    $user = $db->getUser($_GET['username']);
    $totalQuery = $db->getTotalCoursesStudent($_GET['username']);
    $gradeQuery = $db->getStudentGrade($_GET['username']);
    $coursesQuery = $db->getCoursesStudent($_GET['username']);
    $queryInfo = pg_fetch_assoc($user);
    $total = pg_fetch_assoc($totalQuery);
    $grade = pg_fetch_assoc($gradeQuery);
    $courses[0] = pg_fetch_assoc($coursesQuery);
    $i=1;
    while($courses[$i++] = pg_fetch_assoc($coursesQuery));
    array_splice($courses, --$i, 1);
    $returnArr = [$queryInfo,$total,$grade,$courses];
}

echo json_encode($returnArr);
?>