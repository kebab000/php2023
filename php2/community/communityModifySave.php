<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    $memberID = $_SESSION['memberID'];
    $commuID = $_POST['commuID'];
    $commuCategory = $_POST['commuCategory'];
    $commuTitle = $_POST['commuTitle'];
    $commuContents = nl2br($_POST['commuContents']);
    $regTime = time();
    $prevImgFile = $_POST['prevImgFile'];
    $commuImgFile = $_FILES['commuImgFile'];
    $commuImgSize = $_FILES['commuImgFile']['size'];
    $commuImgType = $_FILES['commuImgFile']['type'];
    $commuImgName = $_FILES['commuImgFile']['name'];
    $commuImgTmp = $_FILES['commuImgFile']['tmp_name'];


    //이미지 파일명 확인
    if($commuImgType){
        $fileTypeExtension = explode("/", $commuImgType);
        $fileType = $fileTypeExtension[0]; // image
        $fileExtension = $fileTypeExtension[1]; // jpeg
        
          // 이미지 타입 확인
          if($fileType == "image"){
            if($fileExtension == "jpg" || $fileExtension == "jpeg" || $fileExtension == "png" || $fileExtension == "gif"){
                $commuImgDir = "commuImg/";
                $commuImgName = "Img_".time().rand(1,99999)."."."{$fileExtension}";

                echo "이미지 파일이 맞습니다.";
                $sql = "UPDATE plantyCommu SET commuTitle = '{$commuTitle}', commuContents = '{$commuContents}',commuCategory ='{$commuCategory}',commuImgFile = '{$commuImgName}',commuImgSize = '{$commuImgSize}' WHERE commuID = '{$commuID}'";
            } else {
                echo "<script>alert('이미지 파일이 아닙니다1.')</script>";
            }
        } else {
            echo "<script>alert('이미지 파일이 아닙니다2.')</script>";
        }
    } else {
        echo "이미지 파일을 첨부하지 않았습니다.";
        $sql = "UPDATE plantyCommu SET commuTitle = '{$commuTitle}', commuContents = '{$commuContents}',commuCategory ='{$commuCategory}',commuImgFile = '{$prevImgFile}',commuImgSize = '{$commuImgSize}' WHERE commuID = '{$commuID}'";

    }

    // 이미지 사이즈 확인
    if($commuImgSize > 10000000){
        echo "<script>alert('이미지 파일 용량이 1메가를 초과했습니다.')</script>";
    }

    $result = $connect -> query($sql);
    $result = move_uploaded_file($commuImgTmp, $commuImgDir.$commuImgName);

    Header("Location: community.php");
?>
