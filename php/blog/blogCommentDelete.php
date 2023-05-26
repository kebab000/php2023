<?php
    // include "../connect/connect.php";
    // $commentPass = $_POST['commentPass'];
    // $commentID = $_POST['commentID'];
    // $sql = "DELETE FROM blogcomment WHERE commentID = '$commentID' AND commentPass = $commentPass";
    // $result = $connect -> query($sql);
    // echo json_encode(array("info" => $sql));
?>
<?php
    include "../connect/connect.php";

    $commentPass = $_POST['commentPass'];
    $commentID = $_POST['commentID'];

    $sql = "SELECT * FROM blogComment WHERE commentPass = '$commentPass' AND commentID = '$commentID'";
    $result = $connect -> query($sql);
    
    if($result -> num_rows == 0){
        $jsonResult = "bad";
    } else {
        $sql = "DELETE FROM blogcomment WHERE commentID = '$commentID'";
        $connect -> query($sql);
        $jsonResult = "good";
    }
    echo json_encode(array("result" => $jsonResult));
?>