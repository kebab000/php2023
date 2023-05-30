<?php 
    include "../connect/connect.php" ;
    include "../connect/session.php" ;
    include "../connect/sessionCheck.php" ;
    // echo "<pre>";
    // var_dump($_SESSION);
    // echo "</pre>";
    $userID = $_SESSION['memberID'];
    $commuID = $_GET['commuID'];

    
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
        <div class="community__wrap container">
            <div class="contents__view mt120">
                <div class="community__M__inner">
                    <fieldset>
                    <form action="communityModifySave.php" name="communityModify"  method="post"  enctype="multipart/form-data">
                    <select name="commuCategory" id="commuCategory">
                                <option value="내식물자랑">내 식물 자랑</option>
                                <option value="식물관리정보">식물 관리 정보</option>
                                <option value="플랜테리어">플랜테리어</option>
                        </select>
                        <div>
                            <?php         
                            $sql = "SELECT commuID, commuTitle, commuContents, commuImgFile FROM plantyCommu WHERE commuID = {$commuID}";
                            $result = $connect -> query($sql);
                        
                            
                            if($result){
                                $info = $result -> fetch_array(MYSQLI_ASSOC);                                
                            ?>
                            <input id="commuTitle" name="commuTitle" class="commu_mody_title" value="<?=$info['commuTitle']?>"></input>  
                        </div>
                        <span class="user"><?=$youNick?></span>
                        <span class="cont__date"><?=date('Y-m-d', $info['commuRegTime'])?><em class="cont__time"><?=date('H:i:s', $info['commuRegTime'])?></em></span>
                        <span class="view__count">조회수 <em><?=$info['commuView']?></em></span>
                    </div>
                    
                    <textarea name="commuContents" id="commuContents" class="cont__desc"><?=$info['commuContents']?></textarea>
                    <div class="editor_btn_img">
                        <input class="editor_btn_imgName" value="<?=$info['commuImgFile']?>" placeholder="메인 이미지 선택" name="prevImgFile" id="prevImgFile">
                        <label class="editor_img_choice" for="commuImgFile">이미지 선택</label>
                        <input type="file" name="commuImgFile" id="commuImgFile" class="blind commFile" accept=".jpg, .jpeg, .png, .gif" placeholder="jpg, gif, png 파일만 넣을 수 있습니다.">
                        <input type="hidden" value="<?=$commuID?>" name="commuID" id="commuID">
                        <button  class="community__modify" type="submit">수정완료</button>
                    </div>
                    </fieldset>
                </form>
                <?php } ?>
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