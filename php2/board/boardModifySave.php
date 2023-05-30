<?php
    include "../connect/connect.php";
    include "../connect/session.php";

    $boardID = $_POST['boardID'];
    $boardTitle = $_POST['boardTitle'];
    $boardContents = $_POST['boardContents'];

    $boardTitle = $connect->real_escape_string($boardTitle);
    $boardContents = $connect->real_escape_string($boardContents);
    $memberID = $_SESSION['memberID'];

    $sql = "SELECT * FROM plantyMember WHERE memberID = '{$memberID}'";
    $result = $connect->query($sql);

    if ($result) {
        $info = $result->fetch_array(MYSQLI_ASSOC);
        if ($info['memberID'] == $memberID) {
            $sql = "UPDATE plantyBoard SET boardTitle = '{$boardTitle}', boardContents = '{$boardContents}' WHERE boardID = '{$boardID}'";
            $connect->query($sql);
        }
    } else {
        echo "<script>alert('관리자 에러!!')</script>";
    }
?>
<script>
    location.href = "board.php";
</script>
    

