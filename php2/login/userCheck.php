<?php
    include "../connect/connect.php";
    // 변수 설정
    $type = $_POST['type'];
    $sql = "SELECT * FROM plantyMember ";
    if($type == "Check"){
        $youEmail = $connect -> real_escape_string(trim($_POST['youEmail']));
        $youName = $connect -> real_escape_string(trim($_POST['youName']));
        $sql .= "WHERE youEmail = '{$youEmail}' AND youName = '{$youName}'";
    }
    $result = $connect -> query($sql);
    $jsonResult = "bad";
    // 데이터 유무 확인
    if($result -> num_rows == 1){
        $jsonResult = "good";
    }
    echo json_encode(array("result" => $jsonResult));
?>