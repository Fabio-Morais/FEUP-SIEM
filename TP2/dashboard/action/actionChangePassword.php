<?php
/** $_SESSION
 * errorForm = 1 -> Password don't check with the dataBase
 * add -> mensagem para o user
 */
require_once(dirname(__FILE__) . "/../dataBase/dataBase.php"); ?>

<?php
session_start();


$userName = $_GET['username'];
$db = DataBase::Instance();
$connected = $db->connect();
if($connected){
    if (!empty($_POST['buttonChange'])) {
        $passwordOld = $_POST['passwordOld'];
        $password = $_POST['password'];
        $password2 = $_POST['password2'];

        $db = DataBase::Instance();
        $db->connect();
        $user = $db->getUser($userName);
        $row = pg_fetch_assoc($user);
        /*Check if password is correct*/
        if(password_verify($passwordOld, $row['passhash'])){
            echo "entrou";
            $db->changePassword($userName, password_hash($_POST['password'], PASSWORD_DEFAULT));
            $_SESSION['add']="<div class=\"alert alert-success\" id=\"alertSucess\" role=\"alert\">A password foi alterada com sucesso!</div>";
        }else{
            echo "ripppp";
            $_SESSION['errorForm']=1;
            $_SESSION['errorText']="Password errada.";
            $_SESSION['errorPopUp']="<div class=\"alert alert-danger\" id=\"alertSucess\" role=\"alert\">Password incorreta!</div>";

        }
    }
}

header("Location:../perfil.php");
exit();
?>