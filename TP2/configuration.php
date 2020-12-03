<?php

$conn = pg_connect("host=db dbname=siem2013 user=siem2013 password=fabiofernando");
$query = "SET SCHEMA 'explicafeup'";
pg_exec($query);
// Check connection
    if(!$conn){
        echo "Ligaçãoo não foi bem estabelecida";
    }
?>