<?php
//การสร้างฟังก์ชั่นขึ้นใช้งานเอง (user-Defind Function)

include("inc_function.php");


echo Calstock (" หมวก ",250,10);
echo Calstock (" หมวก 2 ",2000,3);
echo Calstock (" หมวก 3 ",20000,2);

echo"<br>";
$number = 70500.50;
$thai =Convert($number);
echo $thai;

echo"<br>";
//ฟังก์ชั่นที่มีการคืนค่า
function appName(){
    return "Saven";
}
function calVat($price){
    return $price * 7 / 100;;
}

//การเรียกใช้
$name = appName();
echo $name."<br>";

$vat = calVat(6000);
echo $vat."<br>";
?>
