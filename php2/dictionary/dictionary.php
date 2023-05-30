<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    $keyword = $_GET ["keyword"];
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>메인 페이지</title>
    <?php include "../include/head.php" ?>
<link rel="stylesheet" href="/php2/html/assets/css/NAV/dictionary.css">
    <link rel="stylesheet" href="assets/css/MAIN/main_style.css">

    <!-- SCRIPT -->
    <img src="/php2/html/assets/img/DICTIONARY/" alt="">

    <script defer src="/php2/html/assets/js/common.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.5/gsap.min.js"></script>

</head>
<body>
<?php include "../include/skip.php" ?>
<!-- //skip -->
<?php include "../include/header.php" ?>
<!-- //header -->
<main id="dictionary">
        <div class="container">
            <div class="dictionary__search" onload="maintoDictionary()">
                <form action="#" name="#" method="#">
                    <fieldset>
                        <legend class="blind"> 게시판 검색 영역</legend>
                            <h3>식물사전
                            <input type="search" placeholder="식물 이름을 입력해 주세요" id="searchBox" class="dictionary__search" value="<?=$keyword?>">
                            <button type="submit" class="dictionary__search__btn"></button>
                    </fieldset>
                    <div class="search__about">
                        <ul>
                            <li><a href="#" value="아레카야자">아레카 야자</a></li>
                            <li><a href="#" value="관음죽">관음죽</a></li>
                            <li><a href="#" value="대나무야자">대나무 야자</a></li>
                            <li><a href="#" value="인도고무나무">인도고무나무</a></li>
                            <li><a href="#" value="아이비">아이비</a></li>
                            <li><a href="#" value="페페로미아">페페로미아</a></li>
                        </ul>
                    </div>
                </form>
            </div>
            <div class="cards__inner col4 line3 mt30 mb70">
                <div class="plant__cards__wrap">
                    <!-- <div class="card">
                        <figure class="card__img">
                            <img src="/php2/html/assets/img/MAIN/brand__img01.png" alt="소개이미지">
                        </figure>
                        <div class="card__title">
                            <h3>코딩 실무에서 유용한</h3> <span>팁 및 노하우</span> 
                        </div>
                    </div> -->
                </div>
                <div class="cards__footer hide">
                    <p>해당 키워드를 가진 식물이 없습니다!<br><a href='/php2/board/board.php'>궁금한 식물을 찾지 못햇다면?</a></p>
                </div>
            </div>
        </div>
        <div id="myModal" class="plant_modal">
            <!-- <div class="plant_modal-content">
                <span class="close">&times;</span> -->
                <!-- Modal content goes here -->
                <!-- <div class="plant_modal__img">
                    <img src="/php2/html/assets/img/MAIN/brand__img01.png" alt="">
                </div>
                <div class="plant_modal__info">
                    <div>
                        <h2 class="plant__Name">아레카야자</h2>

                    </div>
                    <div class="plant__Info">
                        <h3>기본정보</h3>
                        <p></p>
                    </div>
                    <div class="plant__trait">
                        <h3>특이사항</h3>
                        <p> </p>
                    </div>
                    <div class="plant__management">
                        <h3>관리법</h3>
                        <p class="p_center"></p>
                    </div>
                    <div class="plant__source">
                        <h3>출처</h3>
                        <p></p>
                    </div>
                </div>
            </div> -->
        </div>
</main>


    <?php include "../include/footer_main.php" ?>
    <script src="/php2/html/assets/js/headerNav.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.5/gsap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="/php2/html/assets/js/NAV/dictionary.js"></script>
    <script>

    </script>
</body>
</html>