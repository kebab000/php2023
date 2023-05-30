<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    $commuID = $_GET['commuID'];
    $commuID = $connect -> real_escape_string($commuID);
    $sql = "DELETE FROM plantyCommu WHERE commuID = {$commuID}";
    $connect -> query($sql);
?>
<script>
    location.href ="community.php";
</script>