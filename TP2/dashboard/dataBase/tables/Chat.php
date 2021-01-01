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

}
?>