<?php
session_start();
if ( ! isset($_SESSION['login_id']) Or $_SESSION['login_level'] !="Admin") 
{
    header("Refresh:1; url=login.php");
    exit();
}
include("../inc_connect.php"); // ../คือการออกจ้างนอก 1 ชั้น เนื่องจากหา ไม่เจอ

$sub_id = $_GET['id']; // รับค่าลิงค์
$sql = " Select * From subject Where sub_id =$sub_id "; //ดึงข้อมูลวิชาด้วยรหัสวิชา
$rst = mysqli_query($conn,$sql);
$arr = mysqli_fetch_array($rst);

if( isset($_POST['cou_period']) And isset($_POST['cou_round'])){
    $cou_period = $_POST['cou_period'];
    $cou_round = $_POST['cou_round'];
    $cou_price = $_POST['cou_price'];
    $cou_level = $_POST['cou_level'];
    $cou_limit = $_POST['cou_limit'];
    $cou_regis = 0;
    $cou_status = $_POST['cou_status'];

    $sql =" Insert Into course (sub_id,cou_period,cou_round,cou_price,cou_level,cou_limit,cou_regis,cou_status)
     values('$sub_id','$cou_period','$cou_round','$cou_price','$cou_level','$cou_limit','$cou_regis','$cou_status')";
    $rst = mysqli_query($conn,$sql);
    echo "<script> alert ('เพิ่มข้อมูลเรียบร้อยแล้ว');</script>";
    echo "<script> window.location='subject_detail.php?id=$sub_id';</script>";
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

    <h3 style ="text-align:center;" >รายละเอียด </h3>

    <div class="container">

        <div style="margin:auto;width:70%;"> 
            <div style="text-align:right;margin-bottom:5px;">
                <button class="btn btn-primary btn-sm" onclick="history.back()";><i class="fa-solid fa-backward"></i> ย้อนกลับ </button>    
            </div>

            <table class ="table table-sm">
            <!-- <table cellpadding= "8" cellspacing= "1" width= "100%" style= "background-color:#AAAAAA;margin: auto;"> -->
                <tr style= "background-color:#FFFFFF;">
                    <td>รหัสวิชา</td>
                    <td><?php echo $arr['sub_id'] ?></td>
                </tr>
                <tr style= "background-color:#FFFFFF;">
                    <td>ชื่อวิชา</td>
                    <td> <div style="font-size:18px;color:#008000;font-weight:bold;"><?php echo $arr['sub_name'] ?></td>
                </tr>
                <tr style= "background-color:#FFFFFF;">
                    <td>รายละเอียด</td>
                    <td><?php echo nl2br($arr['sub_detail']) ?></td>
                </tr>
                <tr style= "background-color:#FFFFFF;">
                    <td>รูปภาพ</td>
                    <td> <img src="../img_subject/<?php echo $arr['sub_image'] ?>" width="100"></td>
                </tr>
            </table>
        </div>

        <div style="margin:auto;width:85%;">    
            <h3 class="float-start mb-3"><i class="fa-solid fa-calendar-days"></i> รอบเปิดสอน </h3>

            <buton data-bs-toggle="modal" data-bs-target="#ModalAddCourse" class="btn btn-success float-end mb-3"><i class="fa-solid fa-plus"></i> เพิ่มรอบสอน </buton>

            <table class ="table table-sm">
                <tr class= "table-info">
                    <td>ลำดับ</td>
                    <td>ช่วงเวลา</td>
                    <td>รอบเรียน</td>
                    <td>ราคา</td>
                    <td>ระดับชั้น</td>
                    <td>เปิดรับ</td>
                    <td>จำนวนผู้สมัคร</td>
                    <td>สถานะ</td>
                    
                </tr>
                <?php

                $cnt = 0;
                $sql = " Select * From course Where sub_id =$sub_id "; 
                $rst = mysqli_query($conn,$sql);
                while ($arr =mysqli_fetch_array($rst))
                {
                    $cnt++;
                    ?>
                    <tr style= "background-color:#FFFFFF;">
                        <td> <?php echo $cnt; ?></td>
                        <td> <?php echo $arr ['cou_period']?></td>
                        <td> <?php echo $arr ['cou_round']?></td>
                        <td> <?php echo $arr ['cou_price']?></td>
                        <td> <?php echo $arr ['cou_level']?></td>
                        <td> <?php echo $arr ['cou_limit']?></td>
                        <td> <?php echo $arr ['cou_regis']?></td>
                        <td> <?php echo $arr ['cou_status']?></td>
                    </tr>
                    <?php               
                }
                ?>
            </table>
                <p style="font-size:13px;"> ทั้งหมด <?php echo $cnt; ?> รอบ </p>
        </div>
        <br><br><br><br><br><br>

    </div> 

    <form action="" method="post">    
        <div class="modal fade" id="ModalAddCourse" tabindex="-1" data-bs-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">เพิ่มรอบสอน</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ช่วงเวลา
                <input type="text" name="cou_period" id="" class="form-control" required="true">
                รอบเรียน
                <input type="text" name="cou_round" id="" class="form-control" required="true">
                ราคา
                <input type="number" name="cou_price" id="" class="form-control" required="true">
                ระดับชั้น
                <input type="text" name="cou_level" id="" class="form-control" required="true">
                เปิดรับ
                <input type="text" name="cou_limit" id="" class="form-control" required="true">
                สถานะ
                <select name="cou_status" id="" class="form-select" required="true">
                    <option>เปิดรับ</option>
                    <option>ปิดรับ</option>
                    <option>เริ่มคอร์ส</option>
                    <option>จบคอร์ส</option>
                </select>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">บันทึก</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
        </div>
    </form>

</body>
</html>
<?php mysqli_close($conn); 
  ?> 