<?php
include "../connect/connect.php";

$sql = "CREATE TABLE board2(";
$sql .= "boardID int(10) unsigned NOT NULL auto_increment,";
$sql .= "memberID int(10) NOT NULL,";
$sql .= "boardTitle varchar(100) NOT NULL,";
$sql .= "bo2ardContents longtext NOT NULL,";
$sql .= "boardView int(10) NOT NULL,";
$sql .= "regTime int(20) NOT NULL,";
$sql .= "PRIMARY KEY(boardID)";
$sql .= ") charset=utf8;";

$connect -> query($sql);
?>