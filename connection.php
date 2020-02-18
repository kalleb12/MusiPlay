<?php
/*
try {
    $link = new PDO("mysql:host=elevarbetensys.se.mysql;port=:3306;dbname=elevarbetensys_se_eleverbeten_se_sy17km17", "elevarbetensys_se_eleverbeten_se_sy17km17", "SY17KM17");

} catch (\Exception $e) {
    echo ">There was an error connecting to the server.";
    exit();
}
*/

try {
    $pdo = new PDO("mysql:host=localhost;dbname=musiplay", "root", "mypass");
} catch (\Exception $e) {
    echo "There was an error connecting to the server.";
    exit();
}


                       