<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>คำนวณเกรด</title>
</head>
<body>
    <h3> คำนวณเกรด</h3> 
    <form action="" method="post">
        คะแนนสอบ:<input type="number" name="score"  max="100" min="0" step="0.1"><br>
        
        <input type="submit" value="บันทึก"><br>   
</form>  

<?php
if (isset($_POST['score']) ) //เช็คว่ามีตัวแปรหรือยัง
{
    $score=($_POST['score']);//รับค่าจากฟอร์ม


        
        if ( $score >= "80" ) 
        
            $grade= "A";
        
        elseif ( $score >= "70" ) 
        
            $grade= "B";
        
        elseif ( $score >= "60" ) 
        
            $grade= "C";
        
        elseif ( $score >= "50" ) 
        
            $grade= "D";
        
        else 
        
            $grade= "F";


        echo "เกรดที่ได้:".$grade."<br>";
}
?>
</body>
</html>