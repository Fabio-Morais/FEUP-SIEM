<?php
/**
* Se aux = 0 -> aluno
* Se aux = 1 -> professor
* Se aux = 2 -> admin
*/
$debug=true;
if(!$debug){
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

/*PARA DEBUG*/
$aux['username']="fabiouds";
$aux['role']=2;

}

?>