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
        if($user->birthDate =="")
            $query = "UPDATE userr set  name = '".$user->name."', email = '".$user->email."',phone= '".$user->phone."', image = '".$user->image."', nif = '".$user->nif."',about = '".$user->about."',hobbies = '".$user->hobbies."',gender = '".$user->gender."' WHERE username='".$originalUser."'";
        else if(!empty($user->image))
            $query = "UPDATE userr set  name = '".$user->name."', email = '".$user->email."',phone= '".$user->phone."', image = '".$user->image."', nif = '".$user->nif."',birthDate = '".$user->birthDate."',about = '".$user->about."',hobbies = '".$user->hobbies."',gender = '".$user->gender."' WHERE username='".$originalUser."'";
        else
            $query = "UPDATE userr set  name = '".$user->name."', email = '".$user->email."',phone= '".$user->phone."', nif = '".$user->nif."',birthDate = '".$user->birthDate."',about = '".$user->about."',hobbies = '".$user->hobbies."',gender = '".$user->gender."' WHERE username='".$originalUser."'";
        $result = pg_exec($conn, $query);
        return $result;
    }
        
    /**
     * Add user
     */
    public function addUser($conn, $name, $email, $role, $username){
        $query = "INSERT INTO userr (name, email, role, username) VALUES('".$name."', '".$email."', ".$role.", '".$username."') ";
        $result = pg_exec($conn, $query);
        return $result;
    }

    /**
     * Delete user
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
    /**
     * Add background color to the user
     */
    public function addUserColor($conn,$username, $color){
        $query = "UPDATE userr set color ='".$color."' WHERE username='".$username."' ;";
        $result = pg_exec($conn, $query);
        return $result;
    }

    /**
     * Change the password of user
     */
    public function changePassword($conn,$username, $passwordHash){
        $query = "UPDATE userr set passHash ='".$passwordHash."' WHERE username='".$username."' ;";
        $result = pg_exec($conn, $query);
        return $result;
    }

    /**
     * Add user as student
     */
    public function addUserStudent($conn, $name, $email, $username, $passhash, $phone, $nif){
        $query = "INSERT INTO userr (name, email, role, username, passhash, phone, nif) VALUES('".$name."', '".$email."', 0, '".$username."', '".$passhash."', '".$phone."', '".$nif."') ";
        $result = pg_exec($conn, $query);
        return $result;
    }
}

?>