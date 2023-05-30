<?php
include "../connect/connect.php";
include "../connect/session.php";

$youName = $_POST['youName'];
$youEmail = $_POST['youEmail'];
$youQuestion = $_POST['youQuestion'];
$youAnswer = $_POST['youAnswer'];
$youPass = $_POST['youPass'];
$sql = "SELECT youEmail, youName, youQuestion, youAnswer, youPass FROM plantyMember WHERE youName = '$youName' AND youEmail = '$youEmail' AND youQuestion = '$youQuestion' AND youAnswer = '$youAnswer'";
$result = $connect -> query($sql);



// if( isset($_SESSION['memberID']) ){ 
//     echo "<script>window.alert('잘못된접근입니다.'); location.href = '../login/searchPass.php';</script>";
// }

$count = $result -> num_rows;
if($result){
    if($count == 0){
        // 입력한 정보가 틀렸을 때
        echo '<p>입력한 정보가 틀립니다.</p>';
        echo '<script>alert("입력한 정보가 틀립니다."); history.back();</script>';
    }
}
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>비밀번호 변경</title>
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
            <div class="pwdlost">
                <div class="pwdlost__inner center">
                    <div class="logo">PLANTY</div>
                    <h2>비밀번호 변경하기</h2>
                    <div class="pwdlost__form">
                        <form action="modiPassResult.php" name="modiPass" method="post" onsubmit="return passModi()">
                            <fieldset>
                                <legend class="blind">비밀번호 변경 영역</legend>
                                <div>
                                    <input class="inputStyle__pwd" type="text" id="youEmail" name="youEmail" placeholder="이메일을 다시 한번 입력해주세요" required>
                                </div>
                                <div>
                                    <input class="inputStyle__pwd" type="password" id="youPass" name="youPass" placeholder="비밀번호을 입력해주세요" required>
                                    <p class="modiMsg" id="youPassComment"><!--비밀번호가 일치하지 않습니다.--></p>
                                </div>
                                <div>
                                    <input class="inputStyle__pwd" type="password" id="youPassC" name="youPassC" placeholder="비밀번호을 다시 입력해주세요" required>
                                    <p class="modiMsg" id="youPassCComment"><!--비밀번호가 일치하지 않습니다.--></p>
                                </div>
                                <button type="submit" class="btnStyle_pwd mt20 mb20">변경하기</button>
                                <!-- <button class="btnStyle_pwd mt20 mb20">변경하기</button> -->
                                <div class="login_more mt10 btStyle">
                                    <span><a href="SearchId.php">아이디 찾기</a></span>
                                    <span><a href="../join/join.php">회원가입</a></span>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- //main -->
    <?php include "../include/footer_min.php" ?>
    <!-- //footer -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        function passModi() {
            //비밀번호 유효성 검사
            if($("#youPass").val() == ''){
                $("#youPassComment").text("* 비밀번호를 입력해주세요.");
                $("#youPass").focus();
                return false;
            }
            //8자~20자이내, 공백X, 영문, 숫자, 특수문자
            let getYouPass = $("#youPass").val();
            let getYouPassNum = getYouPass.search(/[0-9]/g);
            let getYouPassEng = getYouPass.search(/[a-z]/ig);
            let getYouPassSpe = getYouPass.search(/[`~!@@#$%^&*|₩₩₩'₩";:₩/?]/gi);
            if(getYouPass.length < 8 || getYouPass.length > 20){
                $("#youPassComment").text("8자리 ~ 20자리 이내로 입력해주세요~");
                return false;
            } else if (getYouPass.search(/\s/) != -1){
                $("#youPassComment").text("비밀번호는 공백없이 입력해주세요!");
                return false;
            } else if (getYouPassNum < 0 || getYouPassEng < 0 || getYouPassSpe < 0 ){
                $("#youPassComment").text("영문, 숫자, 특수문자를 혼합하여 입력해주세요!");
                return false;
            }
            // 비밀번호 확인 유효성 검사
            if($("#youPassC").val() == ''){
                $("#youPassCComment").text("* 확인 비밀번호를 입력해주세요!");
                $("#youPassC").focus();
                return false;
            }
            // 비밀번호 동일한지 체크
            if($("#youPass").val() !== $("#youPassC").val()){
                $("#youPassCComment").text("* 비밀번호가 일치하지 않습니다.");
                return false;
            }
        }
    </script>

</body>
</html>