<?php require_once(dirname(__FILE__) . "/../dataBase/dataBase.php"); ?>

<?php

$db = DataBase::Instance();
$connected = $db->connect();
if($connected) {
    $messagesQuery = $db->getCountOfUnreadMessages($_GET['userFrom']);
    $i=0;
    while($messages[$i++] = pg_fetch_assoc($messagesQuery));
    array_splice($messages, --$i, 1);
    echo json_encode($messages);
}
?>