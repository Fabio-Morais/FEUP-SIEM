<?php require_once(dirname(__FILE__) . "/../dataBase/dataBase.php"); ?>

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
        $db->addUser($name, $email, $role, $userName);
        $_SESSION['add']="<div class=\"alert alert-success\" id=\"alertSucess\" role=\"alert\">Foi adicionado o user corretamente</div>";
    }else{
        $_SESSION['errorForm']=1;
        $_SESSION['name']=$name;
        $_SESSION['email']=$email;
        $_SESSION['role'][0]="";
        $_SESSION['role'][1]="";
        $_SESSION['role'][2]="";
        if($role==0){
            $_SESSION['role'][0]='selected=""';
        }else if($role==1){
            $_SESSION['role'][1]='selected=""';
        }else if($role==2){
            $_SESSION['role'][2]='selected=""';
        }

        $_SESSION['username']=$userName;
    }




}

header("Location:../users.php");
exit();
?>