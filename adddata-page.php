<?php
session_start();
$open_connect = 1;
require('connect.php');

if(!isset($_SESSION['id_account']) || $_SESSION['role_account'] != 'admin'){//ถ้าไม่มีเซสชัน id_account หรือเซสชัน role_account จะถูกส่งไปหน้า login
    die(header('Location: form-login.php'));
}elseif(isset($_GET['logout'])){ //ถ้ามีการกดปุ่มออกจากระบบให้ทำการทำลายเซสชันและส่งไปหน้า login
    session_destroy();
    die(header('Location: form-login.php'));
}else{
    $id_account = $_SESSION['id_account'];
    $query_show = "SELECT * FROM account WHERE id_account = '$id_account'";
    $call_back_show = mysqli_query($connect, $query_show);
    $result_show = mysqli_fetch_assoc($call_back_show);
    $directory = 'images_account/';
    $image_name = $directory . $result_show['images_account'];
    $clear_cache = '?' . filemtime($image_name);
    $image_account = $image_name . $clear_cache;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href='https://fonts.googleapis.com/css?family=Sarabun' rel='stylesheet'>

   <link href="SSST.CSS" rel="stylesheet">

   <title>เพิ่มรายชื่อบุคลากร</title>
</head>

<body>
<div class="nav1">
  <nav>
    
        <div class="container1">
            <div class="nav-con">
              <div class="logo">
                <a href="home-page.php">โรงเรียนวัดคุ้งวารี</a>
              </div>
              <div class="navbar1">
                <ul class="menu">
                    <li><a href="home-page.php">หน้าแรก</a></li>
                    <li><a href="data-page.php">ข้อมูลบุคคลากร</a></li>
                    <li><a href="abc.php">ตารางเวรปฎิบัติงาน</a></li>
                    <li><a href="change-page.php">การแลกเปลี่ยนเวรประจำวัน</a></li>
                    <li><a href="https://script.google.com/macros/s/AKfycbwuRsT36e9RjX12Vx22-7Qyk7muA9o9B73IEPN2Glh7xuc8vjqSacTumFhzQ3uVbyAbXw/exec?fbclid=IwAR2dD-jE23nU5IMsLo9IU29wijjXQSKflW4wnJtCxj5WwOwIntewvwTbfJs_aem_AR8S1arEkF9KEYlxJpGA4Y2LRS75Tvrw38VugswLy72jWUA7bqCmMGAcb2TZcXeZjCGrD6_NLXWT4Pl0HKTHkX2r">ส่งมอบหลักฐานการปฎิบัติงาน</a></li>
                    <li><a href="user.php?logout=1">ออกจากระบบ</a></li>
                    
                </ul>
                </div>
            </div>
        </div>
    
    </nav>
</div>
    <center><div class="message-box">
        <h2 class="container3"  style="margin-top: 60px;">เพิ่มรายชื่อบุคลากร</h2>
    </div></center>
   <div class="container">
      <div>
         
         <center><label class="text-muted">กรอกฟอร์มให้สมบูรณ์เพื่อเพิ่มข้อมูล</label><center>
         <br>
         <div class="container2">
            <form action="" method="post">
               <div class="row">
                  <div class="col">
                     <label class="form-label">ชื่อ:</label>
                     <input type="text" class="form-control" name="first_name" placeholder="ชื่อ">
                  </div>

                  <div class="col">
                     <label class="form-label">นามสกุล:</label>
                     <input type="text" class="form-control1" name="last_name" placeholder="นามสกุล">
                  </div>
               </div>

               <div class="col">
                  <label class="form-label">อีเมล:</label>
                  <input type="email" class="form-control2" name="email" placeholder="อีเมล">
               </div>

               <div class="form-group">
                  <label>เพศ:</label>
                  &nbsp;
                  <input type="radio" class="form-check-input" name="gender" id="male" value="male">
                  <label for="male" class="form-input-label">ชาย</label>
                  &nbsp;
                  <input type="radio" class="form-check-input" name="gender" id="female" value="female">
                  <label for="female" class="form-input-label">หญิง</label>
               </div>

               <div>
                  <button type="submit" class="btn btn-success" name="submit">บันทึก</button>
                  <button class="btn btn-danger"><a href="index.php">ยกเลิก</a></button>
               </div>
            </form>
         </div>
      </div>
   </div>

   <!-- Bootstrap -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>
