<?php

session_start();
if ( ! isset($_SESSION['login_id']) Or $_SESSION['login_level'] !="Admin") 
{
    header("Refresh:1; url=login.php");
    exit();
}
include("../inc_connect.php"); // ../คือการออกจ้างนอก 1 ชั้น เนื่องจากหา ไม่เจอ
include("../inc_function.php");

$idx = $_GET['tid'];

if (isset($_POST['submit']))
{
    $sub_id=$_POST['sub_id'];
    $cou_period=$_POST['cou_period'];;
    $cou_round=$_POST['cou_round'];
    $cou_price=$_POST['cou_price'];
    $cou_level=$_POST['cou_level'];
    $cou_limit=$_POST['cou_limit'];

$sql="UPDATE course SET
sub_id='".$sub_id."'
,cou_period='".$cou_period."'
,cou_round='".$cou_round."'
,cou_price='".$cou_price."'
,cou_level='".$cou_level."'
,cou_limit='".$cou_limit."'
WHERE cou_id='".$idx."'";

$rst = mysqli_query($conn,$sql);
echo "<script>alert ('บันทึกข้อมูลเรียบร้อยแล้ว');</script>";
echo "<script> window.location='course.php';</script>";
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

$sql0="select * from course where cou_id='".$idx."'";
$rst0 = mysqli_query($conn,$sql0);
while ($rs=mysqli_fetch_array($rst0)){

?>


    <div class="container">
        
        <h3 class="float-start mb-3" >แก้ไขวิชา </h3>
        <form action="" method="post" enctype="multipart/form-data"><!-- ต้องใส่ทุกครั้ง <input type="file">-->
                <table class="table">
                    <tr>
                        <td>ชื่อวิชา</td>
                        <td> 
                            <select class="form-select" name="sub_id" id="sub_id"  require="true">
                                <?php
                                        $sql1 = " SELECT sub_id,sub_name FROM `subject` ORDER BY sub_name"; 
                                        $rst1 = mysqli_query($conn,$sql1);
                                        while ($rs1=mysqli_fetch_array($rst1))
                                        {
                                            if($rs['sub_id']==$rs1['sub_id']){$sl='selected';}else{$sl='';}
                                            echo '<option value="'.$rs1['sub_id'].'" '.$sl.' >'.$rs1['sub_name'].'</option>';

                                        }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>ช่วงเวลา</td>
                        <td>  <input type="text" name="cou_round" id="cou_round" class="form-control" require="true" value="<?=$rs['cou_round']?>"> </td>
                    </tr>
                    <tr>
                        <td>รอบเรียน</td>
                        <td> <input type="text" name="cou_period" id="cou_period" class="form-control" require="true" value="<?=$rs['cou_period']?>"> </td>
                    </tr>
                    <tr>
                        <td>ราคา</td>
                        <td> <input type="number" name="cou_price" id="cou_price" min="0" max="10000" class="form-control" require="true"  value="<?=$rs['cou_price']?>"> </td>
                    </tr>
                    <tr>
                        <td>ระดับชั้น</td>
                        <td> <input type="text" name="cou_level" id="cou_level" class="form-control" require="true"  value="<?=$rs['cou_level']?>"> </td>
                    </tr>
                    <tr>
                        <td>จำนวนเปิดรับ</td>
                        <td> <input type="number" name="cou_limit" id="cou_limit" class="form-control" require="true" value="<?=$rs['cou_limit']?>"> </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td> 
                            <button type="submit" name="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> บันทึกข้อมูล </button>
                            <button type="button" class="btn btn-secondary" onclick="window.location='course.php';"><i class="fa-solid fa-xmark"></i> ยกเลิก </button>
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