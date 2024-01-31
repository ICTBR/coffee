<?php

session_start();
if ( ! isset($_SESSION['login_id']) Or $_SESSION['login_level'] !="Admin") 
{
    header("Refresh:1; url=login.php");
    exit();
}
include("../inc_connect.php"); // ../คือการออกจ้างนอก 1 ชั้น เนื่องจากหา ไม่เจอ
include("../inc_function.php");

$idy = $_GET['tid'];

if (isset($_POST['submit']))
{
    $id=$_POST['id'];
    $firstname=$_POST['firstname'];
    $surname=$_POST['surname'];
    $gender=$_POST['gender'];
    $position=$_POST['position'];
    $birthdate=$_POST['birthdate'];
    $salary=$_POST['salary'];
    $email=$_POST['email'];
    $password=$_POST['password'];

$sql="UPDATE teacher SET
id='".$id."'
,firstname='".$firstname."'
,surname='".$surname."'
,gender='".$gender."'
,position='".$position."'
,birthdate='".$birthdate."'
,salary='".$salary."'
,email='".$email."'
,password='".$password."'

WHERE id='".$idy."'";

$rst = mysqli_query($conn,$sql);
echo "<script>alert ('บันทึกข้อมูลเรียบร้อยแล้ว');</script>";
echo "<script> window.location='teacher.php';</script>";
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <title>วิชา</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/mystyle.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</head>
<body>
    <?php include("inc_menu.php");?>

<?php

$sql1="select * from teacher where id='".$idy."'";
$rst1 = mysqli_query($conn,$sql1);
while ($rs=mysqli_fetch_array($rst1)){

?>


    <div class="container">
        
        <h3 class="float-start mb-3" >แก้ไขรายชื่อครู </h3>
        <form action="" method="post" enctype="multipart/form-data"><!-- ต้องใส่ทุกครั้ง <input type="file">-->
                <table class="table">
                    <tr>
                        <td>รหัส</td>
                        <td>  <input type="text" name="id" id="id" class="form-control" require="true" value="<?=$rs['id']?>"> </td>
                    </tr>
                    <tr>
                        <td>ชื่อ</td>
                        <td>  <input type="text" name="firstname" id="firstname" class="form-control" require="true" value="<?=$rs['firstname']?>"> </td>
                    </tr>
                    <tr>
                        <td>นามสกุล</td>
                        <td> <input type="text" name="surname" id="surname" class="form-control" require="true" value="<?=$rs['surname']?>"> </td>
                    </tr>
                    <tr>
                        <td>เพศ</td>
                        <td> <input type="text" name="gender" id="gender" class="form-control" require="true" value="<?=$rs['gender']?>"> </td>
                    </tr>
                    <tr>
                        <td>ตำแหน่ง</td>
                        <td> <input type="text" name="position" id="position" class="form-control" require="true"  value="<?=$rs['position']?>"> </td>
                    </tr>
                    <tr>
                        <td>วันเกิด</td>
                        <td> <input type="text" name="birthdate" id="birthdate" class="form-control" require="true" value="<?=$rs['birthdate']?>"> </td>
                    </tr>
                    <tr>
                        <td>เงินเดือน</td>
                        <td> <input type="text" name="salary" id="salary" class="form-control" require="true"  value="<?=$rs['salary']?>"> </td>
                    </tr>
                    <tr>
                        <td>อีเมล</td>
                        <td> <input type="text" name="email" id="email" class="form-control" require="true"  value="<?=$rs['email']?>"> </td>
                    </tr>
                    <tr>
                        <td>รหัสผ่าน</td>
                        <td> <input type="text" name="password" id="password" class="form-control" require="true"  value="<?=$rs['password']?>"> </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td> 
                            <button type="submit" name="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> บันทึกข้อมูล </button>
                            <button type="button" class="btn btn-secondary" onclick="window.location='teacher.php';"><i class="fa-solid fa-xmark"></i> ยกเลิก </button>
                        </td>

                    </tr>
                </table>
        </form>
           

          
      
    </div>
    <?php } ?>
</body>
</html>
<?php mysqli_close($conn); 
  ?> 
