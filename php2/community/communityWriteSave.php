<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    $memberID = $_SESSION['memberID'];
    $commuAuthor = $_SESSION['youNick'];
    $commuCategory = $_POST['commuCategory'];
    $commuTitle = $_POST['commuTitle'];
    $commuContents = nl2br($_POST['commuContents']);
    $commuView = 1;
    $commuLike = 0;
    $regTime = time();
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
                $sql = "INSERT INTO plantyCommu(memberID, commuTitle, commuContents, commuCategory, commuAuthor, commuView, commuLike, commuImgFile, commuImgSize, commuDelete, commuRegTime) VALUES('$memberID', '$commuTitle', '$commuContents', '$commuCategory', '$commuAuthor', '$commuView', '$commuLike', '$commuImgName', '$commuImgSize', '0', '$regTime')";
            } else {
                echo "<script>alert('이미지 파일이 아닙니다1.')</script>";
            }
        } else {
        }
    } else {
        echo "이미지 파일을 첨부하지 않았습니다.";
        $sql = "INSERT INTO plantyCommu(memberID, commuTitle, commuContents, commuCategory, commuAuthor, commuView, commuLike, commuImgFile, commuImgSize, commuDelete, commuRegTime) VALUES('$memberID', '$commuTitle', '$commuContents', '$commuCategory', '$commuAuthor', '$commuView', '$commuLike', 'Img_default.jpg', '$commuImgSize', '0', '$regTime')";
    }

    // 이미지 사이즈 확인
    if($commuImgSize > 10000000){
        echo "<script>alert('이미지 파일 용량이 1메가를 초과했습니다.')</script>";
    }

    $result = $connect -> query($sql);
    $result = move_uploaded_file($commuImgTmp, $commuImgDir.$commuImgName);

    Header("Location: community.php");
?>