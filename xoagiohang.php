<?php
    session_start();
    $id = $_GET["id"];
    if (isset($_SESSION["cart"][$id])){
        unset($_SESSION["cart"][$id]);
    }
    header("location:giohang_giaodien.php");
?>