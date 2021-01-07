<?php
include_once(dirname(__FILE__) . "/../../includes/common/functions.php");
$title = basename($_SERVER['SCRIPT_NAME']);
?>

<div class="container-fluid ">
    <h1 class="mt-4 text-left ml-5 mb-2 text-capitalize"><?php echo chooseTitle($title) ?></h1>
    <ol class="breadcrumb mb-4 ml-5">
        <li class="breadcrumb-item "><a href="index.php">Dashboard</a></li>
        <li class="breadcrumb-item active text-capitalize"><?php echo chooseTitle($title) ?></li>
    </ol>
   