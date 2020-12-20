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
    
    /**
     * Edit user info
     */
    public function editUserInfo($conn,$originalUser, $user){
        $query = "UPDATE userr set username = '".$user->userName."' , name = '".$user->name."', email = '".$user->email."',phone= '".$user->phone."', image = '".$user->image."', nif = '".$user->nif."',birthDate = '".$user->birthDate."' WHERE username='".$originalUser."'";
        $result = pg_exec($conn, $query);
        return $result;
    }
        
    /**
     * Ass user
     */
    public function addUser($conn, $name, $email, $role, $username){
        $query = "INSERT INTO userr (name, email, role,username ) VALUES('".$name."', '".$email."', ".$role.", '".$username."') ";
        $result = pg_exec($conn, $query);
        return $result;
    }

        /**
     * Ass user
     */
    public function deleteUser($conn,$username){
        $query = "DELETE FROM userr WHERE username='".$username."'";
        $result = pg_exec($conn, $query);
        return $result;
    }
    /**
     * Confirm if the username already exists
     */
    public function usernameExists($conn,$username){
        $query = "Select * from userr where username='".$username."';";
        $result = pg_exec($conn, $query);
        return $result;
    }

}

?>