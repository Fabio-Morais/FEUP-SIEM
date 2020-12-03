<?php require_once(dirname(__FILE__) . "/../dataBase/dataBase.php"); ?>

<?php
$grade = $_POST['grade'];
$username = $_POST['user'];
$course = $_POST['course'];

$db = DataBase::Instance();
$db->connect();
$db->setGradeStudent($username, $grade, $course);


header("Location:../alunos.php");
exit();

?>