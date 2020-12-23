<?php
session_start();
require "../../configuration.php";

unset($_SESSION['regerror']);
unset($_SESSION['usererror']);
unset($_SESSION['passerror']);
$username = $_POST['user'];
$password = $_POST['password'];
$password_confirm = $_POST['confirmarpassword'];
$email = $_POST['email'];
$name = $_POST['name'];
$nif = $_POST['nif'];
$hash = password_hash($_POST['password'], PASSWORD_DEFAULT);

if ($password !== $password_confirm) {
	$_SESSION['passerror'] = TRUE;
	header("location: ../../register.php?course=".$_GET['course']."");
	exit();
}

$query = "SELECT * FROM userr WHERE username = '$username'";
$result = pg_exec($query);
if(pg_num_rows($result) > 0){
	$_SESSION['usererror'] = TRUE;
	header("location: ../../register.php?course=".$_GET['course']."");
	exit();
}

if (empty($username) || empty($password) || empty($name))
	{
	$_SESSION['regerror'] = TRUE;
	header("location: ../../register.php?course=".$_GET['course']."");
	exit();
} else{
	$query = "INSERT INTO userr (username, email, passhash, name, nif, role) 
            	VALUES ('$username', '$email', '$hash', '$name', '$nif', 0)";
	pg_exec($query);
    $_SESSION['user'] = $username;
    $_SESSION['login'] = TRUE;
    header("location: ../index.php");
}
?>