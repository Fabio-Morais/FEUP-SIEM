<?php require_once(dirname(__FILE__) . "/../dataBase/dataBase.php"); ?>
<?php
session_start();

class FormulUser{
    public $userName;
    public $name;
    public $email;
    public $image;
    public $nif;
    public $phone;
    public $birthDate;
    public $about;
    public $hobbies;

}
$originalUser = $_GET['originalUser'];
$db = DataBase::Instance();
$connected = $db->connect();

if($connected){
    if (!empty($_POST['SaveColor'])) {
        $db->addUserColor($originalUser, $_POST['color']);
    }
    if (!empty($_POST['Guardar'])) {

        $user = new FormulUser();
        $user->name = $_POST['name'];
        $user->email = $_POST['email'];
        $user->nif = $_POST['nif'];
        $user->phone = $_POST['phone'];
        $user->birthDate = $_POST['birthDate'];
        $user->about = $_POST['about'];
        $user->hobbies = $_POST['hobbies'];

        $user->image="";
        /*Guarda imagem e envia para a db o nome do ficheiro  (user_USERNAME_FILEEXAMPLE.png) */
        if(!empty($_FILES['image']['name'])){
            $prefixo = 'user_'; // definir um prefixo apropriado para identificação
            $fileName = $prefixo .$user->userName."_". $_FILES['image']['name'];
            $fileName = str_replace(' ', '', $fileName);//remover os espaços para evitar erros
            $destino = '../public/img/users/' . $fileName;
            move_uploaded_file($_FILES["image"]["tmp_name"], $destino);//guarda imagem
            $user->image = $fileName;
        }

        $users = $db->editUserInfo($originalUser, $user);
        $_SESSION['add']="<div class=\"alert alert-success\" id=\"alertSucess\" role=\"alert\">Foi editado corretamente</div>";
    }
}

/*Reencaminha para as paginas, dependendo de onde veio*/
if($_GET['page']== "perfil.php"){// edita perfil, vai para o perfil
    header("Location:../perfil.php");
    exit();
}else{
    header("Location:../users.php");
    exit();
}

?>