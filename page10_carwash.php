<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>คำนวณล้างรถ</title>
</head>
<body>
    
<form action="" method="post">
        ล้างสี:<input type="number" name="input1"   min="0" ><br>
        ดูดฝุ่น:<input type="number" name="input2"   min="0" ><br>
        ขัดเคลือบ:<input type="number" name="input3"   min="0" ><br>

        
        <input type="submit" value="คำนวณ"><br>   
</form>  
<?php

date_default_timezone_set("Asia/Bangkok");

if (isset($_POST['input1']) ) 
{

    $input1 = $_POST['input1'];
    $input2 = $_POST['input2'];
    $input3 = $_POST['input3'];
    $total=$input1+$input2+$input3;
    
    $start = date("H:i:s");
    $finish =date ("H:i:s",mktime(date("H"),date("i")+$total,date("s"),date("m"),date("d"),date("Y"))); echo"<br>";

    echo "รับรถเข้า:".$start."<br>";
    echo "ส่งรถคืน:".$finish."<br>";
    echo "รวมเวลา:".$total." นาที "."<br>";
}
?>
</body>
</html>