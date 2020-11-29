<?php require_once(dirname(__FILE__) . "/../dataBase/dataBase.php"); ?>

<?php



$userName = $_GET['username'];

$db = DataBase::Instance();
$db->connect();
$db->deleteUser($userName);




header("Location:../users.php");
exit();
?>