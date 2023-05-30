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
    <title>메인 페이지</title>
    <?php include "../include/head.php" ?>
    <!-- SCRIPT -->
</head>
<body class="bgStyle3">
<?php include "../include/skip.php" ?>
<!-- //skip -->
<?php include "../include/header.php" ?>
<!-- //header -->
    <main id="main">
        <div class="community__wrap container bmStyle">
            <div class="community__W__inner">
                <form action="communityWriteSave.php" name="communityWrite" method="post" enctype="multipart/form-data">
                    <select name="commuCategory" id="commuCategory">
                        <option value="내식물자랑">내 식물 자랑</option>
                        <option value="식물관리정보">식물 관리 정보</option>
                        <option value="플랜테리어">플랜테리어</option>
                    </select>
                    <legend class="blind">커뮤니티 에디터 영역</legend>
                    <input class="inputStyle_commWrite" type="text" id="commuTitle" name="commuTitle" placeholder="제목을 입력해주세요" required>
                    <textarea name="commuContents" id="commuContents" rows="30" class="inputStyle_commWrite contets" placeholder="내용을 입력해주세요"></textarea>
                    <div class="editor_btn">
                        <div class="editor_btn_img">
                            <input class="editor_btn_imgName" value="메인 이미지 선택" placeholder="메인 이미지 선택">
                            <label for="commuImgFile">이미지 선택</label>
                            <input type="file" name="commuImgFile" id="commuImgFile" class="commFile" accept=".jpg, .jpeg, .png, .gif" placeholder="jpg, gif, png 파일만 넣을 수 있습니다.">
                        </div>
                        <button type="submit" class="editSave_btn">작성하기</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <?php include "../include/footer_min.php" ?>
    <script>
        document.getElementById('commuImgFile').addEventListener('change', function() {
            var file = document.getElementById('commuImgFile').files[0];
            var fileName = file.name;
            document.querySelector('.editor_btn_imgName').value = fileName;
        });
        
	</script> 
    <script src="../html/assets/js/headerNav.js"></script>
</body>
</html>