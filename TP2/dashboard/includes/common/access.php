<?php
session_start();

$title = basename($_SERVER['SCRIPT_NAME']);
//role: 0-aluno, 1-professor, 2-admin

if(!isset($_SESSION['user'])&& $_SESSION['login'] == FALSE){
    header("Location: login.php" );
    exit();
}


/*SO PARA ADMIN*/
if ($title == "users.php" || $title == "estatisticas.php" || $title == "vendas.php") {
    if ($_SESSION['role'] != 2) {
        header("Location: templates/common/401.html" );
        exit();
    }
}/*SO PARA PROFESSOR*/ else if ($title ==  "alunos.php" ||  $title ==  "salario.php") {
    if ( $_SESSION['role'] != 1) {
        header("Location: templates/common/401.html");
        exit();
    }
}/*SO PARA ALUNOS*/ else if ($title ==  "aula.php" ||  $title ==  "notas.php" ||  $title ==  "comprar_curso.php" ||  $title ==  "historico.php" ||  $title ==  "comprar_curso.php" ||  $title ==  "carrinho.php" ||  $title ==  "thankYou.php") {
    if ( $_SESSION['role'] != 0) {
        header("Location: templates/common/401.html");
        exit();
    }
}

?>