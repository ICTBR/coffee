<?php
//การเข้ารหัสด้วยคำสั่ง password_hash() เป็นคำสั่งรุ่นล่าสุดที่ปลอดภัยที่สุด

$password = "1234";

// echo md5($password)."<br><br>"; //64
// echo sha1($password)."<br><br>";//128

$hashed = password_hash($password,PASSWORD_DEFAULT);//เข้ารหัส ?? ด้วยคำสั่ง mpaaword_hash()
echo $hashed."<br><br>";

//การตรวจสอบว่าตรงกันหรือไม่ ด้วยคำสั่ง password_verify()  (ไม่ใช่การถอดรหัสและเป็นการคืนค่า true or false)

if ( password_verify( "1234", $hashed ) )
    echo "Correct";
else
    echo "Incorrect";


?>