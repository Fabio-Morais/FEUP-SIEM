<?php
session_start();
require "../../configuration.php";
require_once(dirname(__FILE__) . "/../dataBase/dataBase.php");

unset($_SESSION['regerror']);
unset($_SESSION['usererror']);
unset($_SESSION['passerror']);
$username = $_POST['user'];
$password = $_POST['password'];
$password_confirm = $_POST['confirmarpassword'];
$email = $_POST['email'];
$name = $_POST['name'];
$nif = $_POST['nif'];
$phone = $_POST['phone'];
$hash = password_hash($_POST['password'], PASSWORD_DEFAULT);

if ($_GET['course'] == "c/c  ")
    $productname = "c/c++";
else
    $productname = $_GET['course'];

if ($password !== $password_confirm) {
	$_SESSION['passerror'] = TRUE;
	header("location: ../../register.php?course=".$productname."");
	exit();
}

$query = "SELECT * FROM userr WHERE username = '$username'";
$result = pg_exec($query);
if(pg_num_rows($result) > 0){
	$_SESSION['usererror'] = TRUE;
	header("location: ../../register.php?course=".$productname."");
	exit();
}

if (empty($username) || empty($password) || empty($name))
	{
	$_SESSION['regerror'] = TRUE;
	header("location: ../../register.php?course=".$productname."");
	exit();
} else{
    $db = DataBase::Instance();
    $db->connect();
    $db->addUserStudent($name, $email, $username, $hash, $phone, $nif);
    $db->addStudent($username);
    $db->addOrder($productname, $username);
    $db->enrollStudent($username, $productname);

    $_SESSION['user'] = $username;
    $_SESSION['login'] = TRUE;

    header("location: ../index.php");
}
?>