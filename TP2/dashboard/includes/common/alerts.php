<?php
abstract class Alerts{
    const DATABASEOFF = "Sem acesso à base de dados. É necessário ligar a VPN da FEUP ";

    public function __construct()
    {
    }

    public static function showError($string){


        echo "<div class = \"alert alert-danger alert-dismissable\">";
        echo "<button type = \"button\" class = \"close\" data-dismiss = \"alert\" aria-hidden = \"true\">";
        echo "    &times;";
        echo " </button>";
        echo $string;
        echo "</div>";
    }

}

?>