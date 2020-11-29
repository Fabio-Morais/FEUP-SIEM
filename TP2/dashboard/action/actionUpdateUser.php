<?php require_once(dirname(__FILE__) . "/../dataBase/dataBase.php"); ?>
<?php 

class FormulUser{
    public $userName;
    public $name;
    public $email;
    public $image;
    public $nif;
    public $phone;
    public $birthDate;
    public $password;
    public $password2;

}


if (!empty($_POST['Guardar'])) {
    $originalUser = $_GET['originalUser'];

    $user = new FormulUser();
    $user->userName = $_POST['username'];
    $user->name = $_POST['name'];
    $user->email = $_POST['email'];
    $user->nif = $_POST['nif'];
    $user->phone = $_POST['phone'];
    $user->birthDate = $_POST['birthDate'];
    $user->image = $_FILES['image']['name'];

    $db = DataBase::Instance();
    $db->connect();
    $users = $db->editUserInfo($originalUser, $user);



    print($user->userName."<br>");
    print($user->name."<br>");
    print($user->email."<br>");
    print($user->image."<br>");
    print($user->nif."<br>");
    print($user->birthDate."<br>");
    print($user->password."<br>");

}
header("Location:../users.php");
exit();
?>