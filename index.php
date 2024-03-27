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

<?php
include "db_conn.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</div>

  <style>
    body {
      background-image: url('img6.png');
      background-size: cover;
      background-repeat: no-repeat;
    }
  
    <!-- CSS: Bootstrap v-5.3 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
    :root {
    --main-color: black;
    }
    body{
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

  <div style="border: 1px solid #FFCD00; padding: 30px; background-color: #FFCD00; border-radius: 20px; width: 250px; height:100px; margin: auto;">
    <h2 style="color: #000; text-align: center; ">ตารางรายชื่อ</h2>
  </div>


  <div class="container">
    <?php
    if (isset($_GET["msg"])) {
      $msg = $_GET["msg"];
      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
      ' . $msg . '
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    ?>
    <a href="adddata-page.php" class="btn btn-dark mb-3">เพิ่มใหม่</a>
    
    <a href="abc.php" class="btn btn-dark mb-3" style="text-align: right;">กลับ</a>

    <table class="table table-hover text-center" style="background-color: #00ff5573;">
      <thead class="table-dark">
        <tr>
          <th scope="col">ID</th>
          <th scope="col">ชื่อ</th>
          <th scope="col">นามสกุล</th>
          <th scope="col">Email</th>
          <th scope="col">เพศ</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM `crud`";
        $result = mysqli_query($conn, $sql);
        $counter = 0;
        while ($row = mysqli_fetch_assoc($result)) {
          $counter++;
          ?>
          <tr <?php if ($counter % 2 == 0) echo 'style="background-color: #D9D2E9;"'; else echo 'style="background-color: #EFE8FF;"'; ?>>
            <td><?php echo $row["id"] ?></td>
            <td><?php echo $row["first_name"] ?></td>
            <td><?php echo $row["last_name"] ?></td>
            <td><?php echo $row["email"] ?></td>
            <td><?php echo $row["gender"] ?></td>
            <td>
              <a href="edit.php?id=<?php echo $row["id"] ?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
              <a href="delete.php?id=<?php echo $row["id"] ?>" class="link-dark"><i class="fa-solid fa-trash fs-5"></i></a>
            </td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>

  </div>

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>
