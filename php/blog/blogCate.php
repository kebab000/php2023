<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    
    if(isset($_GET['category'])){
        $category = $_GET['category'];
    }else {
        Header("Location: blog.php");
    }
    // echo "<pre>";
    // var_dump($_SESSION);
    // echo "</pre>";
  

    $categorySql = "SELECT * FROM blog WHERE blogDelete = 0 AND  blogCategory = '$category' ORDER BY blogID DESC";
    $categoryResult = $connect -> query($categorySql);
    $categoryInfo = $categoryResult -> fetch_array(MYSQLI_ASSOC);
    $categoryCount = $categoryResult -> num_rows;


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
    <div class="blog__search bmStyle">
            <h2><?=$category ?></h2>
            <?php
                if($categoryCount==0){
                    echo "<p>".$category."과 관련된 글이 없습니다.</p>";
                } else {
                    echo "<p>".$categoryInfo['blogCategory']."과 관련된 글이 ".$categoryCount."개 있습니다.</p>";
                }
            ?>
            
            <div class="search">
                <?php if(isset($_SESSION['memberID'])){ ?>  
                    <!-- 로그인을 한 경우 -->
                    <form action="#" name="#" method="POST">
                        <legend class="blind">블로그 검색</legend>
                        <input type="search" name="searchKeyword" aria-label="검색" placeholder="검색어를 입력하세요" class="inputStyle2">
                        <button type="submit" class="btnStyle4">검색하기</button>
                        <a href="blogWrite.php" class="btnStyle4 white">글쓰기</a>
                    </form>
                <?php }else{ ?>  
                    <!-- 로그인이 안된 경우 -->
                    <form action="#" name="#" method="POST">
                        <legend class="blind">블로그 검색</legend>
                        <input type="search" name="searchKeyword" aria-label="검색" placeholder="검색어를 입력하세요" class="inputStyle2">
                        <button type="submit" class="btnStyle4">검색하기</button>
                    </form>
                <?php } ?>   
            </div>
        </div>
        <!--//blog__title -->
        <div class="blog__inner">
            <div class="left mt70">
            <div class="blog__wrap">
                    <div class="cards__inner row line4">
                        <?php foreach($categoryResult as $blog){ ?>
                            <div class="card">
                                <figure class="card__img">
                                    <a href="blogView.php?blogID=<?=$blog['blogID']?>">
                                        <img src="../assets/blog/<?=$blog['blogImgFile']?>" alt="<?=$blog['blogTitle']?>">
                                    </a>
                                </figure>
                                <div class="card__title">
                                    <h3><a href="blogView.php?blogID=<?=$blog['blogID']?>"><?=$blog['blogTitle']?></a></h3>
                                    <p><?=$blog['blogContents']?></p>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="right">
                <div class="blog__aside">
                    <?php include "../include/blogTitle.php" ?>
                    <?php include "../include/blogCate.php" ?>
                    <?php include "../include/blogLatest.php" ?>
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
    </main>
    <!-- //main -->
    <?php include "../include/footer.php" ?>
    <!-- //footer -->
</body>
</html>