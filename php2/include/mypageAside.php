<div class="mypage__asid">
    <div class="profile__box">
        <figure class="profile__img">
            <img src="userPlofileImg/<?= $profileName ?>" alt="소개이미지">
        </figure>
        <div class="profile__info">
    <!-- 로그인을 한 경우 -->
            <div class="nick"><?=$_SESSION['youNick'] ?></div>
            <div class="email"><?=$_SESSION['youEmail'] ?></div>
        </div>
    </div>
    <div class="profile__nav">
        <div class="nav__list">
            <ul class="nav__menu">
                <li><a href="../mypage/myPlant.php">내 식물 관리</a></li>
                <li><a href="../mypage/mypageInfo.php">내 정보 관리</a></li>
                <li><a href="../mypage/myWritten.php">내 활동 관리</a>
                    <ul class="submenu">
                        <li><a href="../mypage/myWritten.php">내가 쓴 글</a></li>
                        <!-- <li><a href="#">댓글 관리</a></li> -->
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
