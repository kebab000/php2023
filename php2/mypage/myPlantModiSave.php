<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    $memberID = $_SESSION['memberID'];
    $myPlantID = $_GET['myPlantID'];
    $prevImgFile = $_POST['prevImgFile'];
    $myPlantName = $_POST['myPlantName'];
    $myPlantKind = $_POST['myPlantKind'];
    $lastWater = $_POST['lastWater'];
    $placean = $_POST['placean'];
    $sunlight = $_POST['sunlight'];
    $wind = $_POST['wind'];
    $claychange = $_POST['claychange'];
    $nutrients = $_POST['nutrients'];
    $cut = $_POST['cut'];
    $significant = $_POST['significant'];
    
    $regTime = time();
    $myImgName = $_FILES['myImgName'];
    $myImgSize = $_FILES['myImgName']['size'];
    $myImgType = $_FILES['myImgName']['type'];
    $myImgTitle = $_FILES['myImgName']['name'];
    $myImgTmp = $_FILES['myImgName']['tmp_name'];

    //이미지 파일명 확인
    if($myImgType){
        $fileTypeExtension = explode("/", $myImgType);
        $fileType = $fileTypeExtension[0]; // image
        $fileExtension = $fileTypeExtension[1]; // jpeg
        
          // 이미지 타입 확인
          if($fileType == "image"){
            if($fileExtension == "jpg" || $fileExtension == "jpeg" || $fileExtension == "png" || $fileExtension == "gif"){
                $myImgDir = "myPlantImg/";
                $myImgName = "Img_".time().rand(1,99999)."."."{$fileExtension}";

                echo "이미지 파일이 맞습니다.";
                $sql = "UPDATE myPlant SET myPlantName = '{$myPlantName}', myPlantKind = '{$myPlantKind}', lastWater = '{$lastWater}',placean = '{$placean}',sunlight = '{$sunlight}',wind = '{$wind}',claychange = '{$claychange}',nutrients = '{$nutrients}',cut = '{$cut}',significant = '{$significant}', myImgName = '{$myImgName}', myImgSize = '{$myImgSize}' WHERE myPlantID = '{$myPlantID}'";
            } else {
                echo "<script>alert('이미지 파일이 아닙니다1.')</script>";
            }
        } else {
            echo "<script>alert('이미지 파일이 아닙니다2.')</script>";
        }
    } else {
        $sql = "UPDATE myPlant SET myPlantName = '{$myPlantName}', myPlantKind = '{$myPlantKind}', lastWater = '{$lastWater}',placean = '{$placean}',sunlight = '{$sunlight}',wind = '{$wind}',claychange = '{$claychange}',nutrients = '{$nutrients}',cut = '{$cut}',significant = '{$significant}', myImgName = '{$prevImgFile}', myImgSize = '{$myImgSize}' WHERE myPlantID = '{$myPlantID}'";
    }

    // 이미지 사이즈 확인
    if($myImgSize > 10000000){
        echo "<script>alert('이미지 파일 용량이 1메가를 초과했습니다.')</script>";
    }

    $result = $connect -> query($sql);
    $result = move_uploaded_file($myImgTmp, $myImgDir.$myImgName);


    Header("Location: myPlant.php");

?>