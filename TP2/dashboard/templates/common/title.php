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
    case "carrinho.php":
        $title = "Checkout";
        break;
}

?>

<div class="container-fluid">
    <h1 class="m-4 mb-5 p-3 text-center"><?php echo $title ?></h1>
   