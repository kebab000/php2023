<?php
    $host = "localhost";
    $user = "kebab00";
    $pw = "joseph!0305";
    $db = "kebab00";
    $connect = new mysqli($host, $user, $pw, $db);
    $connect -> set_charset("utf-8");
    if(mysqli_connect_errno()){
        echo "Database Connect false";
    } else {
        echo "Database Connect True";
    }
?>