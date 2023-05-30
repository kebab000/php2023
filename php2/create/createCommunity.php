<?php
    include "../connect/connect.php";
    $sql = "CREATE TABLE plantyCommu (";
    $sql .= "commuID int(10) unsigned auto_increment,";
    $sql .= "memberID int(10) unsigned NOT NULL,";
    $sql .= "commuTitle varchar(255) NOT NULL,";
    $sql .= "commuContents longtext NOT NULL,";
    $sql .= "commuCategory varchar(40) NOT NULL,";
    $sql .= "commuAuthor varchar(20) NOT NULL,";
    $sql .= "commuView int(10) NOT NULL,";
    $sql .= "commuLike int(10) NOT NULL,";
    $sql .= "commuImgFile varchar(100) DEFAULT '',";
    $sql .= "commuImgSize varchar(100) DEFAULT NULL,";
    $sql .= "commuDelete int(10) NOT NULL,";
    $sql .= "commuRegTime int(10) NOT NULL,";
    $sql .= "commuModiTime int(10) DEFAULT NULL,";
    $sql .= "PRIMARY KEY (commuID)";
    $sql .= ") charset=utf8;";
    $connect -> query($sql);
    if($result){
        echo "create tables Complete";
    }else{
        echo "create tables false";
    }
?>