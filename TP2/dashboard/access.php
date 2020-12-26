<?php

require_once(dirname(__FILE__) . "/includes/common/session.php");

$title = basename($_SERVER['SCRIPT_NAME']);
$role = $aux['role']; //0-aluno, 1-professor, 2-admin


/*SO PARA ADMIN*/
if ($title == "users.php" || $title == "estatisticas.php") {
    if ($role != 2) {
        header("Location: templates/common/401.html" );
        exit();
    }
}/*SO PARA PROFESSOR*/ else if ($title ==  "alunos.php" ||  $title ==  "salario.php") {
    if ($role != 1) {
        header("Location: templates/common/401.html");
        exit();
    }
}/*SO PARA ALUNOS*/ else if ($title ==  "aula.php" ||  $title ==  "notas.php" ||  $title ==  "comprar_curso.php" ||  $title ==  "historico.php" ||  $title ==  "comprar_curso.php" ||  $title ==  "carrinho.php" ||  $title ==  "thankYou.php") {
    if ($role != 0) {
        header("Location: templates/common/401.html");
        exit();
    }
}
