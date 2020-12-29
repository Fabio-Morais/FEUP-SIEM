<?php require_once(dirname(__FILE__) . "/templates/common/header.php"); ?>
<div class="container p-5 " >
<div class=" text-center m-5 p-5     ">
    <img src="public/img/icon.png">
    <h1 class="display-3 p-2  ">Obrigado!</h1>
    <p class="lead p-5  ">Os cursos comprados foram adicionados à sua conta.</p>
    <hr class="my-4">
    <p class="lead">
        <a class="btn btn-primary " href="index.php" role="button">Continuar para a dashboard</a>
    </p>
</div>
</div>
<?php require_once(dirname(__FILE__) . "/templates/common/footer.php"); ?>
<script>
    function createCookie(cname, cvalue, exdays, dayMinute) {
        var d = new Date();
        if (dayMinute == "day")
            d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        else if (dayMinute == "minute")
            d.setTime(d.getTime() + (exdays * 60 * 1000));

        var expires = "expires=" + d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }
    createCookie('cartCookie', "",1, "day");
</script>
