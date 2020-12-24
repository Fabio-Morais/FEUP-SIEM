<?php require_once(dirname(__FILE__) . "/../dataBase/dataBase.php"); ?>
<?php
session_start();
print_r($_POST);

$db = DataBase::Instance();
$connected = $db->connect();

$username= $_SESSION['user'];
$db->addOrder($_POST['price'][0],$_POST['course'][0], $username);


header("Location:../thankYou.php");
exit();
?>