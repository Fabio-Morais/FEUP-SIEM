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

$query = "SELECT * FROM userr WHERE username = '$username'";
$result = pg_exec($query);
if(pg_num_rows($result) > 0){
	$_SESSION['usererror'] = TRUE;
	header("location: register.php");
	exit();
}

if (empty($username) || empty($password) || empty($email) || empty($name) || empty($nif))
	{
	$_SESSION['error'] = TRUE;
	header("location: register.php");
	exit();
} else{
	$query = "INSERT INTO userr (username, email, passhash, name, nif, role) 
            	VALUES ('$username', '$email', '$hash', '$name', $nif, 0)";
	pg_exec($query);
	$query = "INSERT INTO orderr (deliverydate, purchasedate, price, productname, idstudent) 
				VALUES ('24-11-2020 12:47:19', '23-09-2020 11:47:19', '15', 'matematica', '$username')";
	pg_exec($query);
    $_SESSION['user'] = $username;
    $_SESSION['login'] = TRUE;
    header("location: dashboard/index.php");
}
?>