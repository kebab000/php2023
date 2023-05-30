<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>로그인 페이지</title>
     <!-- CSS -->
     <?php include "../include/head.php" ?>
</head>
<body class="bgStyle1">
<?php include "../include/skip.php" ?>
<!-- //skip -->
<?php include "../include/header.php" ?>
<!-- //header -->
    <main id="main" class="container">
        <div class="login__container">
            <div class="login btStyle bmStyle">
                <div class="login__inner mb60">
                    <div class="logo">PLANTY</div>
                    <h2 class="mb20">로그인</h2>
<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    $youEmail = $_POST['youEmail'];
    $youPass = $_POST['youPass'];
    // 데이터 조회
    $sql = "SELECT memberID, youEmail, youName, youPass, youNick, youPhone FROM plantyMember WHERE youEmail = '$youEmail' AND youPass = '$youPass'";
    $result = $connect -> query($sql);
    if($result){
        $count = $result -> num_rows;
        if($count == 0){
            echo('이메일 또는 비밀번호가 잘못되었습니다. 다시 한번 확인해주세요');
        } else {
            // 로그인 성공
            $memberInfo = $result -> fetch_array(MYSQLI_ASSOC);
            echo "<pre>";
            var_dump($memberInfo);
            echo "</pre>";
            // 세션 생성
            $_SESSION['memberID'] = $memberInfo['memberID'];
            $_SESSION['youEmail'] = $memberInfo['youEmail'];
            $_SESSION['youName'] = $memberInfo['youName'];
            $_SESSION['youNick'] = $memberInfo['youNick'];
            $_SESSION['youPhone'] = $memberInfo['youPhone'];
            Header("Location: ../main/main.php");
        };
    }
?>
                </div>
            </div>
        </div>
    </main>
    <!-- //main -->
    <?php include "../include/footer_min.php" ?>
    <!-- //footer -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</body>
</html>