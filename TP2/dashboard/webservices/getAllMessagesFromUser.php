<?php
/**
 * @param- GET['Option'] = 1-> Get all messages and users information
 * @param- GET['Option'] = 2-> get number of messages corresponding to that user
 */
require_once(dirname(__FILE__) . "/../dataBase/dataBase.php"); ?>

<?php

$db = DataBase::Instance();
$connected = $db->connect();
if($connected) {
    $userQuery = $db->getUser($_GET['userFrom']);
    $user = pg_fetch_assoc($userQuery);
    $userQuery2 = $db->getUser($_GET['userTo']);
    $user2 = pg_fetch_assoc($userQuery2);
    if($_GET['option']==1){
        $messagesQuery = $db->getAllMessagesFromUser($_GET['userFrom'], $_GET['userTo']);
        $i=0;
        while($messages[$i++] = pg_fetch_assoc($messagesQuery));
        array_splice($messages, --$i, 1);
        echo json_encode([$user, $messages,$user2]);
    }else if($_GET['option']==2){
        $messagesQuery = $db->getAllMessagesFromUserStartId($_GET['userFrom'], $_GET['userTo'], $_GET['id']);
        $i=0;
        while($messages[$i++] = pg_fetch_assoc($messagesQuery));
        array_splice($messages, --$i, 1);
        echo json_encode([$user, $messages,$user2]);
    }

}

?>