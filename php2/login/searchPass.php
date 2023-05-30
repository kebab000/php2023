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
    <title>비밀번호 찾기</title>
    <!-- CSS -->
    <?php include "../include/head.php" ?>
</head>
<body class="bgStyle1">
    <?php include "../include/skip.php" ?>
    <!-- //skip -->
    <?php include "../include/header.php" ?>
    <!-- //header -->
    <main id="main" class="container login__container">
        <div class="pwdlost">
            <div class="pwdlost__inner center">
                <div class="logo">PLANTY</div>
                <h2>비밀번호찾기</h2>
                <div class="pwdlost__form">
                    <form action="modiPass.php" name="searchPass" method="post">
                        <fieldset>
                            <legend class="blind">비밀번호찾기 영역</legend>
                            <div>
                                <input type="name" id="youName" name="youName" placeholder="이름을 입력해주세요" class="inputStyle__pwd" required>
                                <p id="youNameComment"><!--이름은 한글로만 작성할 수 있습니다.--></p>
                            </div>
                            <div>
                                <input type="email" id="youEmail" name="youEmail" placeholder="이메일을 입력해주세요" class="inputStyle__pwd" required>
                                <p id="youEmailComment"><!--이메일이 존재합니다.--></p>
                            </div>
                            <div class="result">
                                <select name="youQuestion" id="youQuestion">
                                    <option value="1">당신의 보물 1호는?</option>
                                </select>
                                <input class="inputStyle__pwd__qustion" type="text" id="youAnswer" name="youAnswer" placeholder="질문의 답을 입력해주세요" required>
                            </div>
                            <button type="submit" class="btnStyle_pwd btnStyle2">확인</button>
                            <div class="login_more mt10 btStyle">
                                <span><a href="SearchId.php">아이디 찾기</a></span>
                                <span><a href="../join/joinAgree.php">회원가입</a></span>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <!-- //main -->
    <?php include "../include/footer_min.php" ?>
    <!-- //footer -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        document.querySelector("form").addEventListener("submit", (event) => {
            event.preventDefault()
            joinChecks();
        });
        function joinChecks() {
            //이름 유효성 검사
            if ($("#youName").val() == '') {
                $("#youNameComment").text("* 이름을 입력해주세요.");
                $("#youName").focus();
                return false;
            }
            let getYouName = RegExp(/^[가-힣]+$/);
            if (!getYouName.test($("#youName").val())) {
                $("#youNameComment").text("* 이름은 한글만 사용 가능합니다.");
                $("#youName").val('');
                $("#youName").focus();
                return false;
            }
            //이메일 유효성 검사
            if ($("#youEmail").val() == '') {
                $("#youEmailComment").text("* 이메일을 입력해주세요.");
                $("#youEmail").focus();
                return false;
            }
            let getYouEmail = RegExp(/^[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*.[a-zA-Z]{2,3}$/i);
            if (!getYouEmail.test($("#youEmail").val())) {
                $("#youEmailComment").text("* 이메일 형식에 맞게 작성해주세요.");
                $("#youEmail").val('');
                $("#youEmail").focus();
                return false;
            }
        }

        let youEmail = $("#youEmail").val();
        let youName = $("#youName").val();
        if(youName == null || youName == ''){
            $("#youNameComment").text("아이디를 입력해주세요!!");
            return false;
        } else if(youEmail == null || youEmail == ''){
            $("#youEmailComment").text("이메일을 입력해주세요!!");
            return false;
        } else {
            $.ajax({
                type : "POST",
                url : "userCheck.php",
                data : {"youEmail": youEmail, "youName": youName, "type": "Check"},
                dataType : "json",
                success : function(data){
                    if(data.result == "good"){
                        post_to_url('userFindPwSave.php', {'youEmail': youEmail, 'youName': youName});
                        return true;
                    } else if (data.result == "bad") {
                        $("#Comment").text("이메일 과 아이디가 일치하지 않습니다.");
                        return false;
                    } 
                },
                error : function(request, status, error){
                    console.log("request" + request);
                    console.log("status" + status);
                    console.log("error" + error);
                }
            })
        }

        function post_to_url(path, params, method) {
            method = method || "post";
            const form = document.createElement("form");
            form.setAttribute("method", method);
            form.setAttribute("action", path);
            for (let key in params) {
                let hiddenField = document.createElement("input");
                hiddenField.setAttribute("type", "hidden");
                hiddenField.setAttribute("name", key);
                hiddenField.setAttribute("value", params[key]);
                form.appendChild(hiddenField);
            }
            document.body.appendChild(form);
            form.submit();
        }
    </script>
</body>
</html>