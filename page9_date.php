<?php
date_default_timezone_set("Asia/Bangkok");


echo date ("d/m/Y H:i:s"); echo"<br>";//แบบไทย
echo date ("Y/m/d H:i:s"); echo"<br>";//แบบ MySQL

//-------- คำสั่ง mktime()-----------
//จากวันคริสมานต์ นับไปอีก10 เป็นวันที่เท่าไร

echo "วันคริสมาสต์:".date ("d/m/Y ",mktime(0,0,0,12,25,2023)); echo"<br>";
echo "นับไปอีก 10 วัน :".date ("d/m/Y ",mktime(0,0,0,12,25+10,2023)); echo"<br>";

//จากวันปิยะ นับไปอีก45 เป็นวันที่เท่าไร

echo "วันปิยะมหาราช:".date ("d/m/Y ",mktime(0,0,0,10,23,2023)); echo"<br>";
echo "นับไปอีก 45 วัน :".date ("d/m/Y ",mktime(0,0,0,10,23+45,2023)); echo"<br>";

echo "สั่งซื้อสินค้า:".date ("d/m/Y ",mktime(date("H"),date("i"),date("s"),date("m"),date("d"),date("Y"))); echo"<br>";
echo "นับไป3 วัน:".date ("d/m/Y ",mktime(date("H"),date("i"),date("s"),date("m"),date("d")+3,date("Y"))); echo"<br>";
?>


?>