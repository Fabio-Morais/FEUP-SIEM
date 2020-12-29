<?php
session_start();
require "../../configuration.php";
include_once(dirname(__FILE__) . "/../dataBase/dataBase.php");

unset($_SESSION['error']);
unset($_SESSION['errorInexistente']);
$user = $_POST['user'];
$password = $_POST['password'];
$db = DataBase::Instance();
$connected = false;

if ($db->connect()) {

    $query = $db->getUser($user);
    $connected = true;

} else
    Alerts::showError(Alerts::DATABASEOFF);

if(pg_num_rows($query) > 0){
    $data = pg_fetch_assoc($query);

    if(password_verify($password, $data['passhash'])){
        unset($_SESSION['error']);
        $_SESSION['user'] = $user;
        $_SESSION['password'] = $password;
        $_SESSION['role'] = $data['role'];
        $_SESSION['login'] = TRUE;
        if(!empty($_POST["remember"]))
        {
            $hour = time() + (86400 * 30);
            setcookie("user", $user, $hour, '/');
        }else {
            setcookie ("user", "", '/');
        }
        header('location: ../index.php');
        exit();
    }
    else{
        unset($_SESSION['user']);
        unset($_SESSION['password']);
        $_SESSION['error'] = TRUE;
        header('location: ../../login.php');
        exit();
    }
} else{
    unset($_SESSION['user']);
    unset($_SESSION['password']);
    $_SESSION['errorInexistente'] = TRUE;
    header('location: ../../login.php');
    exit();
}

?>