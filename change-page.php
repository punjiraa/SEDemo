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
    <meta name="viewport" content="width=device-width, minimum-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Sarabun' rel='stylesheet'>
    <title>การแลกเปลี่ยนการปฏิบัติหน้าที่เวรประจำวัน</title>
    <link rel="shortcut icon" href="images/index.ico" type="image/x-icon">
    <link rel="stylesheet" href="">
    <!--CSS: Fontawesome
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->

    <!-- CSS: Bootstrap v-5.3 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
    :root {
    --main-color: black;
    }
    .body1{
        font-family:'Sarabun';
        background-image: url(img6.png) ;
        background-size: cover;
        
    }
    .container1{
    max-width:1400px;
    margin: 0 auto;
    border: 1px ;
    }
    
    .box {
    background-color: #fcfcfc;
    padding: 10px;
    border: 1px solid #ccc;
    margin: 0 auto;
    width: 800px;
    height: 650px;
    border-radius: 10px;
    position: center;
}
    nav{
        background: #721c95;
        
        
    }

    .nav1{
        background-color:  #FFCD00;
        position: center;
        top: 0px;
        left: 0px;        
        width: 1500px;
        height: 90px;
        padding-right:100px no-repeat;
        padding-bottom: 10px no-repeat;
        box-shadow: inset 0px 50px 8px #888888;
        margin-bottom: 40px;
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
        color: white;
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
        display: inline-block;
        padding: 10px 20px; /* ปรับขนาดพื้นที่ภายในปุ่ม */
        background-color: #721c95; /* สีพื้นหลัง */
        color: #fff; /* สีข้อความ */
        border: none;
        border-radius: 30px; /* กำหนดรูปร่างของปุ่มเป็นทรงแคปซูน */
        font-size: 16px;
        font-weight: bold;
        text-align: center;
        text-decoration: none;
        cursor: pointer;
        transition: background-color 0.3s;
    }
    .capsule-btn a {
    color: white; /* เปลี่ยนสีข้อความในปุ่มเป็นสีขาว */
}
    .capsule-btn:hover {
        background-color: #721c95; /* เปลี่ยนสีพื้นหลังเมื่อเมาส์ชี้ */
}
.capsule-btn1 {
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
    .capsule-btn1 a {
        color: #fff; /* เปลี่ยนสีข้อความในปุ่มเป็นสีขาว */
}
    .capsule-btn1:hover {
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
<div class="body1">

    <div class="bbb">
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
                              <li><a href="abc.php  ">ตารางเวรปฎิบัติงาน</a></li>
                              <li><a href="change-page.php">การแลกเปลี่ยนเวรประจำวัน</a></li>
                              <li><a href="https://script.google.com/macros/s/AKfycbwuRsT36e9RjX12Vx22-7Qyk7muA9o9B73IEPN2Glh7xuc8vjqSacTumFhzQ3uVbyAbXw/exec?fbclid=IwAR2dD-jE23nU5IMsLo9IU29wijjXQSKflW4wnJtCxj5WwOwIntewvwTbfJs_aem_AR8S1arEkF9KEYlxJpGA4Y2LRS75Tvrw38VugswLy72jWUA7bqCmMGAcb2TZcXeZjCGrD6_NLXWT4Pl0HKTHkX2r">ส่งมอบหลักฐานการปฎิบัติงาน</a></li>
                              
                          </ul>
                        </div>
                        <div class="navbar1">
                            <ur class="menu">
                        <li><button class="capsule-btn1"><a href="user.php?logout=1">ออกจากระบบ</a></button></li>
                    </ur>
                </div>
                      </div>
                  </div>
              
              </nav>
          </div>

          <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
                       <!-- space -->
                          <div class="container2">
                          <div class="box">
                          <div class="row justify-content-center pt-5">
                          
                              <div class="col-lg-9 col-md-10">
                                  <h3 class="fw-normal text-center mb-5 border-bottom pb-2">การแลกเปลี่ยนการปฏิบัติหน้าที่เวรประจำวัน </h3>
           
                                  <form class="form_overlay" method="POST" accept-charset="UTF-8" autocomplete="off" name="contact"> 
                                      <div class="row g-4">
                                          <div class="col-lg-6">
                                              <div class="input_overlay">
                                                  <label for="fname" class="lable">ชื่อ-นามสกุลผู้ขอเปลี่ยนเวร :</label>
                                                  <input type="text" name="name" class="form-control" required autocomplete="off">
                                              </div>
                                          </div>
                                          
                                          <div class="col-lg-6">
                                              <div class="input_overlay">
                                                  <label for="email" class="lable">Email :</label>
                                                  <input type="text" name="email" class="form-control" required autocomplete="off">
                                              </div>
                                          </div>
                                          <div class="col-lg-6">
                                              <div class="input_overlay">
                                                  <label for="date">วันปฏิบัติหน้าที่เวร :</label>
                                                  <input type="date" id="date" name="do_shifts" class="form-control" required autocomplete="off">
                                              </div>
                                          </div>
                                          <div class="col-lg-6">
                                              <div class="input_overlay">
                                                  <label for="date">วันที่ขอเปลี่ยนเวร :</label>
                                                  <input type="date" id="date" name="do_change" class="form-control" required autocomplete="off">
                                              </div>
                                          </div>
                                          <div class="col-12">
                                              <div class="input_overlay">
                                                  <label for="subject" class="lable">ครูผู้ยินยอมเปลี่ยนเวร :</label>
                                                  <select size="1" name="change_to" class="form-control" required autocomplete="off">
                                                  <option value="-"></option>
                                                      <option value="นางสาวณัฐฐา สระน้ำ">นางสาวณัฐฐา สระน้ำ</option>
                                                      <option value="นางสุจินดา คงกรุด">นางสุจินดา คงกรุด</option>
                                                      <option value="นางนันทภรณ์ อารีสวัสดิ์">นางนันทภรณ์ อารีสวัสดิ์</option>
                                                      <option value="นางสาวจุฑามาศ บุญจินดา">นางสาวจุฑามาศ บุญจินดา</option>
                                                      <option value="นางสาวสแกวัลย์ อริยะวงศ์">นางสาวสแกวัลย์ อริยะวงศ์</option>
                                                      <option value="นายวัชระ สัมมาชีวะ">นายวัชระ สัมมาชีวะ</option>
                                                      <option value="นายชานนท์ เสือแก้ว">นายชานนท์ เสือแก้ว</option>
                                                      <option value="นายธีระ บุญเกิดกูล">นายธีระ บุญเกิดกูล</option>
                                                      <option value="นายพงศกร เผือกสกุล">นายพงศกร เผือกสกุล</option>
                                                    </select>
                                          
                                          </div>
                                          <div class="col-12">
                                              <div class="input_overlay textarea">
                                                  <label for="desc" class="lable">เหตุผล :</label>
                                                  <textarea name="reason" cols="30" rows="4" class="form-control" required autocomplete="off"></textarea>
                                              </div>
                                          </div>
                                          <p>
                                          <div class="col-12 text-end">
                                          <center><button type="submit" class="capsule-btn">ส่งข้อมูล</button></center><p>
                                          <center><button class="capsule-btn"><a href="https://docs.google.com/spreadsheets/d/1sW0nUMGUzBmNMdW2sKd2GgM3MkkLvREresMnvJ6AG7I/edit?usp=sharing" target="_blank">แสดงข้อมูล</a></button></center>
                                          </div>
                                          
                                          
                                              
                                                  
                                          <div class="col-6 text-end">    
                                          </div>
                                          <p id="demo"></p>
                                      </div>
                                       
                                  </form>
                              </div>
                            </div>
                            </div>
                            </div>
          
           
              </main>
              
          
             <script>
                      const scriptURL = 'https://script.google.com/macros/s/AKfycbxWZv5kNIOX109yiJIJvYYcHASN4m-10_CN9daU2tODkyr575va-I39BRNgIPTO2ea-oQ/exec'
                      const form = document.forms['contact']
                      
                      form.addEventListener('submit', e => {
                        e.preventDefault()
                        fetch(scriptURL, { method: 'POST', body: new FormData(form)})
                          .then(response => document.getElementById("demo").innerHTML = "<div class='alert alert-primary' role='alert'><b>Thank You for providing the details, We shall get back to you shortly !</b></div>",contact.reset())
                          .catch(error => console.error('Error!', error.message))
                      })
              </script>
           
                        
    </div>
</div>              
 </body>
 </html>