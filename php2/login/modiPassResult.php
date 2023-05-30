<?php
    include "../connect/connect.php";
    $youEmail = $_POST['youEmail'];
    $youQuestion = $_POST['youQuestion'];
    $youAnswer = $_POST['youAnswer'];

    
    
    
    // 세션 생성
    
    
    $youPass = $_POST['youPass'];
    
    $youName = $connect -> real_escape_string(trim($youName));
    $youEmail = $connect -> real_escape_string(trim($youEmail));;
    $youPass = $connect -> real_escape_string(trim($youPass));;
    
    $sql = "SELECT * FROM plantyMember WHERE youEmail = {$youEmail}";
    $result = $connect -> query($sql);  

    //    $youPass = sha1("web".$youPass);
    // 회원가입
    $sql = "UPDATE plantyMember SET youPass = '${youPass}' WHERE youEmail  = '${youEmail}' ";
    $result = $connect -> query($sql);  

?>
<script>
    location.href = "login.php";
</script>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>비밀번호 변경</title>
        <!-- CSS -->
        <?php include "../include/head.php" ?>
</head>
<body class="bgStyle1">
    <?php include "../include/skip.php" ?>
    <!-- //skip -->
    <?php include "../include/header.php" ?>
    <!-- //header -->
    <main id="main" class="container">
        <div class="login__container">
            <div class="pwdlost">
                <div class="pwdlost__inner center">
                    <div class="logo">PLANTY</div>
                    <h2>비밀번호 변경하기</h2>
                    <div class="pwdlost__form">
                        <form action="#" name="#" method="post">
                            <fieldset>
                                <legend class="blind">비밀번호 변경 영역</legend>
                                    <p>비밀번호가 성공적으로 변경되었습니다. 로그인을 해주세요.</p>
                                    <button type="submit" class="btnStyle2_login btnStyle2 mt20 mb20">로그인</button>
                                    <span><a href="SearchId.php">아이디 찾기</a></span>
                                    <span><a href="../join/join.php">회원가입</a></span>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- //main -->
    <?php include "../include/footer_min.php" ?>
    <!-- //footer -->
    <script>
        function post_to_url(path, params, method) {
            method = method || 'post';
            const form = document.createElement('form');
            form.setAttribute('method', method);
            form.setAttribute('action', path);
            for(let key in params) {
                let hiddenField = document.createElement('input');
                hiddenField.setAttribute('type', 'hidden');
                hiddenField.setAttribute('name', key);
                hiddenField.setAttribute('value', params[key]);
                form.appendChild(hiddenField);
            }
            document.body.appendChild(form);
            form.submit();
        }
    </script>
</body>
</html>