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

if($open_connect !=1){
    die(header('Location: form-login.php'));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href='https://fonts.googleapis.com/css?family=Sarabun' rel='stylesheet'>
  <title>ระบบแต่งตั้งครูเวรประจำวันออนไลน์</title>
  <style>
    :root {
    --main-color: black;
    }
    body{
        font-family:'Sarabun';
    }
    .container1{
    max-width:1400px;
    margin: 0 auto;
    border: 1px ;
    }

    nav{
        background: #721c95;
        
        
    }

    .nav1{
        background-color:  #FFCD00;
        position: center;
        top: 0px;
        left: 0px;        
        width: 1457px;
        height: 90px;
        padding-right:100px no-repeat;
        padding-bottom: 10px no-repeat;
        box-shadow: inset 0px 50px 8px #888888;
        
    }

    .nav-con{
        display: flex;
        justify-content: space-between;
        align-items: center;
        height: 80px
    }

    .navbar ul{
    list-style-type: none;
    background-color: #721c95;
    padding: 0px;
    margin: 0px;
    overflow: hidden; 
    }
    .navbar a{
        color: white;
        text-decoration: none;
        padding: 15px;
        display: block;
        text-align: center;
    }
    .navbar a:hover{
        background-color: #fff;
        color: var(--main-color);
    }
    .navbar li{
        float: left;
    }

    
    
    .menu{
        display: flex;
    }

    .menu li {
        list-style: none;
        margin-left: 1rem;
    }
    a {
        color: #fff;
        text-decoration:none ;

    }

    .logo a{
        font-size: 1.5rem;
    }

@media screen and (max-width: 360px) {

    .logo{
        margin-bottom: 1.5rem ;
    }
    .nav-con {
        padding: 1.5rem 0;
        flex-direction: column ;
        height: auto;
    }

    .memu{
        width:100% ;
        text-align: center;
        flex-direction: column;
    }

    .menu li{
        padding: 1rem 0 ;
        margin-left: 0;
        transition: 0.5s ;
    }

    .menu li:nover {
        background: #222 ;

    }
}
.capsule-btn {
        display: inline-block ;
        padding: 4px 5px; /* ปรับขนาดพื้นที่ภายในปุ่ม */
        background-color: #FF0000; /* สีพื้นหลัง */
        color: #fff; /* สีข้อความ */
        border: none ;
        border-radius: 30px; /* กำหนดรูปร่างของปุ่มเป็นทรงแคปซูน */
        font-size: 16px;
        font-weight: bold;
        text-align: center;
        text-decoration: none;
        cursor: pointer;
        transition: background-color 0.3s ;
    }
    .capsule-btn a {
        color: #fff; /* เปลี่ยนสีข้อความในปุ่มเป็นสีขาว */
}
    .capsule-btn:hover {
        background-color: #800000 ; /* เปลี่ยนสีพื้นหลังเมื่อเมาส์ชี้ */
        padding: 4px 5px; /* ปรับขนาดพื้นที่ภายในปุ่ม */
        border-radius: 30px; /* กำหนดรูปร่างของปุ่มเป็นทรงแคปซูน */
    }
    .navbar1 ul{
    list-style-type: none;
    background-color: #721c95;
    padding: 0px;
    margin: 0px;
    overflow: hidden; 
    }
    .navbar1 a{
        text-decoration: none;
        padding: 15px;
        display: block;
        text-align: center;
    }
    .navbar1 a:hover{
        background-color: #fff no-repeat;
        color: #fff;
    }
    .navbar1 li{
        float: left;
    }

  </style>
</head>
<body>
<div class="nav1">
  <nav>
    
        <div class="container1">
            <div class="nav-con">
              <div class="logo">
                <a href="home-page.php">โรงเรียนวัดคุ้งวารี</a>
              </div>
              <div class="navbar">
                    <ul class="menu">
                        <li><a href="home-page.php">หน้าแรก</a></li>
                        <li><a href="data-page.php">ข้อมูลบุคคลากร</a></li>
                        <li><a href="abc.php">ตารางเวรปฎิบัติงาน</a></li>
                        <li><a href="change-page.php">การแลกเปลี่ยนเวรประจำวัน</a></li>
                        <li><a href="https://script.google.com/macros/s/AKfycbwuRsT36e9RjX12Vx22-7Qyk7muA9o9B73IEPN2Glh7xuc8vjqSacTumFhzQ3uVbyAbXw/exec?fbclid=IwAR2dD-jE23nU5IMsLo9IU29wijjXQSKflW4wnJtCxj5WwOwIntewvwTbfJs_aem_AR8S1arEkF9KEYlxJpGA4Y2LRS75Tvrw38VugswLy72jWUA7bqCmMGAcb2TZcXeZjCGrD6_NLXWT4Pl0HKTHkX2r">ส่งมอบหลักฐานการปฎิบัติงาน</a></li>
                    </ul>
                </div>
                <div class="navbar1">
                    <ur class="menu">
                        <li><button class="capsule-btn"><a href="user.php?logout=1">ออกจากระบบ</a></button></li>
                    </ur>
                </div>
            </div>
        </div>
    
    </nav>
</div>
    <center><img src="img3.png" width= 100% height= 100%></center>
</body>
</html>
