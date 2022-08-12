<?php

  $id = $_GET["id"];
  $_SESSION["soban"] = $id;
  header("location:datban_giaodien.php");

?>