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
            <?php include "../include/mypageAside.php" ?>
            <!-- //mypageAside  -->
                <div class="mypage__right">
                    <div class="myinfo">
                        <h2>내 정보 관리</h2>
                        <div class="myinfo__profile">
                            <figure>
                            <img src="userPlofileImg/<?=$profileName?>" alt="<?= $profileName ?>">
                                <p><?=$_SESSION['youName'] ?></p>
                            </figure>
                            <a href="mypageModi.php">수정하기</a>
                        </div>
                        <div class="myinfo__info">
                            <p>로그인 정보</p> <span>PLANTY 계정 로그인에 사용되는 이메일, 전화번호 입니다.</span>
                            <div>이메일 : <p><?=$_SESSION['youEmail'] ?></p></div>
                            <div>닉네임 :  <p><?=$_SESSION['youNick'] ?></p></div>
                            <div>전화번호 : <p><?=$_SESSION['youPhone'] ?></p></div>
                        </div>
                    </div>
                    <div class="myplt">
                        <div class="myplt__title">
                            <h2>내 식물관리</h2>
                            <a href="myPlant.php">더보기</a>
                        </div>                       
                        <div class="myplt__cards">
                            <!-- <div class="myplt__card">
                                    <img src="./brandint01.jpg" alt="">
                                    <p>식물이름</p> -->
                            <!-- </div> -->
<?php
$sql = "SELECT * FROM myPlant WHERE myDelete = 0 AND memberID = '{$memberID}' ORDER BY myPlantID DESC LIMIT 3";
$result = $connect -> query($sql);
$count = $result -> num_rows;
?>
 <?php foreach($result as $myPlant){ ?>
                            <div class='myplt__cards'>
                                <div class='myplt__card'>
                                    <img src="myPlantImg/<?=$myPlant['myImgName']?>" alt="<?=$myPlant['myImgName']?>">
                                    <p><?=$myPlant['myPlantName']?></p>
                                </div>
                            </div>
<?php } ?>
                        </div>
                    </div>
                    <div class="mywrite">
                        <div class="mywrite_title">
                            <h2>내가 쓴 글</h2>
                            <a href="myWritten.php">더보기</a>
                        </div>
                        <div class="mywrite__list">
                            <?php
                                $commuSql = "SELECT * FROM plantyCommu WHERE memberID = '{$memberID}' ORDER BY commuID DESC LIMIT 5";
                                $commuResult = $connect->query($commuSql);
                                if($commuResult){
                                    $count = $commuResult -> num_rows;
                                    if($count > 0){
                                        for($i=0; $i<$count; $i++){
                                            $commuInfo = $commuResult->fetch_array(MYSQLI_ASSOC);
                                            echo "<a href='../community/communityView.php?commuID={$commuInfo['commuID']}'><li>".$commuInfo['commuTitle']."</li></a>";
                                        };
                                    }
                                } 
                            
                            ?>
                            <!-- <a href="#"><li>1. ttttttt</li></a>
                            <a href="#"><li>2. ttttttt</li></a>
                            <a href="#"><li>3. ttttttt</li></a>
                            <a href="#"><li>4. ttttttt</li></a>
                            <a href="#"><li>5. ttttttt</li></a> -->
                        </div>
                    </div>
                    <!-- <div class="mycomment">
                        <div class="mycomment_title">
                            <h2>댓글 관리</h2>
                            <a href="#">더보기</a>
                        </div>
                        <div class="mycomment__list">
                            <a href="#"><li>1. ttttttt</li></a>
                            <a href="#"><li>2. ttttttt</li></a>
                            <a href="#"><li>3. ttttttt</li></a>
                            <a href="#"><li>4. ttttttt</li></a>
                            <a href="#"><li>5. ttttttt</li></a>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </main>
    <?php include "../include/footer_main.php" ?>
    <!-- //footer -->
        <script src="../../html/assets/js/NAV/community.js"></script> 
        <script src="../../html/assets/js/headerNav.js"></script>
    </body>
</html>