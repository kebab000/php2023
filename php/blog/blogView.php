<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    // echo "<pre>";
    // var_dump($_SESSION);
    // echo "</pre>";
    $memberID = $_SESSION['memberID'];
    if(isset($_GET['blogID'])){
        $blogID = $_GET['blogID'];
    } else {
        Header("Location: blog.php");
    }
    $blogSql = "SELECT * FROM blog WHERE blogID = '$blogID'";
    $blogResult = $connect -> query($blogSql);
    $blogInfo = $blogResult -> fetch_array(MYSQLI_ASSOC);
    $commentSql = "SELECT * FROM blogComment WHERE blogID = '$blogID' AND commentDelete = '0' ORDER BY commentID DESC";
    $commentResult = $connect -> query($commentSql);
    $commentInfo = $commentResult -> fetch_array(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>블로그 보기</title>
    <?php include "../include/head.php" ?>
</head>
<body class="gray">
    <?php include "../include/skip.php" ?>
    <!-- //skip -->
    <?php include "../include/header.php" ?>
    <!-- //header -->
    <main id="main" class="container">
        <div class="blog__title" style="background-image: url(../assets/blog/<?=$blogInfo['blogImgFile']?>)">
            <span class="cate"><?=$blogInfo['blogCategory']?></span>
            <h2 class="title"><?=$blogInfo['blogTitle']?></h2>
            <div class="info">
                <span class="author"><?=$blogInfo['blogAuthor']?></span>
                <span class="date"><?=date('Y-m-d', $blogInfo['blogRegTime'])?></span>
                <div class="modify">
                    <a href="#">수정</a>
                    <a href="#">삭제</a>
                </div>
            </div>
        </div>
        <!--//blog__title -->
        <div class="blog__inner">
            <div class="left mt70">
                <h3><?=$blogInfo['blogTitle']?></h3>
                <div class="blog__contents">
                <?=$blogInfo['blogContents']?>
    
                </div>
            </div>
            <div class="right">
                <div class="blog__aside">
                    <?php include "../include/blogTitle.php" ?>
                    <?php include "../include/blogCate.php" ?>
                    <?php include "../include/blogNew.php" ?>
                    <?php include "../include/blogPopular.php" ?>
                    <?php include "../include/blogComment.php" ?>
                    <!-- <div class="intro">
                        <picture class="img">
                            <source srcset="assets/img/intro01.png, assets/img/intro01@2x.png 2x, assets/img/intro01@3x.png 3x" />
                            <img src="assets/img/intro01.png" alt="소개이미지">
                        </picture> 
                        <p class="text">
                            어떤 일이라도 노력하고 즐기면 그 결과는 빛을 바란다고 생각합니다.
                        </p>
                    </div>
                    <div class="cate">
                        <h4>카테고리</h4>
                    </div>
                    <div class="cate">
                        <h4>최신 글</h4>
                    </div>
                    <div class="cate">
                        <h4>인기 글</h4>
                    </div>
                    <div class="cate">
                        <h4>최신 댓글</h4>
                    </div> -->

                </div>
            </div>
        </div>
        <!--//blog__inner -->

        <div class="blog__article">
            <h3>관련글</h3>
            <?php include "../include/blogArticle.php" ?>
            <!-- <div class="cards__inner col4 line0">
                <div class="card">
                    <figure class="card__img">
                        <source srcset="assets/img/blog02.jgp, assets/img/blog02.jgp, assets/img/blog02@2x.jgp 2x, assets/img/blog02@3x.jgp 3x" />
                        <a href="#" class="more"><img src="assets/img/blog02.jpg" alt="소개이미지"></a>
                    </figure>
                    <div class="card__title">
                        <h3>React에서 Redux를 사용하는 방법</h3>
                        <p class="three-line">이 글에서는 React 애플리케이션에서 Redux를 사용하여 상태를 관리하는 방법을 설명합니다. Redux의 기본 개념부터 간단한 예제까지 다룹니다.</p>
                    </div>
                </div>
                <div class="card">
                    <figure class="card__img">
                        <source srcset="assets/img/blog02.jgp, assets/img/blog02.jgp, assets/img/blog02@2x.jgp 2x, assets/img/blog02@3x.jgp 3x" />
                        <a href="#" class="more"><img src="assets/img/blog02.jpg" alt="소개이미지"></a>
                    </figure>
                    <div class="card__title">
                        <h3>React에서 Redux를 사용하는 방법</h3>
                        <p class="three-line">이 글에서는 React 애플리케이션에서 Redux를 사용하여 상태를 관리하는 방법을 설명합니다. Redux의 기본 개념부터 간단한 예제까지 다룹니다.</p>
                    </div>
                </div>
                <div class="card">
                    <figure class="card__img">
                        <source srcset="assets/img/blog02.jgp, assets/img/blog02.jgp, assets/img/blog02@2x.jgp 2x, assets/img/blog02@3x.jgp 3x" />
                        <a href="#" class="more"><img src="assets/img/blog02.jpg" alt="소개이미지"></a>
                    </figure>
                    <div class="card__title">
                        <h3>React에서 Redux를 사용하는 방법</h3>
                        <p class="three-line">이 글에서는 React 애플리케이션에서 Redux를 사용하여 상태를 관리하는 방법을 설명합니다. Redux의 기본 개념부터 간단한 예제까지 다룹니다.</p>
                    </div>
                </div>
                <div class="card">
                    <figure class="card__img">
                        <source srcset="assets/img/blog02.jgp, assets/img/blog02.jgp, assets/img/blog02@2x.jgp 2x, assets/img/blog02@3x.jgp 3x" />
                        <a href="#" class="more"><img src="assets/img/blog02.jpg" alt="소개이미지"></a>
                    </figure>
                    <div class="card__title">
                        <h3>React에서 Redux를 사용하는 방법</h3>
                        <p class="three-line">이 글에서는 React 애플리케이션에서 Redux를 사용하여 상태를 관리하는 방법을 설명합니다. Redux의 기본 개념부터 간단한 예제까지 다룹니다.</p>
                    </div>
                </div>
               
            </div> -->
        </div>
        <!--//blog__article -->
        <div class="blog__comment">
            <h3>댓글쓰기</h3>
            <?php
            foreach ($commentResult as $comment) {?>
                <div class="comment__view" id="comment<?=$comment['commentID']?>">
                    <div class="avatar">
                        <img src="https://t1.daumcdn.net/tistory_admin/blog/admin/profile_default_06.png" alt="">
                    </div>
                    <div class="info">
                        <span class="nickname"><?=$comment['commentName']?></span>
                        <span class="date"><?=date("Y-m-d", $comment['regTime'])?></span>
                        <p class="msg"><?=$comment['commentMsg']?></p>
                        <!-- 삭제 -->
                        <div class="comment__delete" style="display: none">
                            <label for="commentDeletePass" class="blind">비밀번호</label>
                            <input type="password" id="commentDeletePass" name="commentDeletePass" placeholder="비밀번호">
                            <button id="commentDeleteCancel">취소</button>
                            <button id="commentDeleteButton">삭제</button>
                        </div>
                        <!-- //삭제 -->
                        <!-- 수정 -->
                        <div class="comment__modify" style="display: none">
                            <label for="msg__modify" class="blind">수정 내용</label>
                            <textarea name="msg__modify" id="msg__modify" cols rows="4" placeholder="수정할 내용을 적어주세요!"></textarea>
                            <label for="commentModifyPass" class="blind">비밀번호</label>
                            <input type="password" id="commentModifyPass" name="commentModifyPass" placeholder="비밀번호">
                            <button id="commentModifyCancel">취소</button>
                            <button id="commentModifyButton">수정</button>
                        </div>
                        <!-- //수정 -->
                        <div class="del">
                            <a href="#" class="comment__del__del">삭제</a>
                            <a href="#" class="comment__del__mod">수정</a>
                        </div>
                    </div>
                </div>
            <?php }?>

            <div class="comment__write">
                <form action="#">
                    <fieldset>
                        <legend class="blind">댓글 쓰기</legend>
                        <label for="commentPass">비밀번호</label>
                        <input type="password" id="commentPass" name="commentPass" placeholder="비밀번호" required>
                        <label for="commentName">이름</label>
                        <input type="text" id="commentName" name="commentName" placeholder="이름" required>
                        <label for="commentWrite">댓글쓰기</label>
                        <textarea id="commentWrite" name="commentWrite" rows="4" placeholder="댓글을 써주세요!" maxlength="255" required></textarea>
                        <button type="button" id="commentWriteBtn" class="btnStyle3 mt10">댓글쓰기</button>
                    </fieldset>
                </form>
            </div>
        </div>
        <!--//blog__comment -->
    </main>
    <!-- //main -->
    <?php include "../include/footer.php" ?>
    <!-- //footer -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script>
        let commentID = "";
        // 댓글 삭제 버튼
        $(".comment__del__del").click(function(e){
            e.preventDefault();
            // alert("댓글 삭제 버튼 누름");
            $(this).parent().prev().prev().show();
            commentID = $(this).parent().parent().parent().attr("id");
        })
        // 댓글 삭제 취소
        $("#commentDeleteCancel").click(function(){
            $(".comment__delete").hide();
        })
        // 댓글 삭제 버튼 -> 삭제 버튼
        $("#commentDeleteButton").click(function(){
            let number = commentID.replace(/[^0-9]/g, "");
            if($("#commentDeletePass").val() == ""){
                alert("댓글 작성시 비밀번호를 작성해주세요!");
                $("#commentDeletePass").focus();
            } else (
                $.ajax({
                    url: "blogCommentDelete.php",
                    method: "POST",
                    dataType: "json",
                    data: {
                        "commentPass": $("#commentDeletePass").val(),
                        "commentID": number,
                    },
                    success: function(data){
                        console.log(data);
                        if(data.result == "bad"){
                            alert("비밀번호가 틀립니다. 다시 시도해주세요");
                        } else {
                            alert("삭제되었습니다.");
                        }
                        location.reload();
                    },
                    error: function(request, status, error){
                        console.log("request" + request);
                        console.log("status" + status);
                        console.log("error" + error);

                    }
                  
                    // good: function(data){
                    //     console.log(data);
                    //     alert("삭제되었습니다.");
                    //     location.reload();
                    // },
                    // bad: function(request, status, error){
                    //     console.log("request" + request);
                    //     console.log("status" + status);
                    //     console.log("error" + error);
                    //     alert("비밀번호가 틀립니다. 다시 시도해주세요");
                    // }
                })
            )
        });
        // 댓글 쓰기 버튼
        $("#commentWriteBtn").click(function(){
            if($("#commentWrite").val() == ""){
                alert("댓글을 작성해주세요!");
                $("#commentWrite").focus();
            } else {
                $.ajax({
                    url: "blogCommentWrite.php",
                    method: "POST",
                    dataType: "json",
                    data: {
                        "blogID": <?=$blogID?>,
                        "memberID": <?=$memberID?>,
                        "name": $("#commentName").val(),
                        "pass": $("#commentPass").val(),
                        "msg": $("#commentWrite").val(),
                    },
                    success: function(data){
                        console.log(data);
                        location.reload();
                    },
                    error: function(request, status, error){
                        console.log("request" + request);
                        console.log("status" + status);
                        console.log("error" + error);
                    }
                })
            }
        })

    </script>
</body>
</html>