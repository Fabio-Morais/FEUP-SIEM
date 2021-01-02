<?php


class Chat
{
    public function __construct()
    {
    }

    /**
     * Add a message
     */
    public function insertMessage($conn, $message, $from, $to)
    {
        $query = "INSERT INTO explicafeup.chat (message, userFrom, userTo) VALUES ('".$message."','".$from."','".$to."')";
        $result = pg_exec($conn, $query);
        return $result;
    }
    /**
     * Add a message
     */
    public function getAllMessagesFromUser($conn, $username, $recipient)
    {
        $query = "SELECT * FROM explicafeup.chat WHERE (userfrom='".$username."' and userTo ='".$recipient."') or (userto='".$username."' and userfrom='".$recipient."') ORDER BY id";
        $result = pg_exec($conn, $query);
        return $result;
    }
    /**
     * Add a message
     */
    public function getLengthAllMessagesFromUser($conn, $username, $recipient)
    {
        $query = "SELECT count(*) FROM explicafeup.chat WHERE (userfrom='".$username."' and userTo ='".$recipient."') or (userto='".$username."' and userfrom='".$recipient."')";
        $result = pg_exec($conn, $query);
        return $result;
    }
    /**
     * Add a message
     */
    public function getAllMessagesFromUserStartId($conn, $username, $recipient, $id)
    {
        $query = "SELECT * FROM explicafeup.chat WHERE ((userfrom='".$username."' and userTo ='".$recipient."') or (userto='".$username."' and userfrom='".$recipient."')) and id > $id ORDER BY id";
        $result = pg_exec($conn, $query);
        return $result;
    }
    /**
     * Set to already read
     */
    public function setMessageToAlreadyRead($conn, $username, $recipient)
    {
        $query = "UPDATE explicafeup.chat SET itwasread=true WHERE ((userfrom='".$username."' and userTo ='".$recipient."') or (userto='".$username."' and userfrom='".$recipient."'))";
        $result = pg_exec($conn, $query);
        return $result;
    }

    /**
     * view all messages that are unread group by users
     */
    public function getCountOfUnreadMessages($conn, $username)
    {
        $query = "SELECT count(*), userfrom FROM explicafeup.chat WHERE userTo='".$username."' and itwasread=false GROUP BY userfrom";
        $result = pg_exec($conn, $query);
        return $result;
    }
}
?>