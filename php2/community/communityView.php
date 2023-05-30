<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    $youNick = $_SESSION['youNick'];
    $commuID = $_GET['commuID'];
    $memberID = $_SESSION['memberID'];

    $commuSql = "SELECT * FROM plantyCommu WHERE commuID = '$commuID'";
    $commuResult = $connect -> query($commuSql);
    $commuInfo = $commuResult -> fetch_array(MYSQLI_ASSOC);
    $count = $commuResult -> num_rows;
    
    // echo "<pre>";
    // var_dump($commuInfo);
    // echo "</pre>";

      // 보드 뷰 + 1 
      $sql = "UPDATE plantyCommu SET commuView = commuView + 1 WHERE commuID = {$commuID}";
      $connect -> query($sql);
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>메인 페이지</title>
    <?php include "../include/head.php" ?>
    <!-- SCRIPT -->
    <script defer src="../assets/js/common.js"></script>
</head>
<body>
<?php include "../include/skip.php" ?>
<!-- //skip -->
<?php include "../include/header.php" ?>
<!-- //header -->
    <main id="main">
        <div class="community__wrap container">
            <div class="contents__view bmStyle mt120">
                <div class="bmStyle mb100">
                    <span class="view__kategorie"><?=$commuInfo['commuCategory']?></span>
                    <div>
                        <h2><?=$commuInfo['commuTitle']?></h2> 
                        <?php if($memberID ==$commuInfo['memberID']){ ?>  
                            <!-- 로그인을 한 경우 -->
                          <div>
                                <a href="communityDelete.php?commuID=<?=$commuID?>" onclick="return confirm('정말 삭제하시겠습니까?','')" class="community__write">삭제하기</a>
                                <a href="communityModify.php?commuID=<?=$commuID?>" class="community__write">수정하기</a>
                          </div>
                            
                        <?php }?>  
                    </div>
                    <span class="user"><?=$youNick?></span>
                    <span class="cont__date"><?=date('Y-m-d', $commuInfo['commuRegTime'])?> <em class="cont__time"><?=date('H:i:s', $commuInfo['commuRegTime'])?></em></span>
                    <span class="view__count">조회수 <em><?=$commuInfo['commuView']?></em></span>
                </div>
                <article class="contents__header">
                    <img src="commuImg/<?=$commuInfo["commuImgFile"]?>" alt="<?=$commuInfo['commuTitle']?>">
                </article>
                <p class="cont__desc"><?=$commuInfo['commuContents']?></p>
                
            </div>
            
            <!-- <div class="comment">
                <span class="comment__count"> 댓글 (<em>3개</em>)</span>
                <div class="comment__write">
                    <img src="../assets/img/MAIN/card_img01.png" alt="프로필 사진1">
                    <input type="text" name="comment" aria-label="댓글" placeholder="댓글을 작성해 주세요"> 
                    <button>작성하기</button>
                </div>
                <div class="comment__wrap">
                    <div class="comment__view ">
                        <img src="../assets/img/MAIN/card_img01.png" alt="프로필 사진1">
                        <div class="bmStyle">
                            <span class="user">노지감귤</span>
                            <span class="time">30분전</span>
                            <button>답글</button>
                            <p class="desc">좋은 정보 감사합니다!!</p>
                        </div>
                    </div>
                    <div class="comment__view ">
                        <img src="../assets/img/MAIN/card_img01.png" alt="프로필 사진1">
                        <div class="bmStyle">
                            <span class="user">사장님</span>
                            <span class="time">29분전</span>
                            <button>답글</button>
                            <p class="desc">사진이 이쁘네요!</p>
                        </div>
                    </div>
                    <div class="comment__view2">
                        <img src="../assets/img/MAIN/card_img01.png" alt="프로필 사진1">
                        <div class="bmStyle">
                            <span class="user">현빈</span>
                            <span class="time">29분전</span>
                            <button>답글</button>
                            <p class="desc">사진이 이쁘네요!</p>
                        </div>
                    </div>
                    <div class="comment__write2">
                        <img src="../assets/img/MAIN/card_img01.png" alt="프로필 사진1">
                        <input type="text" name="comment" aria-label="댓글" placeholder="댓글을 작성해 주세요"> 
                        <button>작성하기</button>
                    </div>
                    <div class="comment__view ">
                        <img src="../assets/img/MAIN/card_img01.png" alt="프로필 사진1">
                        <div class="bmStyle">
                            <span class="user">해린남편</span>
                            <span class="time">25분전</span>
                            <button>답글</button>
                            <p class="desc">한번 키워봐야겠어요!</p>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </main>
    <?php include "../include/footer_main.php" ?>
    <script src="../html/assets/js/NAV/community.js"></script> 
    <script src="../html/assets/js/headerNav.js"></script>
</body>
</html>