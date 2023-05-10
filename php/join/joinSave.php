<?php
    include "../connect/connect.php";
    $youEmail = $_POST['youEmail'];
    $youName = $_POST['youName'];
    $youPass = $_POST['youPass'];
    $youPassC = $_POST['youPassC'];
    $youPhone = $_POST['youPhone'];
    $regTime = time();
    //echo $youEmail, $youName, $youPass, $youPhone;
    // $sql = "INSERT INTO members(youEmail, youName, youPass, youPhone, regTime) VALUES('$youEmail', '$youName', '$youPass', '$youPhone', '$regTime')";
    // $connect -> query($sql);

    // // 이메일 유효성 검사
    // $check_mail = preg_match("/^[a-z0-9_+.-]+@([a-z0-9-]+\.)+[a-z0-9]{2,4}$/", $youEmail);

    // if($check_mail == false){
    //     echo = "이메일이 잘못되었습니다. 올바른 이메일을 작성해주세요"
    //     exit;
    // }
    // // 이름 유효성 검사 (정규식 표현 필요)
    // $check_name = preg_match("/^[가-힣]{3,5}$/", $youName);
    // if($check_name == false){
    //     echo = "이름은 한글로 3~5자만 가능합니다."
    //     exit;
    // }

    // // 비밀번호 유효성 검사
    // if($youPass !== $youPassC){
    //     echo = "비밀번호가 일치하지 않습니다."
    //     exit;
    // }

    //  사용자가 데이터를 입력함 - 유효성 검사 - 통과 - 회원가입(쿼리문 전송) 
    //  사용자가 데이터를 입력함 - 유효성 검사(이메일주소/핸드폰) - 통과(이메일주소/핸드폰)- 회원가입(쿼리문 전송) 
    //  사용자가 데이터를 입력함 - 유효성 검사X - 통과못함 - 회원가입못함(쿼리문 전송X) 

    // 이메일 유효성 검사
    // $check_mail = preg_match("/^[a-z0-9_+.-]+@([a-z0-9-]+\.)+[a-z0-9]{2,4}$/", $youEmail);
    
    // if($check_mail == false){
    //     echo "이메일이 잘못되었습니다";
    // } else {
    //     echo "이멜 is good~";
    // } 
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원가입 완료 페이지</title>

    <?php include "../include/head.php" ?>
    
</head>

<body class="gray">
    <?php include "../include/skip.php" ?>
        <!-- //skip -->
    <?php include "../include/header.php" ?>
    <!-- //header -->

    <main id="main" class="container">
        <div class="intro__inner center bmStyle">
            <picture class="intro__images">
                <img src="../assets/img/joinEnd01.png" alt="회원가입 이미지">
            </picture>
                <!-- 가입이 완료되었습니다. 환영합니다. <br> 로그인 해주세요. -->
                <?php
                    include "../connect/connect.php";
                    $youEmail = $_POST['youEmail'];
                    $youName = $_POST['youName'];
                    $youPass = $_POST['youPass'];
                    $youPassC = $_POST['youPassC'];
                    $youPhone = $_POST['youPhone'];
                    $regTime = time();

                    //메세지 출력
                    function msg($alert){
                        echo "<p class='intro__text'>$alert</p>";
                    };

                    // 이메일 유효성 검사
                    $check_mail = preg_match("/^[a-z0-9_+.-]+@([a-z0-9-]+\.)+[a-z0-9]{2,4}$/", $youEmail);
                    
                    if($check_mail == false){
                        msg ("이메일이 잘못되었습니다. 다시한번 확인해 주세요");
                        exit;
                    };
                    // 이름 유효성 검사
                    $check_name = preg_match("/^[가-힣]{9,15}+$/", $youName);

                    if($check_name == false){
                        msg ("이름은 3-5글자의 한글만 가능합니다. 다시한번 확인해 주세요");
                        exit;
                    };

                    if($youPass !== $youPassC){
                        msg ("비밀번호가 일치하지 않습니다. 다시한번 확인해 주세요");
                        exit;
                    };
                    // $youPass = sha1($youPass);

                    // 휴대폰 번호 유효성 검사

                    $check_number = preg_match("/^(010|011|016|017|018|019)-[0-9]{3,4}-[0-9]{4}$/",$youPhone);

                    if($check_number == false){
                        msg("번호가 정확하지 않습니다. 올바른 번호형식(000-0000-0000)으로 작성해 주세요");
                        exit; 
                    };

                    // 이메일 중복 검사
                    $isEmailCheck = false;

                    $sql = "SELECT youEmail FROM members WHERE youEmail = '$youEmail'";
                    $result = $connect -> query($sql);

                    if ($result){
                        $count = $result -> num_rows;

                        if($count == 0){
                            $isEmailCheck = true;
                        } else {
                            msg("이미 회원가입 되어 있습니다. 로그인 해주세요");
                            exit;
                        };
                    } else {
                        msg("에러발생1: 관리자에게 문의하세요");
                        exit;
                    };
                    // 휴대폰 중복 검사
                    $isPhoneCheck = false;

                    $sql = "SELECT youPhone FROM members WHERE youPhone = '$youPhone'";
                    $result = $connect -> query($sql);

                    if ($result){
                        $count = $result -> num_rows;

                        if($count == 0){
                            $isPhoneCheck = true;
                        } else {
                            msg("이미 회원가입 되어 있습니다. 로그인 해주세요");
                            exit;
                        };
                    } else {
                        msg("에러발생2: 관리자에게 문의하세요");
                        exit;
                    };
                    // 회원가입
                    if($isEmailCheck == true && $isPhoneCheck == true){
                        // 데이터 입력하기
                        $sql = "INSERT INTO members(youEmail, youName, youPass, youPhone, regTime) VALUES('$youEmail', '$youName', '$youPass', '$youPhone', '$regTime')";
                        $connect -> query($sql);
                        
                        if($result){
                            msg('회원가입을 축하합니다. 로그인 해주세요<div class="intro__btn"><a href="../login/login.php">로그인하기</a></div>');
                            exit;
                    } else {
                            msg("에러발생3: 관리자에게 문의하세요");
                            exit;
                    }
                    } else {
                        msg("이미 회원가입 되어 있습니다. 로그인 해주세요");
                        exit;
                    }
                ?>
        </div>
        <!-- //intro__inner -->
    </main>
    <!-- //main -->

    <?php include "../include/footer.php" ?>
    <!-- //footer -->
</body>
</html>