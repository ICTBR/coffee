<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    // การแสดงผลออกทางหน้าเพจ ด้วยคำสั่ง echo
    echo "สวัสดีชาวไทย<br>"; 
    echo " Hello";
    echo " Welcome";
    echo "<img src='img_subject/คณิต.jpg' width='100' title='คณิต'><br>";

    //การใช้งานตัวแปร(Variable)
    $a=10000;  //integer

    $b=20.5;//float
    $c="peter";//string
    $d=true;//boolean
    $e=date("Y-m-d");//date
    $b=20000;//float
    $c=$a+$b;

    echo "มีเงิน".$a."บาท"."แม่ให้มาอีก".$b ."บาท" ."รวมเป็นเงิน".number_format($c,2)."บาท<br><br>";

    $name="sarut";
    $lastname="phumcharaoe";
    $age= 42;
    $sex= "men";
    $tel="0970981254";

    echo " ฉันชื่อ ".$name." นามสกุล ".$lastname." (เพศ: ".$sex.")"." 'อายุ " .$age ." ปี '"." โทรศัพท์ ".$tel."<br>"; 

    //คำสั่งเงื่อนไขทางเลือก if(...)

    $age = 20;      //กำหนดค่าเริ่มต้น


    if ( $age < 20 ) 
    {
        echo "ห้ามเข้า";
    }
    else
    {
        echo "เชิญด้านใน";
    }
    echo"<br>";

    //คำสั่งเงื่อนไข if(...)ทำงานกับข้อความ (ถ้าทำบรรทัดเดียว ไม่ต้องใส่ปีกกาก็ได้)
   
    

    $sex = "ชาย";

    if ( $sex == "ชาย" ) 
    
        echo "สวัสดีครับ";
    
    elseif ( $sex == "หญิง" ) 
    {
        echo "สวัสดีค่ะ";
    }
    elseif ( $sex == "เด็ก" ) 
    {
        echo "สวัสดีจ๊ะ";
    }
    elseif ( $sex == "คนชรา" ) 
    {
        echo "สวัสดีครับท่าน";
    }
    else 
    {
        echo "ระบุเพศไม่ถูกต้อง";
    }

    echo"<br>";

    //โปรแกรมคำนวณเกรด

    $score = "80";
    $grade ="";
    
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
    
echo "นักศึกษาสอบได้".$score."คะแน ได้เกรด".$grade;

echo"<br>";

   //ฟังก์ชั่น isset() ใช้ในการตรวจสอบว่าตัวแปรมีอยู่หรือไม่

   $x = "บอย";

        
   if ( isset($x) )
   {
       echo "Yes";
   }
   else
   {
       echo "No";
   }

    ?>
 


</body>
</html>