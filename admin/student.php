<?php
session_start();
if ( ! isset($_SESSION['login_id']) Or $_SESSION['login_level'] !="Admin") 
{
    header("Refresh:1; url=login.php");
    exit();
}
include("../inc_connect.php"); // ../คือการออกจ้างนอก 1 ชั้น เนื่องจากหา ไม่เจอ
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
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>

</head>
<body>
    <?php include("inc_menu.php");?>

    <div class="container">
        <div style="margin:auto;width:85%;"> 
            <h3 class="float-start mb-3" > รายชื่อนักเรียน </h3>

            <form action="" method="post">
            <button type ="button" class="btn btn-success float-end mb-3 ms-3" onclick="window.location='student_insert.php';"> <i class="fa-solid fa-circle-plus"></i> เพิ่มรายชื่อนักเรียน </button>
                <button type ="submit" class="btn btn-primary float-end mb-3"> <i class="fa-solid fa-magnifying-glass"></i> ค้นหา </button>
                <input type="text" name="keyword" class="form-control w-25 float-end mb-3"> 
            </form>

            <table class ="table table-sm">
                <tr class ="table-primary text-center">
                    <td> รหัสนักเรียน </td> 
                    <td> ชื่อ นามสกุล </td>  
                    <td> ชั้น </td>             
                    <td> ... </td>  

                </tr>
                <?php
                $sql = "Select * From student";

                if(isset($_POST['keyword']))
                {
                        $keyword = trim($_POST['keyword']);
                        $sql.=" where stu_id like '%$keyword%' 
                        or stu_name like '%$keyword%' 
                        or stu_surname like '%$keyword%' 
                        or stu_level like '%$keyword%'";

                }

                $rst = mysqli_query( $conn,$sql);
                $num = mysqli_num_rows($rst); // count rows
                while ($arr = mysqli_fetch_array($rst))
                {
                ?>
                <tr class ="text-center"> 
                    <td> <?php echo $arr ['stu_id'];?> </td>  
                    <td> <?php echo $arr ['stu_name']." ".$arr ['stu_surname'];?> </td>  
                    <td> <?php echo $arr ['stu_level'];?> </td>  
                    <td>
                        
                    <a href ="student_edit.php?tid=<?php echo $arr ['stu_id'];?>" title="แก้ไข"><i class="fa-solid fa-pencil text-warning"></i></a>
                    <a href="#" title="ลบ" onclick="delete_stu('<?php echo $arr ['stu_id']?>')"><i class="fa-solid fa-trash text-danger"></i></a>
                    </td>
                </tr>
            <?php
            }
            ?>
            <table>

            <p class ="text-center small"> ทั้งหมด <?php echo $num ?> รายการ </p>
        </div>
    </div>
</body>
</html>
<?php mysqli_close($conn); 
  ?> 
  <script type="text/javascript">

    function delete_stu(id){
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
        url: "stu_del.php",
        data: {id:id},
        success: function() {
                Swal.fire({
                title: "ลบสำรเ็จ",
                text: name,
                icon: "success"
            });
            window.location='student.php';      

        }
    });
  }
});
}

</script>