<?php
    // $host = "localhost",
    // $user = "richclub9",
    // $pw = "forever0",
    // $db = "richclub9",
    // $connect = new mysqli($host, $user, $pw, $db);
    // $connect -> set_charset("utf-8");
    // if(mysqli_connect_errno()){
    //     echo "Database Connect false";
    // } else {
    //     echo "Database Connect True"
    // }
?>
<?php
    $host = "localhost";
    $user = "root";
    $pw = "root";
    $db = "phpclass";
    $connect = new mysqli($host, $user, $pw, $db);
    $connect -> set_charset("utf-8");
    if(mysqli_connect_errno()){
        echo "Database Connect false";
    } else {
        //echo "Database Connect True";
    }
?>