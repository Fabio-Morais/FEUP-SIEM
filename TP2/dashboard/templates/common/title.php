<?php 
$title = basename($_SERVER['SCRIPT_NAME']); 
switch ($title) {
    case "alunos.php":
        $title = "alunos";
        break;
    case "aula.php":
        $title = "aula";
        break;
    case "comprar_curso.php":
        $title = "comprar cursos";
        break;
    case "estatisticas.php":
        $title = "Key performance indicators";
        break;
    case "historico.php":
        $title = "histórico";
        break;
    case "notas.php":
        $title = "notas";
        break;
    case "salario.php":
        $title = "salário";
        break;
    case "users.php":
        $title = "users";
        break;
    case "carrinho.php":
        $title = "checkout";
        break;
    case "vendas.php":
        $title = "histórico de vendas";
        break;
}

?>

<div class="container-fluid ">
    <h1 class="mt-4 text-left ml-5 mb-2 text-capitalize"><?php echo $title ?></h1>
    <ol class="breadcrumb mb-4 ml-5">
        <li class="breadcrumb-item "><a href="index.php">Dashboard</a></li>
        <li class="breadcrumb-item active text-capitalize"><?php echo $title ?></li>
    </ol>
   