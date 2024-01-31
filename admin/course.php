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
    $sql = " Insert Into register( reg_datetime,cou_id,stu_id,reg_status) values (now(),'".$_POST['cou_id']."','".$_SESSION['login_id']."','สมัคร')"; //ดึงข้อมูลวิชาด้วยรหัสวิชา
    $rst = mysqli_query($conn,$sql);

    echo "<script>alert ('บันทึกข้อมูลเรียบร้อยแล้ว');</script>";
    // echo "<script>Swal.fire( 'Good job!','You clicked the button!','success';</script>";
    echo "<script> window.location='course.php';</script>";
    exit();

}





?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/mystyle.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>

</head>
<body>
    <?php include("inc_menu.php");?>

    <div class="container">
        <div style="margin:auto;width:85%;"> 
            <h3 class="float-start mb-3" > วิชาเปิดสอน </h3>

            <form action="" method="post">
              <button type ="button" class="btn btn-success float-end mb-3 ms-3" onclick="window.location='course_insert.php';"> <i class="fa-solid fa-circle-plus"></i> เพิ่มวิชาเปิดสอน </button>
                <button type ="submit" class="btn btn-primary float-end mb-3"> <i class="fa-solid fa-magnifying-glass"></i> ค้นหา </button>
                <input type="text" name="keyword" class="form-control w-25 float-end mb-3"> 
            </form>

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
                    <td>จัดการ</td>  
                                     
                </tr>
                <?php

                $cnt = 0;
                $sql = " SELECT c.*,s.sub_name FROM `course` c 
                LEFT JOIN subject s on c.sub_id=s.sub_id
                WHERE 1 "; 
                $rst = mysqli_query($conn,$sql);
                while ($arr =mysqli_fetch_array($rst))
                {
                  $id="coustatus_".$arr ['cou_id'];
                    $cnt++;



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
                        <td> 
                          <select id=<?php echo $id;?> name=<?php echo $id;?> onchange="cou_up_status('<?php echo $id;?>');" >
                            <option value="เปิดรับ" <?php if($arr ['cou_status']=='เปิดรับ'){echo " selected";}else{echo "";}?>>เปิดรับ</option>
                            <option value="ปิดรับ"  <?php if($arr ['cou_status']=='ปิดรับ'){echo " selected";}else{echo "";}?>>ปิดรับ</option>
                            <option value="เริ่มคอร์ส"  <?php if($arr ['cou_status']=='เริ่มคอร์ส'){echo " selected";}else{echo "";}?>>เริ่มคอร์ส</option>
                            <option value="จบคอร์ส"  <?php if($arr ['cou_status']=='จบคอร์ส'){echo " selected";}else{echo "";}?>>จบคอร์ส</option>
                        </select>
                      </td>
                      <td>
                      <a href ="course_edit.php?tid=<?php echo $arr ['cou_id'];?>" title="แก้ไข"><i class="fa-solid fa-pencil text-warning"></i></a>
                      <a href="#" title="ลบ" onclick="delete_cou('<?php echo $arr ['cou_id']?>','<?php echo $arr ['sub_name']?>')"><i class="fa-solid fa-trash text-danger"></i></a>
                  </td>
                    </tr>
                    <?php               
                }
                ?>
            </table>

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
                            <button type="button" class="btn btn-secondary" onclick="window.location='course.php';"><i class="fa-solid fa-xmark"></i> ยกเลิก </button>
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

function cou_up_status(id){
  let value=document.getElementById(id).value;

  $.ajax({
    url: "cou_up_status.php",
    data: {id:id,value:value},
    success: function() {
      
            Swal.fire({
            title: "เปลี่ยนสถานะ",
            text: value,
            icon: "success"
          });

    }
});

}

function delete_cou(id,name){
  Swal.fire({
  title: "Are you sure?",
  text: "You won't be able to revert this!",
  icon: "warning",
  showCancelButton: true,
  confirmButtonColor: "#3085d6",
  cancelButtonColor: "#d33",
  confirmButtonText: "Yes, delete it!"
}).then((result) => {
  if (result.isConfirmed) {
    $.ajax({
    url: "cou_del.php",
    data: {id:id},
    success: function() {
             Swal.fire({
            title: "ลบสำรเ็จ",
            text: name,
            icon: "success"
          });
          window.location='course.php';      

    }
});
  }
});


}

</script>