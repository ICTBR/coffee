<?php
session_start();
include("../inc_connect.php"); // ../คือการออกข้างนอก 1 ชั้น เนื่องจากหา ไม่เจอ

$error1="";
$error2="";

//กรณีกดเข้าสู่ระบบ
if ( isset($_POST['submit']) )
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = " Select * From admin Where admin_email = '$username' ";   //ค้นหาในแฟ้ม admin ก่อน
    $rst = mysqli_query($conn, $sql);
    $arr = mysqli_fetch_array($rst);
    if ( isset($arr['admin_id']))
    {
        // if ( password_verify($password, $arr['admin_password']) )
        if ( $password==$arr['admin_password'])
        {
            $_SESSION['login_id']       = $arr['admin_id'];      //ประกาศเซสชั่น เก็บข้อมูลผู้เข้าระบบไว้ใช้ได้ทุกหน้า
            $_SESSION['login_name']     = $arr['admin_name']." ".$arr['admin_surname'];
            $_SESSION['login_position'] = $arr['admin_position'];
            $_SESSION['login_level']    = "Admin";
            header("Refresh:3; url=index.php");
            echo '<img src="../img/loading2.gif" style="width:350px;margin:auto;display:block;">';
            exit();
        }
        else
        {
            $error2 = "*รหัสผ่านไม่ถูกต้อง";
        }
    }
    else 
    {
        $sql = " Select * From student Where stu_id = '$username' ";   //ค้นหาในแฟ้ม admin ก่อน
        $rst = mysqli_query($conn, $sql);
        $arr = mysqli_fetch_array($rst);
        if ( isset($arr['stu_id']))
        {
            // if ( password_verify($password, $arr['stu_password']) )
            if ( $password == $arr['stu_password'])
            {
                $_SESSION['login_id']       = $arr['stu_id'];      //ประกาศเซสชั่น เก็บข้อมูลผู้เข้าระบบไว้ใช้ได้ทุกหน้า
                $_SESSION['login_name']     = $arr['stu_name']." ".$arr['stu_surname'];
                $_SESSION['login_position'] = $arr['stu_level'];
                $_SESSION['login_level']    = "Student";
                header("Refresh:3; url=course_st.php");
                echo '<img src="../img/loading2.gif" style="width:350px;margin:auto;display:block;">';
                exit();
            }
            else 
            {
                $error2 = "*รหัสผ่านไม่ถูกต้อง";
            }
        }
        else
        {
            $error1 = "*ไม่พบข้อมูลที่ระบุ";
        }
    }

}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <title>ผู้ดูแลระบบ</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/mystyle.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container"> 
        <form action="" method="post">       
            <div style="width:400px;" class="mx-auto my-5 text-center bg-white rounded border p-3">
                <img src="../img/logo1.png" class="w-25 mx-auto d-block">
                <h3 class="text-center mb-4 fw-bold" >ผู้ดูแลระบบ </h3>
                <h4 class="text-center mb-4 fw-bold" >โรงเรียนบรรจงรัตน์ </h4>
                <input type="text" name="username" class="form-control" placeholder="อีเมล์หรือรหัสนักเรียน" required="true">
                <div class="text-danger small mb-3"><?php echo $error1?></div>
                <input type="password" name="password" class="form-control" placeholder="รหัสผ่าน" required="true">
                <div class="text-danger small mb-3"><?php echo $error2?></div> 

                <button type="submit" name= "submit" class="btn btn-primary w-100 btn-sm mb-3"><i class="fa-solid fa-key"></i> เช้าสู่ระบบ </button> 
            </div>
        </form>    
    </div>

</body>
</html>
<?php mysqli_close($conn); 
  ?> 