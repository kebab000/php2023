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
                    <!-- <h2>내 식물관리</h2> -->
                    <a href="myPlantWrite.php" class="myplant__write">등록하기</a>
<?php
$sql = "SELECT * FROM myPlant WHERE myDelete = 0 AND memberID = '{$memberID}' ORDER BY myPlantID DESC";
$result = $connect -> query($sql);
$count = $result -> num_rows;
?>
               

                            <?php foreach($result as $myPlant){ ?>
                        <!-- box -->
                <div class="myplant__wrap mb20">
                    <div class="myplant__wrap_tit">
                        <h2>내 식물</h2>
                        <a href="myPlantModi.php?myPlantID=<?=$myPlant['myPlantID']?> ">수정하기</a>
                    </div>
                    <div class="myplant__inner">
                        <div class="myplant__img">
                            <img src="myPlantImg/<?=$myPlant['myImgName']?>" alt="<?=$myPlant['myImgName']?>">
                        </div>
                        <div class="myplant__info">
                            <div class="plant__info">
                                <h2><?=$myPlant['myPlantName']?></h2>
                                <p><?=$myPlant['myPlantKind']?></p>
                                <div class="plant__mgm">
                                    <h2>관리 방법</h2> 
                                        <div><a href="../dictionary/dictionary.php">관리 방법 보러가기</a></div>
                                </div>
                            </div>
                            <div class="plant__w_info">
                                <div class="schedule">
                                    <div><p>마지막 물 준날</p><span><?=$myPlant['lastWater']?></span></div>
                                    <div><p>키우는 공간</p><span><?=$myPlant['placean']?></span></div>
                                    <div><p>빛받는 방법</p><span><?=$myPlant['sunlight']?></span></div>
                                    <div><p>바람받는 방법</p><span><?=$myPlant['wind']?></span></div>
                                    <div><p>분갈이한날</p><span><?=$myPlant['claychange']?></span></div>
                                    <div><p>영양제준날</p><span><?=$myPlant['nutrients']?></span></div>
                                    <div><p>가지친 날</p><span><?=$myPlant['cut']?></span></div>
                                </div>
                                <div class="plant__sign">
                                    <p><?=$myPlant['significant']?></p>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
                        <!-- //box -->
<?php } ?>
                   
                <!-- // -->
            </div>
        </div>
    </main>
    <?php include "../include/footer_main.php" ?>
    <!-- //footer -->
        <script src="../../html/assets/js/NAV/community.js"></script> 
        <script src="../../html/assets/js/headerNav.js"></script>
    </body>
</html>