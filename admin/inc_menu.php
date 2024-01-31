<div   id="menuadmin">

<div id="menuadminleft">

    <?php if($_SESSION['login_level'] == "Admin"){?>
        <a href= "index.php" > หน้าหลัก </a>
        <a href= "teacher.php" > คุณครู </a>
        <a href= "student.php" > นักเรียน </a>
        <a href= "subject.php" > วิชา </a>
        <a href= "course.php" > รอบสอน </a>
    <?php } elseif ( $_SESSION['login_level'] == "Student" ) { ?>

        <!-- <a href="course.php"> รอบสอน</a> -->
        <!-- <a href="#"> แจ้งโอนเงิน</a> -->

    <?php } ?>

</div>
<div id="menuadminright">
    <?php echo $_SESSION['login_name'];?>
    (<?php echo $_SESSION['login_position'];?>)
    <a href= "logout.php" title="ออกจากระบบ"> <i class="fa-solid fa-door-open"></i> ออกจากระบบ </a>
</div>
</div>
