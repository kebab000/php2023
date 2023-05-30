<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    $memberID = $_SESSION['memberID'];
    $myPlantID = $_GET['myPlantID'];
    $sql = "SELECT * FROM myPlant WHERE myPlantID = '{$myPlantID}'";
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
                    <form action="myPlantModiSave.php?myPlantID=<?=$info['myPlantID']?> " name="myPlantModi" method="post" enctype="multipart/form-data">
                    <div class="myplant__wrap">
                        <div class="myplant__wrap_tit">
                            <h2>내 식물관리</h2>
                            <button type="submit">저장하기</button>
                        </div>
                        <div class="myplant__inner">
                            <div class="myplant__img">
                                <figure class="myPlantPhoto">
                                    <input type="file" name="myImgName" id="myImgName" accept=".jpg, .jpeg, .png, .gif" placeholder="jpg, png, gif 파일만 가능합니다. 이미지 용량은 1MB를 넘길 수 없습니다." value="$">
                                </figure>
                            </div>
                            <div class="myplant__info">
                                <div class="plant__info">
                                    <input name="myPlantName" id="myPlantName" value="<?=$info['myPlantName']?>" class="mb10" placeholder="내 식물 이름을 입력해주세요"></input>
                                    <input name="myPlantKind" id="myPlantKind" value="<?=$info['myPlantKind']?>"  class="mb30" placeholder="식물 종류를 입력해주세요!"></input>
                                    <div class="plant__mgm">
                                        <h2>관리 방법</h2> 
                                            <div><a href="../dictionary/dictionary.php">관리 방법 보러가기</a></div>

                                    </div>
                                </div>
                                <div class="plant__w_info">
                                    <div class="schedule">
                                        <div><p>마지막 물 준날</p><input name="lastWater" id="lastWater" value="<?=$info['lastWater']?>"></input></div>
                                        <div><p>키우는 공간</p><input name="placean" id="placean" value="<?=$info['placean']?>"></input></div>
                                        <div><p>빛받는 방법</p><input name="sunlight" id="sunlight" value="<?=$info['sunlight']?>"></input></div>
                                        <div><p>바람받는 방법</p><input name="wind" id="wind" value="<?=$info['wind']?>"></input></div>
                                        <div><p>분갈이한날</p><input name="claychange" id="claychange" value="<?=$info['claychange']?>"></input></div>
                                        <div><p>영양제준날</p><input name="nutrients" id="nutrients" value="<?=$info['nutrients']?>"></input></div>
                                        <div><p>가지친 날</p><input name="cut" id="cut" value="<?=$info['cut']?>"></input></div>
                                        <input value="<?=$info['myImgName']?>" type="hidden" name="prevImgFile" id="prevImgFile">
                                    </div>
                                    <div class="plant__sign">
                                        <input name="significant" id="significant" value="<?=$info['significant']?>" type="text" placeholder="특이사항을 적어주세요!">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
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