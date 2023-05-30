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
                echo "<li><a href='board.php?page=1'>처음으로</a></li>";
                echo "<li><a href='board.php?page={$prevPage}'>이전</a></li>";
            }
            //페이지
            for($i=$startPage; $i<=$endPage; $i++){
                $active = "";
                if($i == $page) $active = "active";
                if($page <= $boardTotalCount ){
                    echo "<li class='{$active}'><a href='board.php?page={$i}'>{$i}</a></li>";
                }
            }
            //마지막으로 다음
            if($page != $boardTotalCount && $page <= $boardTotalCount){
                $nextPage = $page+1;
                echo "<li><a href='board.php?page={$nextPage}'>다음</a></li>";
                echo "<li><a href='board.php?page={$boardTotalCount}'>마지막으로</a></li>";
            }
        ?>

    </ul>
</div>