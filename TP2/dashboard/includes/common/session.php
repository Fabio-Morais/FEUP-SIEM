<?php
/**
* Se aux = 0 -> aluno
* Se aux = 1 -> professor
* Se aux = 2 -> admin
*/
$debug=false;
if($debug){
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