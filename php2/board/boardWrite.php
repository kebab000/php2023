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
    <title>고객센터 글 작성</title>
    <?php include "../include/head.php" ?>
</head>
<body class="bgStyle1">
    
    <?php include "../include/skip.php" ?>
    <!-- //skip -->

   <?php include "../include/header.php" ?>
    <main id="main" class="container">
        <div class="board__container">
            <div class="board">
                <div class="board__header bmStyle">
                    <div class="logo">PLANTY</div>
                    <h2 class="mb20">문의하기</h2>
                    <p class="mb60">이용에 불편이 있으시면 문의해 주세요</p>
                </div>  
                <div class="board__inner">
                    <div class="board__write">
                        <form action="boardWriteSave.php"name="boardWrite" method="post">
                            <fieldset>
                                <legend class="blind">게시글 작성하기</legend>
                                <div>
                                    <label for="boardTitle">제목</label>
                                    <input type="text" id="boardTitle" name="boardTitle" class="inputStyle" placeholder="제목을 입력해 주세요">
                                </div>
                                <div>
                                    <label for="boardContents">내용</label>
                                    <textarea name="boardContents" id="boardContents" rows="20" class="inputStyle"></textarea>
                                </div>
                                <button type="submit" class="btnStyle3">저장하기</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- //main -->
    <?php include "../include/footer_main.php" ?>
    <!-- //footer -->
    <script src="../../html/assets/js/headerNav.js"></script>   
</body>
</html>