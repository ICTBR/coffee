<?php
//การใช้งานฟังก์ชั่นด้านตัวเลข
//  round()             ใช้ปัดเศษทศนิยมอัตโนมัติ
//  ceil()              ใช้ปัดเศษขึ้นเสมอ
//  floor()             ใช้ปัดเศษลงเสมอ
//  number_format()     ใช้ปัดเศษทศนิยมอัตโนมัติ โดยแสดงแบบ Accounting ( มี , มาให้ด้วย)

echo "<h3> ฟังก์ชั่นด้านตัวเลข </h3>";

$number = 12345.23456;

echo " \$number = $number <br><br>";

echo round( $number );  echo "<br><br>";

echo round( $number, 2 );  echo "<br><br>";

echo round( $number, 4 );  echo "<br><br>";

echo ceil($number);  echo "<br><br>";

echo floor( $number);  echo "<br><br>";

echo number_format( $number,2);  echo "<br><hr>";

//การใข้งานฟังก์ชั่นด้านตัวหนังสือ string

// strlen()             ใช้นับจำนวนตัวอักษร
// substr()             ใช้ตัวแบ่งตัวอักษร
// str_replace()        ใช้ค้นหาและแทนที่ตัวอักษร  ตัวพิมพ์ใหญ่-เล็กไม่เหมือนกัน
// str_ireplace()        ใช้ค้นหาและแทนที่ตัวอักษร  ตัวพิมพ์ใหญ่-เล็กไม่ต่างกัน

echo "<h3> ฟังก์ชั่นตัวหนังสือ  </h3>";

$word = "I live in Bangkok but I come from Korea.";

echo "\$word = $word <br><br>";

echo strlen( $word );  echo "<br><br>";

echo substr($word,10);  echo "<br><br>";

echo substr( $word ,22);  echo "<br><br>";

echo substr( $word ,22,7);  echo "<br><br>";

echo substr( $word ,34,5);  echo "<br><br>";

echo str_replace( "Bangkok","Lopburi",$word);  echo "<br><br>";

echo str_replace( "Korea","Thai",$word);  echo "<br><br>";

echo str_ireplace( "korea","Thai",$word);  echo "<br><br>";

echo str_replace( "I","rut",$word);  echo "<br><br>";

//----- ระบบกรองคำหยาบ -----

echo "<h3> ระบบกรองคำหยาบ </h3> ";

$word = "ไอ้บ้าเอ้ย แม่มกวนมาก โคตรบ้าเลย เฮียจิงๆ";

$word= str_replace( "ไอ้บ้า","<font color ='red'>xxx</font>",$word);

$word =str_replace( "แม่ม","<font color ='red'>xxx</font>",$word);

$word =str_replace( "เฮีย","<font color ='red'>xxx</font>",$word);

echo"\$word =$word <br>";

$rude = ['ไอ้','อี','บ้า'];

for ( $i = 0 ;$i < count($rude);$i++)
{
$word = str_replace($rude[$i],"<font color ='red'>xxx</font>",$word);

}
echo"\$word =$word <br>";

?>