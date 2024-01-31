<?php
session_start();
if ( ! isset($_SESSION['login_id']) Or $_SESSION['login_level'] !="Admin") 
{
    header("Refresh:1; url=login.php");
    exit();
}
include("../inc_connect.php"); // ../คือการออกข้างนอก 1 ชั้น เนื่องจากหา ไม่เจอ

$sub_id = $_GET['id']; // รับค่าลิงค์
$sql = " Select * From subject Where sub_id =$sub_id "; //ดึงข้อมูลวิชาด้วยรหัสวิชา
$rst = mysqli_query($conn,$sql);
$arr = mysqli_fetch_array($rst);


if (isset($_POST['submit']))
{
    $sub_id=$_POST['sub_id'];
    $sub_name=$_POST['sub_name'];
    $sub_detail=$_POST['sub_detail'];
    $sub_image=$_POST['recent_image']; // รับค่า hidden field
    

    //กรณีมีการอัปโหลดไฟล์
    if ( isset($_FILES['sub_image']['name']) and  $_FILES['sub_image']['name'] != "" ) {

        $fname = $_FILES['sub_image']['name'];      //ชื่อไฟล์
        $fsize = $_FILES['sub_image']['size'];      //เก็บขนาดไฟล์
        $fdata = $_FILES['sub_image']['tmp_name'];  //เก็บไฟล์จริง
        $ftype =  mime_content_type($fdata);        //เก็บชนิดไฟล์

        if ($ftype != "image/jpeg" And $ftype != "image/png" ) //ป้องกันไฟล์ผิดประเภท
        {
            echo "<script> alert('ไฟล์ต้องเป็น jpg เท่านั้นครับ'); </script>";
            echo "<script> history.back(); </script>";
            exit();
        }

        if ($fsize > 102400)  //ป้องกันขนาดเกิน 100KB
        {
            echo "<script> alert('ไฟล์ต้องไม่เกิน 100KB เท่านั้นครับ'); </script>";
            echo "<script> history.back(); </script>";
            exit();
        }

        $fname = date("dmYHis")."_".$fname;//ป้องกันชื่อซ้ำ
        move_uploaded_file($fdata,"../img_subject/$fname"); //นำไฟล์ไปใส่โฟลเดอร์ที่ต้องการ
        $sub_image =$fname;

    }


    $sql = " Update subject Set sub_name='$sub_name',sub_detail='$sub_detail',sub_image='$sub_image' 
            Where sub_id =$sub_id"; 
    $rst = mysqli_query($conn,$sql);

    echo "<script> alert ('บันทึกข้อมูลเรียบร้อยแล้ว');</script>";
    echo "<script> window.location='subject.php';</script>";
    exit();
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

    <div class="container">
        
        <h3 class="float-start mb-3" >แก้ไขวิชา </h3>
        <form action="" method="post" enctype="multipart/form-data"><!-- ต้องใส่ทุกครั้ง <input type="file">-->
                <table class="table">
                    <tr>
                        <td>รหัสวิชา</td>
                        <td> <input type="text" name="sub_id" id="sub_id" class="form-control" readonly="true" value="<?php echo $arr['sub_id']?>"> </td>
                    </tr>
                    <tr>
                        <td>ชื่อวิชา</td>
                        <td> <input type="text" name="sub_name" id="sub_name" class="form-control" require="true" value="<?php echo $arr['sub_name']?>"> </td>
                    </tr>
                    <tr>
                        <td>รายละเอียด</td>
                        <td> <textarea  name="sub_detail" id="sub_detail" class="form-control" require="true" style="height:200px;"><?php echo $arr['sub_detail']?></textarea> </td>
                    </tr>
                    <tr>
                        <td>รูปภาพ</td>
                        <td>  <img src="../img_subject/<?php echo $arr['sub_image'] ?>" width="100"></td>
                        <input type="hidden" name="recent_image" value="<?php echo $arr['sub_image']?>">
                    </tr>
                    <tr>
                        <td>เปลี่ยนรูปภาพ</td>
                        <td> <input type="file" name="sub_image" id="sub_image" class="form-control" ></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td> 
                            <button type="submit" name="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> บันทึกข้อมูล </button>
                            <button type="button" class="btn btn-secondary" onclick="window.location='subject.php';"><i class="fa-solid fa-xmark"></i> ยกเลิก </button>
                        </td>

                    </tr>
                </table>
        </form>
           

          
      
    </div>
</body>
</html>
<?php mysqli_close($conn); 
  ?> 