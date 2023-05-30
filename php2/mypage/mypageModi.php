<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    $memberID = $_SESSION['memberID'];
    $sql = "SELECT * FROM plantyMember WHERE memberID = '{$memberID}'";
    $result = $connect->query($sql);
    if($result){
        $info = $result->fetch_array(MYSQLI_ASSOC);
        $profileName = $info['myImgName'];
    } 
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>마이페이지</title>
     <!-- CSS -->
     <?php include "../include/head.php" ?>
     <link rel="stylesheet" href="../html/assets/css/NAV/mypage.css">
</head>
<body class="bgStyle3">
<?php include "../include/skip.php" ?>
<!-- //skip -->
<?php include "../include/header.php" ?>
<!-- //header -->
    <main>
        <div id="mypage__wrap">
            <div class="mypage__main">
                <div class="mypage__asid">
                    <div class="profile__box">
                        <figure class="profile__img">
                            <img src="userPlofileImg/<?= $profileName ?>" alt="소개이미지">
                        </figure>
                        <div class="profile__info">
                    <!-- 로그인을 한 경우 -->
                            <div class="nick"><?=$_SESSION['youNick'] ?></div>
                            <div class="email"><?=$_SESSION['youEmail'] ?></div>
                        </div>
                    </div>
                    <div class="profile__nav">
                        <div class="nav__list">
                            <ul class="nav__menu">
                                <li><a href="#">내 식물 관리</a></li>
                                <li><a href="#">내 정보 관리</a></li>
                                <li><a href="#">내 활동 관리</a>
                                    <ul class="submenu">
                                        <li><a href="#">내가 쓴 글</a></li>
                                        <!-- <li><a href="#">댓글 관리</a></li> -->
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="mypage__right">
                    <div class="myinfo">
                        <h2>내 정보 관리</h2>
                        <form action="mypageModiSave.php" name="mypageModi" method="post" onsubmit="return modiChecks()" enctype="multipart/form-data">
                            <div class="myinfo__profile__modi">
                                <figure>
                                    <input type="file" name="myImgName" id="myImgName" accept=".jpg, .jpeg, .png, .gif" placeholder="jpg, png, gif 파일만 가능합니다. 이미지 용량은 1MB를 넘길 수 없습니다.">
                                    <input value="<?=$_SESSION['youName'] ?>"id="youName" name= "youName" type="text" placeholder="<?=$_SESSION['youName'] ?>">
                                </figure>
                                <button type="submit" class="btnStyle6">저장하기</button>
                            </div>
                            <div class="myinfo__info">
                                <p>로그인 정보</p> <span>PLANTY 계정 로그인에 사용되는 이메일, 전화번호 입니다.</span>
                                <div>이메일 : <p><?=$_SESSION['youEmail'] ?></p></div>
                                <div class="myinfo__info__sec">닉네임 :  <input value="<?=$_SESSION['youNick'] ?>" id="youNick" name= "youNick" class="mymodi__input" type="text" placeholder="<?=$_SESSION['youNick'] ?>" required> <a href="#"class="btnStyle7" onclick="nickChecking()">중복검사</a></div>
                                <p class="modiMsg" id="youNickComment"></p>
                                <div>전화번호 : <input value="<?=$_SESSION['youPhone'] ?>" id="youPhone" name= "youPhone" type="text" placeholder="<?=$_SESSION['youPhone'] ?>"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php include "../include/footer_main.php" ?>
    <!-- //footer -->
        <script src="../../html/assets/js/NAV/community.js"></script> 
        <script src="../../html/assets/js/headerNav.js"></script>
    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
         let isNickCheck = false;
        let getYouNick = RegExp(/^[가-힣|0-9]+$/);
        function nickChecking(){
            let youNick = $("#youNick").val();
            if(youNick == null || youNick == ''){
                $("#youNickComment").text("* 닉네임을 입력해주세요!");
            }else{
                if(!getYouNick.test($("#youNick").val())){
                    $("#youNickComment").text("* 닉네임은 한글 또는 숫자만 사용 가능합니다.");
                    $("#youNick").val('<?=$_SESSION['youNick'] ?>');
                return false;
                } else {
                    $.ajax({
                        type : "POST",
                        url : "../join/joinCheck.php",
                        data : {"youNick" : youNick, "type" : "isNickCheck"},
                        dataType : "json",
                        success : function(data){
                            if(data.result == "good"){
                                $("#youNickComment").text("* 사용 가능한 닉네임 입니다");
                                isNickCheck = true;
                            }else {
                                $("#youNickComment").text("* 이미 존재하는 닉네임 입니다");
                                isNickCheck = false;
                            }
                        },
                        error : function(request, status, error){
                            console.log("request" + request);
                            console.log("status" + status);
                            console.log("error" + error);
                        }
                    })
                }
            }
            
        }
        function modiChecks() {
            if (!isNickCheck) {
                // 닉네임 중복 확인을 하지 않았을 경우
                $("#youNickComment").text("* 중복확인을 해주세요!!");
                return false; // 폼 제출을 막음
            } 
            return true; // 폼 제출을 허용
        }
    </script>
</html>