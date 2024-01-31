<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>คำนวณพื้นที่</title>
</head>
<body>
    <h3> คำนวณพื้นที่</h3> 
    <form action="" method="post">
        กว้าง:<input type="number" name="w" value="0" max="99" min="0" step="0.1"><br>
        ยาว:<input type="number" name="l"><br>
        <input type="submit" value="บันทึก"><br>   
</form>    

<?php
if (isset($_POST['w']) and isset($_POST['l'])) 
{
$w=trim($_POST['w']);
$l=$_POST['l'];
$area=$w*$l;



echo "พื้นที่:".$area." ตารางเมตร"."<br>";
}
?>


</body>
</html>