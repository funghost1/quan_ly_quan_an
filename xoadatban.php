<?php
    session_start();
    $id = $_GET["id"];
    if (isset($_SESSION["datban"][$id])){
        unset($_SESSION["datban"][$id]);
    }
    header("location:datban_giaodien.php");
?>