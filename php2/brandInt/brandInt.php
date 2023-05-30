<?php
    include "../connect/connect.php";
    include "../connect/session.php";
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>메인 페이지</title>
    <?php include "../include/head.php" ?>
    <link rel="stylesheet" href="/php2/html/assets/css/NAV/brandInt.css">
    <link rel="stylesheet" href="assets/css/MAIN/main_style.css">

    <!-- SCRIPT -->
    <script defer src="../assets/js/common.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.5/gsap.min.js"></script>

</head>
<body>
<?php include "../include/skip.php" ?>
<!-- //skip -->
<?php include "../include/header.php" ?>
<!-- //header -->
<main id="main">
    <section class="first__section" data-parallax="scroll" data-image-src="/php2/html/assets/img/BRANDINT/brandint01.jpg">
            <div class="section1__inner container">
                <div class="f_title">
                    <h1>PLANTY</h1>
                    <p>WHY DO WE NEED THE FOREST?</p>
                </div>
                <div class="f_desc">
                    <p>현대인들은 하루에 대부분을 밀폐된 실내 공간에서 보냅니다. 
                        대기오염보다 심각하다는 실내공기. 오염된 공기는 우리의 
                        <br>신체와 정신에까지 심각한 영향을 미치고 있습니다. 
                        이것이 우리의 공간에서 식물과 함께 하고자하는 이유입니다.   </p>
                </div>
            </div>
        </section>
        <section class="second__section">
            <div class="section__inner container">
                <div class="s_title">
                    <h1>식물이 우리에게 주는것</h1>
                    <p>식물은 우리에게 육체적, 정신적으로 건강한 삶을 선물해 줍니다. 식물이 주는 심리적 안정감과 청정함은 우리 일상에 큰 변화를 줄 것입니다. 그것이 우리가 숲을 실내로 가져오고 싶은 이유입니다.</p>
                </div>
                <div class="second__cards">
                    <div class="s__card">
                        <h3>신체피로 완화</h3>
                        <p>피로30%, 두통18%, 피부건조 23%, 안구결막충렬 14% 감소</p>
                    </div>
                    <div class="s__card">
                        <h3>심리적 안정</h3>
                        <p>스트레스 완화,심박수 회복률 1.5~2배,알파파 증가</p>
                    </div>
                    <div class="s__card">
                        <h3>생산성 향상</h3>
                        <p>창조성 45%,생산성 38% 향상,집객 및 상품판매 증대</p>
                    </div>
                    <div class="s__card">
                        <h3>공기정화</h3>
                        <p>식물 광합성시 CO2흡수 및 O2방출을 통해 실내공기질 개선</p>
                    </div>
                </div>
            </div>
        </section>
    <section class="last__section" data-parallax="scroll" data-image-src="/php2/html/assets/img/BRANDINT/brandint02.jpg">
            <div class="section__inner container">
                <div class="l_title">
                    <p>숲을 일상 공간으로 가져오고 싶은 마음에 식물 키우기를 시작합니다.
                        이번 식물은 죽이지 마세요. 건강하게 오래오래 잘 키울 수 있어요.
                        처음 보는 식물도 잘 키울 수 있어요!  
                        일상 공간에서 식물과 함께 하는 방법을 알아볼까요? </p>
                </div>
            </div>
        </section>
    </main>
    <?php include "../include/footer_main.php" ?>
    <script src="../html/assets/js/NAV/community.js"></script> 
    <script src="../html/assets/js/headerNav.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.5/gsap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="/php2/html/assets/js/parallax.js"></script>
    <script>
        $('.first__section').parallax({imageSrc: '/php2/html/assets/img/BRANDINT/brandint01.jpg'});
        $('.last__section').parallax({imageSrc: '/php2/html/assets/img/BRANDINT/brandint02.jpg'});

    </script>
</body>
</html>