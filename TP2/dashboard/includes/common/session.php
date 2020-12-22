<?php
require_once(dirname(__FILE__) . "/alerts.php");

/**
* Se aux = 0 -> aluno
* Se aux = 1 -> professor
* Se aux = 2 -> admin
*/
$debug=true;
$aux['role']="1";
$aux['username']="admin";
if($debug){
    include_once(dirname(__FILE__) . "../../../dataBase/dataBase.php");
    session_start();
    $db = DataBase::Instance();
    $_SESSION['user']="fabio123";
    if ($db->connect()) {
        $auxQuery = $db->getUser($_SESSION['user']);
        $connected = true;
        $aux= pg_fetch_assoc($auxQuery);
    } else{
        Alerts::showError(Alerts::DATABASEOFF);
        $aux['role']="1";
        $aux['username']="fabiouds";
    }

}else{

    include_once(dirname(__FILE__) . "../../../dataBase/dataBase.php");
    session_start();
    $db = DataBase::Instance();
    $aux = "";
    if ($db->connect()) {
        $auxQuery = $db->getUser($_SESSION['user']);
        $connected = true;
        $aux= pg_fetch_assoc($auxQuery);
    } else
        Alerts::showError(Alerts::DATABASEOFF);

}

?>