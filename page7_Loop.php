<?php
// session_start();       //ต้องใส่คำสั่งนี้ ##ที่ด้านบนสุด###  ของทุกเพจที่นำไปใช้เซสชั่น

// echo $_SESSION['age'];          //แสดงผล หรือนำไปใช้งานได้ทุกเพจทันที


//คำสั่งวนลูปทำซ้ำ for(....)
for ($i=2;$i<=10;$i=$i+2)
{

    echo $i."<br>";

}

?>
ระบุวันส่งสินค้า
<select>
<?php

for ($i=1;$i<=31;$i=$i+1)
{

    echo "<option> $i </option>";

}
?>
</select><select>
<?php

for ($i=1;$i<=12;$i=$i+1)
{

    echo "<option> $i </option>";

}
?>
</select><select>
<?php

for ($i= date("Y"); $i>=1981; $i--)
{

    echo "<option> $i </option>";

}
?>
</select>

    <br>

    <?php
    //คำสั่งวนลูปทำซ้ำ while(...)
        $j = 2 ;
        while($j < 100)
    {
        echo $j."<br>";
        $j = $j +2;
    }
    ?>