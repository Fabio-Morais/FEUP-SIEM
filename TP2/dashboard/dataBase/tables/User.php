<?php
class User{

    public function __construct()
    {
    }
    /**
     * Return all the user info
     */
    public function getUserInfo($conn){
        $query = "select * from Userr;";
        $result = pg_exec($conn, $query);
        return $result;
    }
}

?>