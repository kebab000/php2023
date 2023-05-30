<?php
    include "../connect/connect.php";
    include "../connect/session.php";

    $youName = $_POST['youName'];
    $youEmail = $_POST['youEmail'];
    $youNick = $_POST['youNick'];
    $youPhone = $_POST['youPhone'];
    $myImgName = $_FILES['myImgName'];
    $myImgSize = $_FILES['myImgName']['size'];
    $myImgType = $_FILES['myImgName']['type'];
    $myImgTitle = $_FILES['myImgName']['name'];
    $myImgTmp = $_FILES['myImgName']['tmp_name'];

    $memberID = $_SESSION['memberID'];
    
    $sql = "SELECT * FROM plantyMember WHERE memberID = '{$memberID}'";
    $result = $connect->query($sql);

    // echo "<pre>";
    // var_dump($myImgName);
    // echo "</pre>";

    if($result){
        $fileTypeExtension = explode("/", $myImgType);
        $fileType = $fileTypeExtension[0]; // image
        $fileExtension = $fileTypeExtension[1]; // jpeg
        
          // 이미지 타입 확인
          if($fileType == "image"){
            if($fileExtension == "jpg" || $fileExtension == "jpeg" || $fileExtension == "png" || $fileExtension == "gif"){
                $profileImgDir = "userPlofileImg/";
                $myImgTitle = "plofileImg_0"."{$memberID}"."."."{$fileExtension}";

                echo "이미지 파일이 맞습니다.";
                $sql = "UPDATE plantyMember SET youName = '{$youName}', youNick = '{$youNick}', youPhone = '{$youPhone}', myImgName = '{$myImgTitle}', myImgSize = '{$myImgSize}' WHERE memberID = '{$memberID}'";
            } else {
                echo "<script>alert('이미지 파일이 아닙니다111.')</script>";
            }
        } else {
            echo "<script>alert('이미지 파일이 아닙니다2222.')</script>";
        }
    } else {
        echo "이미지 파일을 첨부하지 않았습니다.";
        $sql = "UPDATE plantyMember SET youName = '{$youName}', youNick = '{$youNick}', youPhone = '{$youPhone}', myImgName = 'Img_default.jpg', myImgSize = '{$myImgSize}' WHERE memberID = '{$memberID}'";
    }

    // 이미지 사이즈 확인
    if($myImgSize > 10000000){
        echo "<script>alert('이미지 파일 용량이 1메가를 초과했습니다.')</script>";
    }

    $result = $connect -> query($sql);
    $result = move_uploaded_file($myImgTmp, $profileImgDir.$myImgTitle);
/////////////////////////////////////////////////////////////////////////////////////////////


    // if ($result) {
    //     $info = $result->fetch_array(MYSQLI_ASSOC);
    //     if ($info['memberID'] == $memberID){
    //         if($youNick == null || $youNick == ''){
    //             $sql = "UPDATE plantyMember SET youName = '{$youName}', youNick = '{$info['youNick']}', youPhone = '{$youPhone}' WHERE memberID = '{$memberID}'";
    //             $connect->query($sql);
    //         }
    //         if($youNick == null || $youNick == '' || $youPhone == null || $youPhone == ''){
    //             $sql = "UPDATE plantyMember SET youName = '{$youName}', youNick = '{$info['youNick']}', youPhone = '{$info['youPhone']}' WHERE memberID = '{$memberID}'";
    //             $connect->query($sql);
    //         }
    //         if($youName == null || $youName == ''){
    //             $sql = "UPDATE plantyMember SET youName = '{$info['youName']}', youNick = '{$youNick}', youPhone = '{$youPhone}' WHERE memberID = '{$memberID}'";
    //             $connect->query($sql);
    //         }
    //         if($youPhone == null || $youPhone == ''){
    //             $sql = "UPDATE plantyMember SET youName = '{$youName}', youNick = '{$youNick}', youPhone = '{$info['youPhone']}' WHERE memberID = '{$memberID}'";
    //             $connect->query($sql);
    //         }
    //         if($youName == null || $youName == '' || $youNick == null || $youNick == ''){
    //             $sql = "UPDATE plantyMember SET youName = '{$info['youName']}', youNick = '{$info['youNick']}', youPhone = '{$youPhone}' WHERE memberID = '{$memberID}'";
    //             $connect->query($sql);
    //         }
    //         if($youName == null || $youName == '' || $youPhone == null || $youPhone == ''){
    //             $sql = "UPDATE plantyMember SET youName = '{$info['youName']}', youNick = '{$youNick}', youPhone = '{$info['youPhone']}' WHERE memberID = '{$memberID}'";
    //             $connect->query($sql);
    //         }
    //         if($youName == null || $youName == '' || $youPhone == null || $youPhone == '' || $youNick == null || $youNick == ''){
    //             $sql = "UPDATE plantyMember SET youName = '{$info['youName']}', youNick = '{$info['youNick']}', youPhone = '{$info['youPhone']}' WHERE memberID = '{$memberID}'";
    //             $connect->query($sql);
    //         }
    //         $sql = "UPDATE plantyMember SET youName = '{$youName}', youNick = '{$youNick}', youPhone = '{$youPhone}' WHERE memberID = '{$memberID}'";
    //         $connect->query($sql);
    //     }
    // } else {
    //     echo "<script>alert('관리자 에러!!')</script>";
    // }
?>
<script>
    location.href = "../login/logout.php";
</script>