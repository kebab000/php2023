<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원가입 완료</title>
        <!-- CSS -->
        <?php include "../include/head.php" ?>
</head>
<body class="bgStyle1">
<?php include "../include/skip.php" ?>
<!-- //skip -->
<?php include "../include/header.php" ?>
<!-- //header -->
    <main id="main" class="mt120 container">
        <div class="main__container">
            <div class="intro__inner mb40">
                <h2 class="intro__h2">PLANTY</h2>
                <h4>회원가입</h4>
            </div>
            <!-- join__inner -->
            <div class="join__inner">
                <div class="join__form">
                    <form action="../login/login.php" name="joinResult" method="post">
                        <fieldset>
                            <legend class="blind">회원가입 영역</legend>
                            <div class="join_end__desc">
                                
                            <?php
                                //메세지 출력
                                echo "<p>회원가입을 축하합니다. 로그인 해주세요</p>";
                              
                                include "../connect/connect.php";
                                $youEmail = $_POST['youEmail'];
                                $youName = $_POST['youName'];
                                $youNick = $_POST['youNick'];
                                $youPass = $_POST['youPass'];
                                $youPhone = $_POST['youPhone'];
                                $youQuestion = $_POST['youQuestion'];
                                $youAnswer = $_POST['youAnswer'];
                                $regTime = time();
                                $sql = "INSERT INTO plantyMember(youEmail, youName, youNick, youPass, youPhone, myImgName,youQuestion, youAnswer, regTime) VALUES('$youEmail', '$youName','$youNick', '$youPass', '$youPhone','Img_default.jpg', '$youQuestion','$youAnswer', '$regTime')";
                                $connect -> query($sql);
                            ?>
                            </div>
                            <button type="submit" class="btnStyle4">로그인</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <!-- //main -->
    <?php include "../include/footer_min.php" ?>
    <!-- //footer -->
</body>