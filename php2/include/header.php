<header id="header">
    <h2 class="blind">헤더 영역</h2>
    <div class="container">
        <div class="header__inner">
            <div class="left">
                <h1 class="logo"> <a href="../main/main.php">PLANTY</a></h1>
            </div>
            <nav class="nav__inner" >
                    <ul>
                        <li><a href="../brandInt/brandInt.php">PLANTY</a>
                            <ul class="submenu">
                                <li><a href="#">브랜드철학</a></li>
                                <li><a href="#">핵심가치</a></li>
                            </ul>
                        </li>
                        <li><a href="../dictionary/dictionary.php">식물 사전</a>
                            <ul class="submenu">
                                <li><a href="#">식물관리정보</a></li>
                                <li><a href="#">식물소개</a></li>
                                <li><a href="#">식물검색</a></li>
                            </ul>
                        </li>
                        <!-- <li><a href="../calendar/calendar.php" class="calendar">캘린더</a>
                            <ul class="submenu">
                                <li><a href="#">이달의 식물</a></li>
                                <li><a href="#">내식물</a></li>
                            </ul>
                        </li> -->
                        <li><a href="../community/community.php">커뮤니티</a>
                            <ul class="submenu">
                                <li><a href="#">플랜테리어</a></li>
                                <li><a href="#">내식물공유</a></li>
                            </ul>
                        </li>
                        <li><a href="../board/board.php">고객센터</a>
                            <ul class="submenu">
                                <li><a href="#">문의사항</a></li>
                                <li><a href="#">이벤트</a></li>
                                <li><a href="#">F&Q</a></li>
                                <li><a href="#">Q&A</a></li>
                                <li><a href="#">공지사항</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            <div class="right">
                <?php if(isset($_SESSION['memberID'])){ ?>  
                    <!-- 로그인을 한 경우 -->
                    <ul>
                        <li><a href="../mypage/mypage.php"><?=$_SESSION['youNick'] ?>님</a></li>
                        <li><a href="../mypage/mypage.php">마이페이지</a></li>
                        <li><a href="../login/logout.php">로그아웃</a></li>
                    </ul>
                <?php }else{ ?>  
                    <!-- 로그인이 안된 경우 -->
                    <ul>
                        <li class="mt25"><a href="/php2/login/login.php" class="btnStyle2">Sign in</a></li>
                    </ul>
                <?php } ?>   
            </div>
        </div>
    </div>
</header>
