<?php
    $dbHot="localhost";
    $dbUser="root";
    $dbPass="";
    $dbName="test";

    $conn = mysqli_connect($dbHot,$dbUser,$dbPass,$dbName);
    if($conn){
        $setLang=mysqli_query($conn, "SET NAMES 'utf8'");
    }else{
        die("kết nói thất bại".mysqli_connect_error());
    }
?>