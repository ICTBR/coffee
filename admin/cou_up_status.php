<?php
session_start();
if ( ! isset($_SESSION['login_id']) ) 
{
    header("Refresh:1; url=login.php");
    exit();
}
include("../inc_connect.php"); // ../คือการออกจ้างนอก 1 ชั้น เนื่องจากหา ไม่เจอ

$id=$_REQUEST['id'];
$value=$_REQUEST['value'];
$tid=substr($id,strpos($id, '_')+1,strlen($id));


    $sql = "UPDATE course SET cou_status='".$value."' WHERE cou_id='".$tid."'";
    $rst = mysqli_query($conn,$sql);


?>
