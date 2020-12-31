<?php require_once(dirname(__FILE__) . "/../dataBase/dataBase.php"); ?>

<?php

$db = DataBase::Instance();
$connected = $db->connect();
if($connected) {
    $messagesQuery = $db->getAllMessagesFromUser($_GET['userFrom'], $_GET['userTo']);
    $userQuery = $db->getUser($_GET['userFrom']);
    $user = pg_fetch_assoc($userQuery);
    $userQuery2 = $db->getUser($_GET['userTo']);
    $user2 = pg_fetch_assoc($userQuery2);
    $i=0;
    while($messages[$i++] = pg_fetch_assoc($messagesQuery));
    array_splice($messages, --$i, 1);
}
echo json_encode([$user, $messages,$user2]);

?>