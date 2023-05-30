<?php
    $host = "localhost";
    $user = "jo0132";
    $pw = "wldud7872*";
    $db = "jo0132";
    $connect = new mysqli($host, $user, $pw, $db);
    $connect -> set_charset("utf-8");
    // if(mysqli_connect_errno()){
    //     echo "Database Connect false";
    // } else {
    //     echo "Database Connect True";
    // }
?>