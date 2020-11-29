<?php require_once(dirname(__FILE__) . "/../dataBase/dataBase.php"); ?>

<?php

if (!empty($_POST['criaConta'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $role = intval($_POST['role']);
    $userName = $_POST['userName'];


    $db = DataBase::Instance();
    $db->connect();
    $db->addUser($name, $email, $role, $userName);




}   

header("Location:../users.php");
exit();
?>