<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    $youNick = $_SESSION['youNick'];

    $sql = "SELECT count(commuID) FROM plantyCommu";
    $result = $connect -> query($sql);
    $boardTotalCount = $result -> fetch_array(MYSQLI_ASSOC);
    $boardTotalCount = $boardTotalCount['count(commuID)'];

    if(isset($_GET['commuCategory'])){
        $category = $_GET['commuCategory'];
    }else {
        Header("Location: community.php");
    }
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
    <div class="wrap container">
        <article id="community__slider">
            <h2 class="blind">슬라이더 영역</h2>
            <div class="slider__inner">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="slider community__img01">
                            <div class="slider__info">
                                <h3 class="title">요즘 대세는 ‘넝쿨식물’🌿</h3>
                                <P class="desc">좁은 집 인테리어에 제격인 ‘넝쿨 식물’ <br>
                                    키워보세요</P>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="slider community__img01">
                            <div class="slider__info">
                                <h3 class="title">요즘 대세는 ‘넝쿨식물’🌿</h3>
                                <P class="desc">좁은 집 인테리어에 제격인 ‘넝쿨 식물’ <br>
                                    키워보세요</P>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="slider community__img01">
                            <div class="slider__info">
                                <h3 class="title">요즘 대세는 ‘넝쿨식물’🌿</h3>
                                <P class="desc">좁은 집 인테리어에 제격인 ‘넝쿨 식물’ <br>
                                    키워보세요</P>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slider__dot"  id="community__dot">
                    <span class="dot active"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                </div>
            </div>
        </article>
        <div class="contents">
            <div class="contents__nav">
                <div id="options" class="gridly">
                <ul class="filter option-set" data-filter-group="color">
                        <li><a id="filters" href="community.php#community__dot" data-filter="*">ALL</a></li>
                        <li class="webstandard"><a href="communityHot.php#community__dot" data-filter=".HOT">HOT🔥</a></li>
                        <li class="webstandard"><a href="communityMyPlant.php?commuCategory='내식물자랑'#community__dot" data-filter=".myPlant" class="selected">내 식물자랑</a></li>
                        <li class="webstandard"><a href="communityPlantInfo.php?commuCategory='식물관리정보'#community__dot" data-filter=".plantInfo">식물관리정보</a></li>
                        <li class="webstandard"><a href="communityPlanty.php?commuCategory='플랜테리어'#community__dot" data-filter=".planty">플랜테리어</a></li>
                    </ul>
                    <!-- <ul class="grid">
                        <li class=">ALL</li>
                        <li class=">HOT🔥</li>
                    </ul> -->
                </div>
                <?php if(isset($_SESSION['memberID'])){ ?>  
                    <!-- 로그인을 한 경우 -->
                    <a href="communityWrite.php" class="community__write">작성하기</a>
                <?php }else{ ?>  
                    <!-- 로그인이 안된 경우 -->
                    <a href="../login/login.php" class="community__write">작성하기</a>
                <?php } ?> 
            </div>
            <div class="contents__inner">
                <!-- box -->
                <!-- <section class="color-shape" data-category="HOT">
                    <a href="#" target="_blank">
                    <div class="cont_wrap">
                        <img src="/php2/html/assets/img/COMMUNITY/community_Contens01.png" alt="portfolio">
                        <div class="cont_desc">
                            <h5 class="title">초보 가드너를 위한 착한 가격의 순둥이식물 추천🌿</h5>
                            <div>
                                <p class="kategorie">식물관리 정보</p>
                                <div>
                                    <span class="user">케밥</span>
                                    <span>조회수 <em>333</em></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    </a>
                </section> -->
              <!-- //box -->
<?php
    if(isset($_GET['page'])){
        $page = (int) $_GET['page'];
    } else {
        $page = 1;
    }
    $viewNum = 12;
    $viewLimit = ($viewNum * $page) - $viewNum;

    $sql = "SELECT * FROM plantyCommu WHERE commuDelete = 0 AND commuCategory = {$category} ORDER BY commuID DESC LIMIT {$viewLimit},{$viewNum}";
    $result = $connect -> query($sql);
    $count = $result -> num_rows;
?>
<?php foreach($result as $plantyCommu){ ?>
            <!-- box -->
            <section class="color-shape">
                <a href="communityView.php?commuID=<?=$plantyCommu['commuID']?>">
                    <div class="cont_wrap">
                        <img src="commuImg/<?=$plantyCommu['commuImgFile']?>" alt="<?=$plantyCommu['commuTitle']?>">
                        <div class="cont_desc">
                            <h5 class="title"><?=$plantyCommu['commuTitle']?></h5>
                            <div>
                                <p class="kategorie"><?=$plantyCommu['commuCategory']?></p>
                                <div>
                                    <span class="user"><?=$youNick?></span>
                                    <span>조회수 <em><?=$plantyCommu['commuView']?></em></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </section>  
            <!-- //box -->
<?php } ?>
            </div>
            <div class="board__pages">
                <ul>
                <?php
    //게시글 총 갯수
    //총 페이지 갯 수
    $boardTotalCount = ceil($boardTotalCount/$viewNum);
    // echo $boardTotalCount;
    //1 2 3 4 5 6 [7] 8 9
    $pageView = 5;
    $startPage =  $page - $pageView;
    $endPage = $page + $pageView;
    //처음 페이지 초기화//마지막 페이지 초기화
    if($startPage < 1) $startPage = 1;
    if($endPage >= $boardTotalCount) $endPage = $boardTotalCount;
    //처음으로 이전
    if($page != 1 && $page <= $boardTotalCount  ){
        $prevPage = $page-1;
        echo "<li><a href='communityHot.php?page=1'>처음으로</a></li>";
        echo "<li><a href='communityHot.php?page={$prevPage}'>이전</a></li>";
    }
    //페이지
    for($i=$startPage; $i<=$endPage; $i++){
        $active = "";
        if($i == $page) $active = "active";
        if($page <= $boardTotalCount ){
            echo "<li class='{$active}'><a href='communityHot.php?page={$i}'>{$i}</a></li>";
        }
    }
     //마지막으로 다음
    if($page != $boardTotalCount && $page <= $boardTotalCount){
        $nextPage = $page+1;
        echo "<li><a href='communityHot.php?page={$nextPage}'>다음</a></li>";
        echo "<li><a href='communityHot.php?page={$boardTotalCount}'>마지막으로</a></li>";
    }
?>
                </ul>
            </div>   
        </div>
     </div>
    </main>
    <?php include "../include/footer_main.php" ?>
    <script src="../html/assets/js/NAV/community.js"></script> 
    <script src="../html/assets/js/headerNav.js"></script>
</body>
</html>