
<?php
function Sample1() {
    echo "Hello";
    echo "<br>";
    $room1 =CalArea (5,6);
$room2 =CalArea (4,3);
$room3 =CalArea (4,2);
$total=$room1+$room2+$room3;

echo "ห้อง 1:".$room1 ."ตารางเมตร<br>";
echo "ห้อง 2:".$room2 ."ตารางเมตร<br>";
echo "ห้อง 3:".$room3 ."ตารางเมตร<br>";
echo "รวม".$total ."ตารางเมตร<br><hr>";

}


function CalArea($w,$l){
    $area =$w*$l;
    return $area;

}
//ฟังก์ชั่นเรียกใช้




//จงสร้างโปรแกรมย่อยสำหรับรับค่า ชื่อสินค้า ราคา และจำนวน เข้ามาคำนวณราคาสุทธิ

function Calstock($name,$price,$qty){
    $total =$price*$qty;
    $discount = "ไม่ลด";
  
    if($total >= 10000)
    {
        $total = $total - ($total *10 / 100);
        $discount = "ลด 10%";
    }
    elseif($total >= 5000)
    {
        $total = $total - ($total *5 / 100);
        $discount = "ลด 5%";
    }

    return $name."ราคารวม ".$total." บาท ".$discount."<br>";

}

function Convert($amount_number)
{
    $amount_number = number_format($amount_number, 2, ".","");
    $pt = strpos($amount_number , ".");
    $number = $fraction = "";
    if ($pt === false) 
        $number = $amount_number;
    else
    {
        $number = substr($amount_number, 0, $pt);
        $fraction = substr($amount_number, $pt + 1);
    }
    
    $ret = "";
    $baht = ReadNumber ($number);
    if ($baht != "")
        $ret .= $baht . "บาท";
    
    $satang = ReadNumber($fraction);
    if ($satang != "")
        $ret .=  $satang . "สตางค์";
    else 
        $ret .= "ถ้วน";
    return $ret;
}
 
function ReadNumber($number)
{
    $position_call = array("แสน", "หมื่น", "พัน", "ร้อย", "สิบ", "");
    $number_call = array("", "หนึ่ง", "สอง", "สาม", "สี่", "ห้า", "หก", "เจ็ด", "แปด", "เก้า");
    $number = $number + 0;
    $ret = "";
    if ($number == 0) return $ret;
    if ($number > 1000000)
    {
        $ret .= ReadNumber(intval($number / 1000000)) . "ล้าน";
        $number = intval(fmod($number, 1000000));
    }
    
    $divider = 100000;
    $pos = 0;
    while($number > 0)
    {
        $d = intval($number / $divider);
        $ret .= (($divider == 10) && ($d == 2)) ? "ยี่" : 
            ((($divider == 10) && ($d == 1)) ? "" :
            ((($divider == 1) && ($d == 1) && ($ret != "")) ? "เอ็ด" : $number_call[$d]));
        $ret .= ($d ? $position_call[$pos] : "");
        $number = $number % $divider;
        $divider = $divider / 10;
        $pos++;
    }
    return $ret;
}

function DateThaiShortNotime($strDate){
	if($strDate !='' && substr($strDate,0,10) !='0000-00-00'){
		$strYear = date("Y",strtotime($strDate))+543;
		$strMonth= date("n",strtotime($strDate));
		$strDay= date("j",strtotime($strDate));
		$strHour= date("H",strtotime($strDate));
		$strMinute= date("i",strtotime($strDate));
		$strSeconds= date("s",strtotime($strDate));
		$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
		$strMonthThai=$strMonthCut[$strMonth];
		return "$strDay $strMonthThai $strYear";
	}
}
?>