<?php require_once(dirname(__FILE__) . "/../dataBase/dataBase.php"); ?>

<?php
session_start();

$grade = $_POST['grade'];
$username = $_POST['user'];
$course = $_POST['course'];

$db = DataBase::Instance();
$db->connect();
$db->setGradeStudent($username, $grade, $course);

$_SESSION['add']="<div class=\"alert alert-success\" id=\"alertSucess\" role=\"alert\">Avaliou o estudante ".$username." com ".$grade." valores no curso de ".$course."</div>";

header("Location:../alunos.php");
exit();

?>