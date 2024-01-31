<?php
include("inc_connect.php");//Connected

echo "<h3> คุณครู </h3>";
$sql = "Select * From teacher";
$rst = mysqli_query( $conn,$sql);
$arr = mysqli_fetch_array($rst);

echo"รหัส:" .$arr["id"]."<br>";
echo"ชื่อ:" .$arr['name']." ".$arr['surname']."<br>";
echo"นามสกุล:" .$arr['surname']."<br>";
echo"เพศ:" .$arr['gender']."<br>";
echo"ตำแหน่ง:" .$arr['position']."<hr>";

echo "<h3> นักเรียน </h3>";
$sql = "Select * From student";
$rst = mysqli_query( $conn,$sql);
$arr = mysqli_fetch_array($rst);

echo"รหัส:" .$arr["stu_id"]."<br>";
echo"ชื่อ:" .$arr['stu_name']."<br>";
echo"นามสกุล:" .$arr['stu_surname']."<br>";
echo"ชั้นปี:" .$arr['stu_level']."<br>";
echo"อีเมล:" .$arr['stu_email']."<hr>";

echo "<h3> วิชา </h3>";
$sql = "Select * From subject";
$rst = mysqli_query( $conn,$sql);
$arr = mysqli_fetch_array($rst);

echo"รหัสวิชา:" .$arr["sub_id"]."<br>";
echo"ชื่อวิชา:" .$arr['sub_name']."<br>";
echo"รายละเอียด:" .$arr['sub_detail']."<br>";
echo"รูปภาพ:" .$arr['sub_image']."<hr>";

//ดึงลูป
echo "<h3> วิชาทั้งหมด </h3>";
$sql = "Select * From subject";
$rst = mysqli_query( $conn,$sql);
while ($arr = mysqli_fetch_array($rst))
{
echo"รหัสวิชา:" .$arr["sub_id"]."<br>";
echo"ชื่อวิชา:" .$arr['sub_name']."<br>";
echo"รายละเอียด:" .$arr['sub_detail']."<br>";
echo"รูปภาพ:" .$arr['sub_image']."<hr>";

}

mysql_close($conn); //ตัดการเชื่อมต่อ
?>