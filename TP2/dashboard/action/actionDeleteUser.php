<?php require_once(dirname(__FILE__) . "/../dataBase/dataBase.php"); ?>

<?php
session_start();



$userName = $_GET['username'];

$db = DataBase::Instance();
$db->connect();
$db->deleteUser($userName);
$_SESSION['add']="<div class=\"alert alert-success\" id=\"alertSucess\" role=\"alert\">O user ".$userName." foi eliminado corretamente</div>";


header("Location:../users.php");
exit();
?>