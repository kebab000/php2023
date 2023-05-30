<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    $sql = "SELECT count(boardID) FROM plantyBoard";
    $result = $connect -> query($sql);
    $boardTotalCount = $result -> fetch_array(MYSQLI_ASSOC);
    $boardTotalCount = $boardTotalCount['count(boardID)'];
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게시판 보기</title>
    <?php include "../include/head.php" ?>
</head>
<body class="bgStyle3">
    <?php include "../include/skip.php" ?>
    <!-- skip -->
    <?php include "../include/header.php" ?>
    <!-- header -->
    <main id="main" class="container">
        <div class="board__container">
            <div class="board">
                <div class="board__header">
                    <div class="logo">PLANTY</div>
                    <h2 class="mb20">문의하기</h2>
                </div>  
                <div class="board__inner">
                    <div class="board__View">
                        <table>
                            <colgroup>
                                <col style="width: 25%;">
                                <col style="width: 25%;">
                                <col style="width: 25%;">
                                <col style="width: 25%;">
                            </colgroup>
                            <tbody>
                                <!-- <tr>
                                    <td colspan="4">게시판 제목입니다.</td>
                                </tr>
                                <tr>
                                    <th>등록자</th>
                                    <td>노지영</td>
                                    <th>등록일</th>
                                    <td>2023-04-24</td>
                                </tr>
                                <tr>
                                    <th>내용</th>
                                    <td colspan="3">
                                        안녕하세요
                                        오늘 FLANTY에 로그인하는데 로그인이 안되서요
                                        비밀번호와 이메일이 똑같은데 갑자기 왜 로그인이 안될까요?
                                        이 부분에 대해서 한번 확인 부탁드려도 될까요?
                                    </td>
                                </tr> -->
                                <?php
   if(isset($_GET['boardID'])) {
    $boardID = $_GET['boardID'];

    // 보드 뷰 + 1 
    $sql = "UPDATE plantyBoard SET boardView = boardView + 1 WHERE boardID = {$boardID}";
    $connect -> query($sql);

    $sql = "SELECT b.boardContents, b.boardTitle, m.youName, b.regTime, b.boardView FROM plantyBoard b JOIN plantyMember m ON(m.memberID = b.memberID) WHERE b.boardID = {$boardID}";
    $result = $connect -> query($sql);
    if($result){
        $info = $result -> fetch_array(MYSQLI_ASSOC);
        // $count = $result -> num_rows;
        // echo "<pre>";
        // var_dump($info);
        // echo "</pre>";
        echo "<tr><td colspan='4'>".$info['boardTitle']."</td></tr>";
        echo "<tr><th>등록자</th><td>".$info['youName']."</td><th>등록일</th><td>".date('Y/m/d', $info['regTime'])."</td></tr>";
        echo "<tr><th>내용</th><td colspan='4'>".$info['boardContents']."</td></tr>";
    }
}else {
    echo "<tr><td colspan='4'>게시글이 없습니다.</td></td>";
}
?>
                            </tbody>
                        </table>
                    </div>
                    <div class="board__btn mb70">
                        <a href="boardModify.php?boardID=<?=$_GET['boardID']?>" class="btnStyle3">수정하기</a>
                        <a href="boardRemove.php?boardID=<?=$_GET['boardID']?>" class="btnStyle3" onclick="return confirm('정말 삭제하시겠습니까?','')">삭제하기</a>
                        <a href="board.php" class="btnStyle3">목록보기</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- //main -->
    <?php include "../include/footer_min.php" ?>
    <!-- footer -->
    <script src="../../html/assets/js/headerNav.js"></script>   
</body>
</html>