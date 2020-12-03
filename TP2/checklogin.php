<?php
session_start();
require "configuration.php";

$user = $_POST['user'];
$password = $_POST['password'];


$query = "SELECT * FROM userr WHERE username = '$user'";
$result = pg_exec($query);

if(pg_num_rows($result) > 0){
	$data = pg_fetch_assoc($result);

	if(password_verify($password, $data['passhash'])){
		unset($_SESSION['error']);
		$_SESSION['user'] = $user;
		$_SESSION['password'] = $password;
		$_SESSION['login'] = TRUE;
 		header('location:dashboard/index.php');
		exit();
	}
	else{
		unset($_SESSION['user']);
		unset($_SESSION['password']);
		$_SESSION['error'] = TRUE;
		header('location:login.php');
		exit();
	}
}
else{
  unset($_SESSION['user']);
  unset($_SESSION['password']);
  $_SESSION['error'] = TRUE;
  header('location:login.php');
  exit();
}

?>