<?php
session_start();
if ( ! isset($_SESSION['login_id']) ) 
{
    header("Refresh:1; url=login.php");
    exit();
}
include("../inc_connect.php"); // ../คือการออกจ้างนอก 1 ชั้น เนื่องจากหา ไม่เจอ

if (isset($_POST['submit']))
{
    $sql = " Insert ignore Into register( reg_datetime,cou_id,stu_id,reg_status) values (now(),'".$_POST['cou_id']."','".$_SESSION['login_id']."','สมัคร')"; //ดึงข้อมูลวิชาด้วยรหัสวิชา
    $rst = mysqli_query($conn,$sql);
    if($rst){

        $sqlc = "SELECT * FROM course WHERE cou_id='".$_POST['cou_id']."' ";
        $rstc = mysqli_query($conn,$sqlc);
        $status="เปิดรับ";
        while ($rs =mysqli_fetch_array($rstc))
        {
            $cou_limit=$rs['cou_limit'];
            $cou_regis=$rs['cou_regis']+1;
        }

        if( $cou_regis >= $cou_limit){
            $status="ปิดรับ";
        }

        if( $cou_regis<=$cou_limit){
            $sqlu = "UPDATE course SET cou_regis= '".$cou_regis."',cou_status='".$status."' WHERE cou_id='".$_POST['cou_id']."'";
            $rstu = mysqli_query($conn,$sqlu);          
            echo "<script>alert ('บันทึกข้อมูลเรียบร้อยแล้ว');</script>";
        
        }

     }else{
        echo "<script>alert ('บันทึกข้อมูลไม่สำเร็จ');</script>";

    }
    echo "<script> window.location='course_st.php';</script>";
 


}





?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>นักเรียน</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/mystyle.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <?php include("inc_menu.php");?>

    <div class="container">
        <div style="margin:auto;width:85%;"> 
            <h3 class="float-start mb-3" > วิชาเปิดสอน </h3>

            <form action="" method="post">
                <button type ="submit" class="btn btn-primary float-end mb-3"> <i class="fa-solid fa-magnifying-glass"></i> ค้นหา </button>
                <input type="text" name="keyword" class="form-control w-25 float-end mb-3"> 
            </form>
            <!-- <div class="table-responsive"> -->
            <table class ="table table-sm">
                <tr class= "table-info">
                    <td>ลำดับ</td>
                    <td>วิชา</td>
                    <td>ช่วงเวลา</td>
                    <td>รอบเรียน</td>
                    <td>ราคา</td>                   
                    <td>ระดับชั้น</td>
                    <td>เปิดรับ</td>
                    <td>จำนวนผู้สมัคร</td>
                    <td>สถานะคอร์ส</td>
                    <td>สถานะการลงทะเบียน</td>
                    <td>สมัครเรียน</td>                   
                </tr>
                <?php

                $cnt = 0;
                $sql = " SELECT c.*,s.sub_name,r.reg_status,r.pay_price FROM `course` c 
                LEFT JOIN `subject` s on c.sub_id=s.sub_id
                LEFT JOIN register r on r.cou_id=c.cou_id and r.stu_id='".$_SESSION['login_id']."'
                WHERE 1 "; 
                $rst = mysqli_query($conn,$sql);
                $sum_a=$sum_b=0;
                while ($arr =mysqli_fetch_array($rst))
                {
                    $cnt++;
                    if($arr['reg_status']=="สมัคร" || $arr['reg_status']=="ชำระเงินแล้ว"){
                        $sum_a=$sum_a+$arr ['cou_price'];
                    }
                    if($arr['pay_price']!=''){
                        $sum_b=$sum_b+$arr ['pay_price'];
                    }

                    ?>
                    <tr style= "background-color:#FFFFFF;">
                        <td> <?php echo $cnt; ?></td>
                        <td> <?php echo $arr ['sub_name']?></td>
                        <td> <?php echo $arr ['cou_period']?></td>
                        <td> <?php echo $arr ['cou_round']?></td>
                        <td> <?php echo $arr ['cou_price']?></td>                        
                        <td> <?php echo $arr ['cou_level']?></td>
                        <td> <?php echo $arr ['cou_limit']?></td>
                        <td> <?php echo $arr ['cou_regis']?></td>
                        <td> <?php echo $arr ['cou_status']?></td>
                        <td> <?php echo $arr ['reg_status']?></td>
                        <td> 
                        <?php 
                        if ($arr['cou_regis']==100) 
                        {
                            echo "เต็ม";
                        }
                        elseif ($arr['cou_status']=="เปิดรับ" && $arr['reg_status']=="") 
                        {
                            ?>
                             <button type="button" class="btn btn-primary" onclick="btn_regist('<?php echo $arr ['sub_id']?>','<?php echo $arr ['sub_name']?>',<?php echo $arr ['cou_id']?>)"> สมัคร</button>
                        <?php
                            // echo "<a href='#'>สมัคร</a>";
                        }
                        else
                        {
                            echo "-";
                        } 
                        ?> 
                        </td>
                    </tr>
                    <?php               
                }
                ?>
                     <tr style= "background-color:#FFF000;">
                    <td colspan="4"> รวมเงิน</td>
                    <td><?php echo number_format($sum_a,2)?></td>
                    <!-- <td><?php echo number_format($sum_b,2)?></td> -->
                    </tr>
               
            </table>
            <!-- </div> -->
            <p class ="text-center small"> ทั้งหมด <?php echo $cnt ?> รายการ </p>
            
    </div>
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="#" method="post" enctype="multipart/form-data"><!-- ต้องใส่ทุกครั้ง <input type="file">-->
                <table class="table">
                    <tr>
                        <td>รหัสวิชา</td>
                        <td> <input type="text" name="sub_id" id="sub_id" class="form-control" require="true" value=""> </td>
                    </tr>
                    <tr>
                        <td>ชื่อวิชา</td>
                        <td> <input type="text" name="sub_name" id="sub_name" class="form-control" require="true" value=""> </td>
                    </tr>
                    <tr>
                        <td>COU_ID</td>
                        <td> <input type="text" name="cou_id" id="cou_id" class="form-control" require="true"  value=""> </td>
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
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


</body>
</html>
<?php mysqli_close($conn); 
  ?> 
<script type="text/javascript">
function btn_regist(sub_id,sub_name,cou_id){
    
    var myModal = new bootstrap.Modal(document.getElementById('staticBackdrop'), {
  keyboard: false
})
document.getElementById('sub_name').value=sub_name ;  
document.getElementById('cou_id').value=cou_id ;  
document.getElementById('sub_id').value=sub_id ;  
    myModal.show();

}
function msg(){
//     Swal.fire(
//   'Good job!',
//   'You clicked the button!',
//   'success'
// ); 
Swal.fire({
  title: 'Do you want to save the changes?',
  showDenyButton: true,
  showCancelButton: true,
  confirmButtonText: 'Save',
  denyButtonText: `Don't save`,
}).then((result) => {
  /* Read more about isConfirmed, isDenied below */
  if (result.isConfirmed) {
    Swal.fire('Saved!', '', 'success')
  } else if (result.isDenied) {
    Swal.fire('Changes are not saved', '', 'info')
  }
})  
}
</script>