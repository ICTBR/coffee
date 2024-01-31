<?php

mysqli_report(MYSQLI_REPORT_OFF);   //PHP over 8.1 Only

//1) เชื่อมต่อไปยังฐานข้อมูลด้วยคำสั่ง mysqli_connect("ชื่อเซิร์ฟเวอร์", "ชื่อผู้ใช้", "รหัสผ่าน", "ชื่อฐานข้อมูล");

$conn = @mysqli_connect("localhost", "root", "", "banjongrat_db") or die("ไม่สามารถเชื่อมต่อฐานข้อมูล");

//2) กำหนดค่าภาษาไทยให้สมบูรณ์
 mysqli_query($conn,"Set names utf8");
 
//3) กำหนด timezone ของเวบไซต์
date_default_timezone_set("Asia/Bangkok");


?>