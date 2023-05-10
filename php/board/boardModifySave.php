<?php
    include "../connect/connect.php";
    include "../connect/session.php";

    $boardID = $_POST['boardID'];
    $boardTitle = $_POST['boardTitle'];
    $boardContents = $_POST['boardContents'];
    $boardPass = $_POST['boardPass'];

    $boardTitle = $connect -> real_escape_string($boardTitle);
    $boardContents = $connect -> real_escape_string($boardContents);
    $$boardPass = $connect -> real_escape_string($boardContents);
    $memberID = $_SESSION['memberID'];

    // echo $memberID;

    $sql = "SELECT * FROM members WHERE memberID = {$memberID}";
    $result = $connect -> query($sql);
    
    if($result){
        $info = $result -> fetch_array(MYSQLI_ASSOC);
        if($info['memberID'] == $memberID && $info['youPass'] == $boardPass){
            $sql = "UPDATE board SET boardTitle = '{$boardTitle}', boardContents = '{$boardContents}' WHERE boardID = '{$boardID}'";
            $connect -> query($sql);
        } else {
            echo "<script>alert('비밀번호가 틀렸습니다. 다시 한번 확인해주세요!');location.href = 'boardView.php?boardID=".$boardID."' </script>";
        }
    } else {
        echo "<script>alert('관리자 에러!!')</script>";
    }
?>
<script>
    location.href = "board.php";
</script>
    
