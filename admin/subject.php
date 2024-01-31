<?php
session_start();
if ( ! isset($_SESSION['login_id']) Or $_SESSION['login_level'] !="Admin") 
{
    header("Refresh:1; url=login.php");
    exit();
}
include("../inc_connect.php"); // ../คือการออกจ้างนอก 1 ชั้น เนื่องจากหา ไม่เจอ

if (isset($_GET['id']) AND $_GET['id']!= "")
{
    $sub_id=$_GET['id'];
    $sql = " Delete From subject Where sub_id = $sub_id "; //ดึงข้อมูลวิชาด้วยรหัสวิชา
    $rst = mysqli_query($conn,$sql);

    echo "<script> alert ('ลบข้อมูลเรียบร้อยแล้ว');</script>";
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
        <div style="margin:auto;width:85%;"> 
            <h3 class="float-start mb-3" >วิชา </h3>
   
            <form action="" method="post">  
                    <button type ="button" class="btn btn-success float-end mb-3 ms-3" onclick="window.location='subject_insert.php';"> <i class="fa-solid fa-circle-plus"></i> เพิ่มวิชา </button>
                    <button type ="submit" class="btn btn-primary float-end mb-3"> <i class="fa-solid fa-magnifying-glass"></i> ค้นหา </button>
                    <input type="text" name="keyword" class="form-control w-25 float-end mb-3">           
            </form>

            <table class ="table table-sm">
            <!-- <table cellpadding = "5" cellspacing = "1" width = "75%" style = "background-color:#AAAAAA;margin: auto;"> -->
                <tr class ="table-primary text-left">
                    <td> รหัสวิชา </td> 
                    <td> ชื่อวิชา </td>  
                    <td> รูปภาพ </td> 
                    <td> ... </td>  
                </tr>
                <?php
                $sql = "Select * From subject";

                if(isset($_POST['keyword']))
                {
                        $keyword = trim($_POST['keyword']);
                        $sql.=" where sub_id like '%$keyword%' 
                        or sub_name like '%$keyword%' 
                        or sub_detail like '%$keyword%' ";

                }

                $rst = mysqli_query( $conn,$sql);
                $num = mysqli_num_rows($rst); // count rows
                while ($arr = mysqli_fetch_array($rst))
                {
                ?>
                <tr class ="text-left"> 
                    <td> <?php echo $arr ['sub_id'];?> </td>  
                    <td class="text-start"> <?php echo $arr ['sub_name'];?> </td>  
                    <td> <img src = "../img_subject/<?php echo $arr ['sub_image'];?>" width = "35"> </td>  
                    <td>
                        <a href ="subject_detail.php?id=<?php echo $arr ['sub_id'];?>" title="รายละเอียด"><i class="fa-solid fa-eye" style="color: #c33e1d;"></i></a>
                        <a href ="subject_update.php?id=<?php echo $arr ['sub_id'];?>" title="แก้ไข"><i class="fa-solid fa-pencil"></i></a>
                        <a href ="subject.php?id=<?php echo $arr ['sub_id'];?>" title="ลบ" 
                        onclick="if (!confirm('ลบรายการเดี๋ยวนี้ ?')) return false;"><i class="fa-solid fa-trash"></i></a>
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