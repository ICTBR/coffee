<?php
session_start();
if ( ! isset($_SESSION['login_id']) Or $_SESSION['login_level'] !="Admin") 
{
    header("Refresh:1; url=login.php");
    exit();
}
include("../inc_connect.php"); // ../คือการออกจ้างนอก 1 ชั้น เนื่องจากหา ไม่เจอ
include("../inc_function.php");



if (isset($_POST['submit']))
{
    $stu_id=$_POST['stu_id'];    
    $stu_name=$_POST['stu_name'];
    $stu_surname=$_POST['stu_surname'];
    $stu_level=$_POST['stu_level'];
    $stu_password=$_POST['stu_password'];

$sql="INSERT INTO student(stu_id,stu_name,stu_surname,stu_level,stu_password)
values('".$stu_id."','".$stu_name."','".$stu_surname."','".$stu_level."','".$stu_password."')";

$rst = mysqli_query($conn,$sql);
echo "<script>alert ('บันทึกข้อมูลเรียบร้อยแล้ว');</script>";
echo "<script> window.location='student.php';</script>";
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <title>รายชื่อนักเรียน</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/mystyle.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</head>
<body>
    <?php include("inc_menu.php");?>

    <div class="container">
        
        <h3 class="float-start mb-3" >เพิ่มรายชื่อนักเรียน </h3>
        <form action="" method="post" enctype="multipart/form-data"><!-- ต้องใส่ทุกครั้ง <input type="file">-->
                <table class="table">
                   
                    <tr>
                        <td>รหัสนักเรียน</td>
                        <td> <input type="number" name="stu_id" id="stu_id"  class="form-control" require="true"> </td>
                    </tr>
                    <tr>
                        <td>ชื่อ</td>
                        <td> <input type="text" name="stu_name" id="stu_name"  class="form-control" require="true"> </td>
                    </tr>
                    <tr>
                        <td>นามสกุล</td>
                        <td> <input type="text" name="stu_surname" id="stu_surname" class="form-control" require="true"> </td>
                    </tr>
                    <tr>
                        <td>ชั้นปี</td>
                        <td> <input type="text" name="stu_level" id="stu_level" class="form-control" require="true"> </td>
                    </tr>                  
                    <tr>
                        <td>รหัสผ่าน</td>
                        <td> <input type="number" name="stu_password" id="stu_password" class="form-control" require="true"> </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td> 
                            <button type="submit" name="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> บันทึกข้อมูล </button>
                            <button type="button" class="btn btn-secondary" onclick="window.location='student.php';"><i class="fa-solid fa-xmark"></i> ยกเลิก </button>
                        </td>

                    </tr>
                </table>
        </form>
           

          
      
    </div>
</body>
</html>
<?php mysqli_close($conn); 
  ?> 