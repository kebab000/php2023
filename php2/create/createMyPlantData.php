<?php
    include "../connect/connect.php";
    $sql = "CREATE TABLE myPlant (";
    $sql .= "myPlantID int(10) unsigned auto_increment,";
    $sql .= "memberID int(10) unsigned NOT NULL,";
    $sql .= "myPlantName varchar(255) NOT NULL,";
    $sql .= "myPlantKind varchar(255) NOT NULL,";
    $sql .= "lastWater varchar(50) NOT NULL,";
    $sql .= "placean varchar(100) NOT NULL,";
    $sql .= "sunlight varchar(100) NOT NULL,";
    $sql .= "wind varchar(100) NOT NULL,";
    $sql .= "claychange varchar(50) NOT NULL,";
    $sql .= "nutrients varchar(50) NOT NULL,";
    $sql .= "cut varchar(50) NOT NULL,";
    $sql .= "significant varchar(255) NOT NULL,";

    $sql .= "myImgName varchar(100) DEFAULT '',";
    $sql .= "myImgSize varchar(100) DEFAULT NULL,";
    $sql .= "myDelete int(10) NOT NULL,";
    $sql .= "myRegTime int(10) NOT NULL,";
    $sql .= "myModiTime int(10) DEFAULT NULL,";
    $sql .= "PRIMARY KEY (myPlantID)";
    $sql .= ") charset=utf8;";
    $connect -> query($sql);
    if($result){
        echo "create tables Complete";
    }else{
        echo "create tables false";
    }
?>