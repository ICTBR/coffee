<?php
session_start();

session_destroy();//ลบเซสชั่นทั้งหมด

header("Refresh:1; url=login.php");

?>

