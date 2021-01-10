<?php
/** $_SESSION
 * errorForm = 1 -> Username already exists
 */
require_once(dirname(__FILE__) . "/../dataBase/dataBase.php"); ?>

<?php
session_start();

if (!empty($_POST['criaConta'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $role = intval($_POST['role']);
    $userName = $_POST['userName'];

    $db = DataBase::Instance();
    $db->connect();
    $exists = $db->usernameExists($userName);
    $row = pg_fetch_assoc($exists);
    if(empty($row)){
        $db->addUser($name, $email, $role, $userName, password_hash('teste', PASSWORD_DEFAULT));
        if($role == 0){
            $db->addStudent($userName);
        }
        $_SESSION['add']="<div class=\"alert alert-success\" id=\"alertSucess\" role=\"alert\">Foi adicionado o user corretamente</div>";
    }else{
        $_SESSION['errorForm']=1;
        $_SESSION['name']=$name;
        $_SESSION['email']=$email;
        if($role==0){
            $_SESSION['roleSelect'][0]='selected=""';
        }else if($role==1){
            $_SESSION['roleSelect'][1]='selected=""';
        }else if($role==2){
            $_SESSION['roleSelect'][2]='selected=""';
        }
        $_SESSION['username']=$userName;
    }

}

header("Location:../users.php");
exit();
?>