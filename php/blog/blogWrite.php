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
        <link rel="stylesheet" href="https://uicdn.toast.com/editor/latest/toastui-editor.min.css" />
        <title>블로그 작성</title>

        <?php include "../include/head.php" ?>
        <style>
        :not(.auto-height)>.toastui-editor-defaultUI>.toastui-editor-main {
            background-color: #fff;
        }
    </style>
    </head>
    <body class="gray">

        <?php include "../include/skip.php" ?>
        <!-- //skip -->

        <?php include "../include/header.php" ?>
        <!-- //header -->
        <main id="main" class="container">
        <div class="blog__search bmStyle">
            <h2>개발자 블로그 입니다.</h2>
            <p>개발과 관련된 글을 작성해 보세요</p>
        </div>
        <div class="blog__inner">
            <div class="blog__write">
                <form action="blogWriteSave.php" name="blogWrite" method="post" enctype="multipart/form-data">
                    <fieldset>
                        <legend class="blind">게시글 작성하기</legend>
                        <div>
                            <label for="blogCategory">카테고리</label>
                            <select name="blogCategory" id="blogCategory">
                                <option value="javascript">Javascript</option>
                                <option value="jquery">Jquery</option>
                                <option value="react">React</option>
                                <option value="other">잡담</option>
                            </select>
                        </div>
                        <div>
                            <label for="blogTitle" class="blog_title">제목</label>
                            <input type="text" name="blogTitle" id="blogTitle" class="inputStyle" blogFile>
                        </div>
                        <div>
                            <label for="blogContents" class="blog_tible">내용</label>
                            <textarea name="blogContents" id="blogContents" rows="20" class="inputStyle"></textarea>
                            <!-- <div id="editor"></div> -->
                        </div>
                        <div class="mt30">
                            <label for="blogFile">파일</label>
                            <input type="file" name="blogFile" id="blogFile" accept=".jpg,.jpeg, .png,.gif" placeholder="jpg, gif, png 파일만 넣을 수 있습니다. 용량은 1mb를 넘길 수 없습니다">
                        </div>
                        <button type="submit" class="btnStyle3">저장하기</button>
                    </fieldset>
                </form>
            </div>
        </div>  
    </main>
    <!-- //main -->

    <?php include "../include/footer.php" ?>
    <!-- //footer -->
    <script src="https://uicdn.toast.com/editor/latest/toastui-editor-all.min.js"></script>
    <script>
        const Editor = toastui.Editor;
 
        const editor = new Editor({
            el: document.querySelector('#editor'),
            height: '600px',
            initialEditType: 'markdown',
            previewStyle: 'vertical'
            });
    </script>
    </body>
</html>