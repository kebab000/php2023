<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>달력</title>
     <!-- CSS -->
     <?php include "../include/head.php" ?>
     
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.css">

</head>
<body class="bgStyle3 mt120">
<?php include "../include/skip.php" ?>
<!-- //skip -->
<?php include "../include/header.php" ?>
<!-- //header -->
    <main id="main" class="container bmStyle">
        <div class="calendal__header">
            <h5>CALENDAR</h5>
            <h2>2023</h2>
        </div>
        <!-- //intro__inner -->
        <div class="calendal__inner">
            <div id='calendar'></div>
            <div id="myModal" class="modal">
                <span class="close">&times;</span>
                <div class="modal__inner">
                    <div class="modal-content1">
                        <img src="../assets/img/COMMUNITY/community_img01.png" alt="">
                    </div>
                    <div class="modal-content2">
                        <h2>내 식물정보</h2>
                        <div class="cont2__inner">
                            <h1>1</h1>
                            <h3>처음 데려온 날</h3>
                            <p>1</p>
                            <h3>마지막 분갈이 날</h3>
                            <p>1</p>
                            <h3>마지막 물준 날</h3>
                            <p>1</p>
                        </div>
                        <h2>내 식물 관리노트</h2>
                        <form a id="eventForm">
                            <label for="eventTitle">1</label>
                            <input type="text" id="eventTitle" name="eventTitle">
                            <button type="submit" class="save">저장하기</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- </div> -->
    </main>
    <!-- //main -->
    <?php include "../include/footer_min.php" ?>
    <!-- //footer -->
    <script src="../html/assets/js/NAV/calendar.js"></script>
    <!-- fullcalendar JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <!-- fullcalendar locale script -->
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/locales-all.js"></script>


    <!-- <script>
        document.querySelectorAll('.fc-event-title fc-sticky').forEach(this){
            this.addEventListener('click',function(){
                document.querySelector('.modal').style.display = 'block';
            })
        }
    </script> -->
</body>
</html>