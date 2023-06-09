<?php
    include "../connect/connect.php";
    $youName = $_POST['youName'];
    $youPhone = $_POST['youPhone'];
    $sql = "SELECT youEmail, youName, youPass FROM plantyMember WHERE youName = '$youName' AND youPhone = '$youPhone'";
    $result = $connect -> query($sql);
    
?>
<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>로그인 찾기 완료 페이지</title>
   <!-- CSS -->
   <?php include "../include/head.php" ?>
</head>
<body class="bgStyle1">
    
    <?php include "../include/skip.php" ?>
    <!-- //skip -->

    <?php include "../include/header.php" ?>
    <!-- //header -->

    <main id="main" class="container login__container">
        <div class="login btStyle bmStyle">
            <div class="login__inner mb80">
                <div class="logo">PLANTY</div>
                <h2 class="mb20">아이디 찾기</h2>
                <div>
                    <form action="#" name="#" method="post">
                        <fieldset>
                            <legend class="blind">아이디 찾기 완료</legend>
                            <p class="mt30 mb30">
                                <?php
                                if($result){
                                    $count = $result -> num_rows;
                                    if($count == 0){
                                        echo('이름 또는 전화번호가 잘못되었습니다. 다시 한번 확인해주세요');
                                    } else {
                                        $memberInfo = $result -> fetch_array(MYSQLI_ASSOC);
                                        echo $youName . "님의 아이디는 " . $memberInfo['youEmail'] . "입니다.";
                                    };
                                }   
                                ?>
                            </p>
                            <button type="submit" class="btnStyle2_login btnStyle2 mt20 mb30 "><a href="login.html">로그인</a></button>
                            <div class="login_more mt10 btStyle">
                                    <span><a href="searchPass.php">비밀번호 찾기</a></span>
                                    <span><a href="../join/joinAgree.php">회원가입</a></span>
                            </div>
                        </fieldset>
                    </form>
                </div>
                <div class="login__footer">

                </div>
            </div>
        </div>
    </main>
    <!-- //main -->


    <?php include "../include/footer_min.php" ?>
    <!-- //footer -->

</body>

</html>