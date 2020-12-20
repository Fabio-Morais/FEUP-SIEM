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

    /*Guarda imagem e envia para a db o nome do ficheiro  (user_USERNAME_FILEEXAMPLE.png) */
    $prefixo = 'user_'; // definir um prefixo apropriado para identificação
    $fileName = $prefixo .$user->userName."_". $_FILES['image']['name'];
    $fileName = str_replace(' ', '', $fileName);//remover os espaços para evitar erros
    $destino = '../public/img/users/' . $fileName;
    move_uploaded_file($_FILES["image"]["tmp_name"], $destino);//guarda imagem
    $user->image = $fileName;


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
/*Reencaminha para as paginas, dependendo de onde veio*/
if($_GET['page']== "perfil.php"){// edita perfil, vai para o perfil
    header("Location:../perfil.php");
    exit();
}else{
    header("Location:../users.php");
    exit();
}

?>