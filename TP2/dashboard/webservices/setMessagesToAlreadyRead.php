<?php require_once(dirname(__FILE__) . "/../dataBase/dataBase.php"); ?>

<?php

$db = DataBase::Instance();
$connected = $db->connect();
if($connected) {
    $db->setMessageToAlreadyRead($_GET['userFrom'], $_GET['userTo']);
    echo true;
}else
    echo false;
?>