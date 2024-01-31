<?php
session_start();
if ( ! isset($_SESSION['login_id']) ) 
{
    header("Refresh:1; url=login.php");
    exit();
}
include("../inc_connect.php"); // ../คือการออกจ้างนอก 1 ชั้น เนื่องจากหา ไม่เจอ

$id=$_REQUEST['id'];

    $sql = "DELETE FROM student WHERE stu_id='".$id."'";
    $rst = mysqli_query($conn,$sql);


?>
