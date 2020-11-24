<?php
class User{

    public function __construct()
    {
    }
    /**
     * Return all the user info
     */
    public function getAllUsers($conn){
        $query = "select * from Userr;";
        $result = pg_exec($conn, $query);
        return $result;
    }
     /**
     * Return user info
     */
    public function getUser($conn, $username){
        $query = "select * from Userr WHERE username='".$username."';";
        $result = pg_exec($conn, $query);
        return $result;
    }

         /**
     * Return user info
     */
    public function ins($conn, $data){
        $query = "UPDATE userr set image = '".$data."' where username = 'fabio123'";
        $result = pg_exec($conn, $query);
        return $result;
    }
}

?>