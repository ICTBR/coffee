<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สมัครสมาชิก</title>
</head>
<body>
    <h3>  สมัครสมาชิก </h3>

    <form action="page4.php" method="post"> <!--post หรือ get -->

        ชื่อ:<input type="text" name="firstname"><br>
        สกุล:<input type="text" name="lasttname"><br>
        วันเกิด:<input type="date" name="birthdate"><br>
        อายุ:<input type="number" name="age"><br>
        อีเมล:<input type="email" name="email"><br>

    <input type="submit" value="บันทึก" name="submit"><br>
    
</form>


</body>
</html>