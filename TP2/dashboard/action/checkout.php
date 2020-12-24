<?php require_once(dirname(__FILE__) . "/../dataBase/dataBase.php"); ?>
<?php
session_start();
print_r($_POST);
$course = $_POST['course'];
$price = $_POST['price'];
$size = sizeof($course);

$db = DataBase::Instance();
$connected = $db->connect();
$username= $_SESSION['user'];

for($i = 0; $i < $size; $i++){
    $db->addOrder($price[$i],$course[$i], $username);
    $db->enrollStudent($username, $course[$i]);
}


header("Location:../thankYou.php");
exit();
?>