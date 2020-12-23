<?php

session_start();

    if(isset($_SESSION['login']) && $_SESSION['login'] == TRUE){
    } else{
    header('Location: ../login.php');

    }
?>

<?php require_once(dirname(__FILE__) . "/../../access.php"); ?>


<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>ExplicaFeup - Dashboard</title>
    <link href="public/css/styles.css" rel="stylesheet" />
    <link href="public/css/cart/style.css" rel="stylesheet" />

    <link href="public/css/main.css" rel="stylesheet" />
    <link href="public/css/profile.css" rel="stylesheet" />
    <!--Get the title of the page-->
    <?php $title = basename($_SERVER['SCRIPT_NAME']);  ?>

    <?php if ($title == "comprar_curso.php") : ?>
        <!-- custom style -->
        <link href="public/css/ui.css" rel="stylesheet" type="text/css" />
        <link href="public/css/responsive.css" rel="stylesheet" media="only screen and (max-width: 1200px)" />
    <?php endif; ?>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>


</head>