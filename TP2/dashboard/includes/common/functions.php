<?php
function getImage($row)
{
    $avatar = "avatar.png";
    if (!isset($row['image']) || $row['image']==null) {
        if ($row['gender'] == 'f')
            $avatar = "avatarGirl.png";
    } else {
        $avatar = "users/" . $row['image'];
    }
    return $avatar;
}

function role($var)
{
    if ($var == 0) {
        return "Aluno";
    } else if ($var == 1) {
        return "Professor";
    } else if ($var == 2) {
        return "Admin";
    }
};

/**
* AULA.PHP
 */

function getYouTubeThumbnailImage($video_id) {
    return "http://i3.ytimg.com/vi/$video_id/hqdefault.jpg";
}

function extractVideoID($url){
    $regExp = "/^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#\&\?]*).*/";
    preg_match($regExp, $url, $video);
    return $video[7];
}

function clean($string) {
    $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

    return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}
function chooseTitle($title2){
    switch ($title2) {
        case "alunos.php":
            $title = "alunos";
            break;
        case "chat.php":
            $title = "chat";
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
        case "index.php":
            $title = "dashboard";
            break;
        case "perfil.php":
            $title = "perfil";
            break;
        case "editUser.php":
            $title = "editar user";
            break;
        default:
            $title = "";
            break;
    }
    return $title;
}

?>