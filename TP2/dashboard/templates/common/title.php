<?php 
$title = basename($_SERVER['SCRIPT_NAME']); 
switch ($title) {
    case "alunos.php":
        $title = "ALUNOS";
        break;
    case "aula.php":
        $title = "AULA";
        break;
    case "avaliacao.php":
        $title = "AVALIAÇÃO";
        break;
    case "comprar_curso.php":
        $title = "COMPRAR CURSOS";
        break;
    case "estatisticas.php":
        $title = "ESTATISTICAS";
        break;
    case "historico.php":
        $title = "HISTÓRICO";
        break;
    case "notas.php":
        $title = "NOTAS";
        break;
    case "salario.php":
        $title = "SALÁRIO";
        break;
    case "users.php":
        $title = "USERS";
        break;
}

?>

<div class="container-fluid">
    <h1 class="m-4 text-center"><?php echo $title ?></h1>
   