<?php
    include "../connect/connect.php";
    $sql= "create table plantyMember(";
    $sql .= "memberID int(10) unsigned auto_increment,";
    $sql .= "youEmail varchar(40) UNIQUE NOT NULL,";
    $sql .= "youName varchar(10) NOT NULL,";
    $sql .= "youNick varchar(10) NOT NULL,";
    $sql .= "youPass varchar(20) NOT NULL,";
    $sql .= "youPhone varchar(20),";
    $sql .= "youQuestion varchar(100),";
    $sql .= "youAnswer varchar(100),";
    $sql .= "blogImgName varchar(100) DEFAULT NULL,";
    $sql .= "blogImgSize varchar(100) DEFAULT NULL,";
    $sql .= "regTime int(40) NOT NULL,";
    $sql .= "PRIMARY KEY(memberID)";
    $sql .= ") charset=utf8;";
    $result= $connect->query($sql);
    if($result){
        echo "create trables Complete";
    }else{
        echo "create trables false";
    }
?>