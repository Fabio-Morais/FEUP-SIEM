<?php
session_start();
require "configuration.php";

$username = $_POST['user'];
$password = $_POST['password'];
$password_confirm = $_POST['confirmarpassword'];
$email = $_POST['email'];
$name = $_POST['name'];
$nif = $_POST['nif'];
$hash = password_hash($_POST['password'], PASSWORD_DEFAULT);

if ($password !== $password_confirm) {
	$_SESSION['passerror'] = TRUE;
	header("location: register.php");
	exit();
}

if (empty($username) || empty($password) || empty($email) || empty($name) || empty($nif))
	{
	$_SESSION['error'] = TRUE;
	echo "erro";
	header("location: register.php");
	exit();
} else{
	$query = "INSERT INTO userr (username, email, passhash, name, nif, role) 
              VALUES ('$username', '$email', '$hash', '$name', $nif, 0)";
	pg_exec($query);
    $_SESSION['user'] = $username;
    $_SESSION['password'] = $password;
    $_SESSION['login'] = TRUE;
    header("location: dashboard/index.php");
}
?>