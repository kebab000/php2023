<?php 
    include "../connect/connect.php" ;
    include "../connect/session.php" ;
    include "../connect/sessionCheck.php" ;
    // echo "<pre>";
    // var_dump($_SESSION);
    // echo "</pre>";
    $userID = $_SESSION['memberID'];
    $boardID = $_GET['boardID'];
    $sql = "SELECT memberID  FROM plantyBoard  WHERE boardID = {$boardID}";
    $result = $connect -> query($sql);
    if($result){
        $info = $result -> fetch_array(MYSQLI_ASSOC);
        if($userID !== $info['memberID']){
            echo '<script>alert("작성자가 아닙니다"); location.href = "boardView.php?boardID='.$boardID.'";</script>';
        };
    };
    
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>고객센터 글 수정</title>
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
                        <form action="boardModifySave.php"name="boardModify" method="post">
                            <fieldset>
                                <legend class="blind">게시글 수정하기</legend>
                                <?php
                                    $boardID = $_GET['boardID'];
                                    
                                    $sql = "SELECT boardID, boardTitle, boardContents FROM plantyBoard WHERE boardID = {$boardID}";
                                    $result = $connect -> query($sql);

                                    if($result){
                                        $info = $result -> fetch_array(MYSQLI_ASSOC);

                                        echo "<div style='display:none'><label for='boardID' class='board_tible'>제목</label><input type='text' name='boardID' id='boardID' class='inputStyle' value='".$info['boardID']."'></div>";
                                        echo "<div><label for='boardTitle' class='board_tible'>제목</label><input type='text' name='boardTitle' id='boardTitle' class='inputStyle' value='".$info['boardTitle']."'></div>";
                                        echo "<div><label for='boardContents' class='board_tible'>내용</label><textarea name='boardContents' id='boardContents' rows='20' class='inputStyle'>".$info['boardContents']."</textarea></div>";};
                                ?>
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