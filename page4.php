<?php
$firstname=trim($_POST['firstname']);//trim คือ การตัดเว้นวรรค
$lasetname=$_POST['lasttname'];
$birthdate=$_POST['birthdate'];
$age=$_POST['age'];
$email=$_POST['email'];


echo "ชื่อ:".$firstname."<br>";
echo "สกุล:".$lasetname."<br>";
echo "วันเกิด:".$birthdate."<br>";
echo "อายุ:".$age."<br>";
echo "อีเมล:".$email."<br>";
?>