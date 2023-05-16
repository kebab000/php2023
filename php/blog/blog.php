<?php 
    include "../connect/connect.php";
    include "../connect/session.php";


    $sql = "SELECT count(boardID) FROM board";
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
        <title>블로그</title>

        <?php include "../include/head.php" ?>
    </head>
    <body class="gray">

        <?php include "../include/skip.php" ?>
        <!-- //skip -->

        <?php include "../include/header.php" ?>
        <!-- //header -->
        <main id="main" class="container">
        <div class="blog__search bmStyle">
            <h2>개발자 블로그 입니다.</h2>
            <p> 개발과 관련된 글을 작성해주세요</p>
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
        <div class="blog__inner">
            <div class="left">
               
                <div class="blog__wrap">
                    <h2>All Post</h2>
                    <div class="cards__inner col2 line3">
                        <div class="card">
                            <figure class="card__img">
                                <source srcset="../assets/img/blog02.jgp, ../assets/img/blog02.jgp, assets/img/blog02@2x.jgp 2x, ../assets/img/blog02@3x.jgp 3x" />
                                <img src="../assets/img/blog02.jpg" alt="소개이미지">
                            </figure>
                            <div class="card__title">
                                <h3>React에서 Redux를 사용하는 방법</h3>
                                <p class="three-line">이 글에서는 React 애플리케이션에서 Redux를 사용하여 상태를 관리하는 방법을 설명합니다. Redux의 기본 개념부터 간단한 예제까지 다룹니다.</p>
                            </div>
                            <div class="card__info">
                                <a href="#" class="more">더보기</a>
                            </div>
                        </div>
                        <div class="card">
                            <figure class="card__img">
                                <source srcset="../assets/img/blog02.jgp, ../assets/img/blog02.jgp, assets/img/blog02@2x.jgp 2x, ../assets/img/blog02@3x.jgp 3x" />
                                <img src="../assets/img/blog02.jpg" alt="소개이미지">
                            </figure>
                            <div class="card__title">
                                <h3>React에서 Redux를 사용하는 방법</h3>
                                <p class="three-line">이 글에서는 React 애플리케이션에서 Redux를 사용하여 상태를 관리하는 방법을 설명합니다. Redux의 기본 개념부터 간단한 예제까지 다룹니다.</p>
                            </div>
                            <div class="card__info">
                                <a href="#" class="more">더보기</a>
                            </div>
                        </div>
                        <div class="card">
                            <figure class="card__img">
                                <source srcset="../assets/img/blog02.jgp, ../assets/img/blog02.jgp, assets/img/blog02@2x.jgp 2x, ../assets/img/blog02@3x.jgp 3x" />
                                <img src="../assets/img/blog02.jpg" alt="소개이미지">
                            </figure>
                            <div class="card__title">
                                <h3>React에서 Redux를 사용하는 방법</h3>
                                <p class="three-line">이 글에서는 React 애플리케이션에서 Redux를 사용하여 상태를 관리하는 방법을 설명합니다. Redux의 기본 개념부터 간단한 예제까지 다룹니다.</p>
                            </div>
                            <div class="card__info">
                                <a href="#" class="more">더보기</a>
                            </div>
                        </div>
                        <div class="card">
                            <figure class="card__img">
                                <source srcset="../assets/img/blog02.jgp, ../assets/img/blog02.jgp, assets/img/blog02@2x.jgp 2x, ../assets/img/blog02@3x.jgp 3x" />
                                <img src="../assets/img/blog02.jpg" alt="소개이미지">
                            </figure>
                            <div class="card__title">
                                <h3>React에서 Redux를 사용하는 방법</h3>
                                <p class="three-line">이 글에서는 React 애플리케이션에서 Redux를 사용하여 상태를 관리하는 방법을 설명합니다. Redux의 기본 개념부터 간단한 예제까지 다룹니다.</p>
                            </div>
                            <div class="card__info">
                                <a href="#" class="more">더보기</a>
                            </div>
                        </div>
                        <div class="card">
                            <figure class="card__img">
                                <source srcset="../assets/img/blog02.jgp, ../assets/img/blog02.jgp, assets/img/blog02@2x.jgp 2x, ../assets/img/blog02@3x.jgp 3x" />
                                <img src="../assets/img/blog02.jpg" alt="소개이미지">
                            </figure>
                            <div class="card__title">
                                <h3>React에서 Redux를 사용하는 방법</h3>
                                <p class="three-line">이 글에서는 React 애플리케이션에서 Redux를 사용하여 상태를 관리하는 방법을 설명합니다. Redux의 기본 개념부터 간단한 예제까지 다룹니다.</p>
                            </div>
                            <div class="card__info">
                                <a href="#" class="more">더보기</a>
                            </div>
                        </div>
                        <div class="card">
                            <figure class="card__img">
                                <source srcset="../assets/img/blog02.jgp, ../assets/img/blog02.jgp, assets/img/blog02@2x.jgp 2x, ../assets/img/blog02@3x.jgp 3x" />
                                <img src="../assets/img/blog02.jpg" alt="소개이미지">
                            </figure>
                            <div class="card__title">
                                <h3>React에서 Redux를 사용하는 방법</h3>
                                <p class="three-line">이 글에서는 React 애플리케이션에서 Redux를 사용하여 상태를 관리하는 방법을 설명합니다. Redux의 기본 개념부터 간단한 예제까지 다룹니다.</p>
                            </div>
                            <div class="card__info">
                                <a href="#" class="more">더보기</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="right">
                <div class="blog__aside">
                    <div class="intro">
                        <picture class="img">
                            <source srcset="../assets/img/intro01.png, ../assets/img/intro01@2x.png 2x, ../assets/img/intro01@3x.png 3x" />
                            <img src="../assets/img/intro01.png" alt="소개이미지">
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
                    </div>

                </div>
            </div>
        </div>
        <!-- <div class="sliders__inner"></div> - 각 페이지 소개 배너
                <div class="join__inner"></div> - 회원가입 페이지
                <div class="board__inner"></div> - 게시판 페이지

        <div class="banners__inner"></div> - 
        <div class="cards__inner"></div>
        <div class="images__inner"></div>
        <div class="ads__inner"></div>
        <div class="texts__inner"></div>
        <div class="login__inner"></div>
        <div class="bolg__inner"></div> -->
    </main>
    <!-- //main -->

    <?php include "../include/footer.php" ?>
    <!-- //footer -->
    
    </body>
</html>