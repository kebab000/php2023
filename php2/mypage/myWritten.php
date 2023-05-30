<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    $memberID = $_SESSION['memberID'];
    $sql = "SELECT * FROM plantyMember WHERE memberID = '{$memberID}'";
    $result = $connect->query($sql);
    if($result){
        $info = $result -> fetch_array(MYSQLI_ASSOC);
        $profileName = $info['myImgName'];
    } 

    $countSql = "SELECT count(commuID) FROM plantyCommu WHERE memberID = '{$memberID}'";
    $countResult = $connect->query($countSql);
    $boardTotalCount = $countResult -> fetch_array(MYSQLI_ASSOC);
    $boardTotalCount = $boardTotalCount['count(commuID)'];

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
                    <div class="mywritten">
                        <p>내가 쓴 글</p>
                    </div>
                    <div class="mywritten__inner">
                        <div class="mywritten__table">
                            <table>
                                <colgroup>
                                <col style="width: 15%;">
                                <col>
                                <col style="width: 15%;">
                                </colgroup>
                                
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>글 제목</th>
                                        <th>등록일</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- <tr>
                                        <td>1</td>
                                        <td><a href="boardView.html"> 게시판 제목</a></td>
                                        <td>2023-03-03</td>
                                    </tr> -->
                                    <?php
    if(isset($_GET['page'])){
        $page = (int) $_GET['page'];
    } else {
        $page = 1;
    }
    $viewNum = 5;
    $viewLimit = ($viewNum * $page) - $viewNum;
    //1~20  DESC LIMIT 0, 20      ---> page1 (viewNum * 1) - viewNum
    //21~40  DESC LIMIT 20, 20    ---> page2 (viewNum * 2) - viewNum
    //41~60  DESC LIMIT 40, 20    ---> page3 (viewNum * 3) - viewNum
    //61~80  DESC LIMIT 60, 20    ---> page4 (viewNum * 4) - viewNum
    $commuSql = "SELECT * FROM plantyCommu WHERE memberID = '{$memberID}' ORDER BY commuID DESC LIMIT {$viewLimit},{$viewNum}";
    $commuResult = $connect->query($commuSql);
    if($commuResult){
        $count = $commuResult -> num_rows;
        if($count > 0){
            for($i=0; $i<$count; $i++){
                $commuInfo = $commuResult->fetch_array(MYSQLI_ASSOC);
                echo "<tr>";
                echo "<td>".$commuInfo['commuID']."</td>";
                echo "<td><a href='../community/communityView.php?commuID={$commuInfo['commuID']}'>".$commuInfo['commuTitle']."</a></td>";
                echo "<td>".date('Y-m-d', $commuInfo['commuRegTime'])."</td>";
                echo "</tr>";
            };
        }
    } 

?>
                                </tbody>
                            </table>
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
                            echo "<li><a href='community.php?page=1'>처음으로</a></li>";
                            echo "<li><a href='community.php?page={$prevPage}'>이전</a></li>";
                        }
                        //페이지
                        for($i=$startPage; $i<=$endPage; $i++){
                            $active = "";
                            if($i == $page) $active = "active";
                            if($page <= $boardTotalCount ){
                                echo "<li class='{$active}'><a href='community.php?page={$i}'>{$i}</a></li>";
                            }
                        }
                        //마지막으로 다음
                        if($page != $boardTotalCount && $page <= $boardTotalCount){
                            $nextPage = $page+1;
                            echo "<li><a href='community.php?page={$nextPage}'>다음</a></li>";
                            echo "<li><a href='community.php?page={$boardTotalCount}'>마지막으로</a></li>";
                        }
                    ?>

                </ul>
            </div>      
                    </div> 
                </div>
            </div>
        </div>
    </main>
        <?php include "../include/footer_main.php" ?>
        <!-- //footer -->

        <script src="../../html/assets/js/NAV/community.js"></script> 
        <script src="../../html/assets/js/headerNav.js"></script>