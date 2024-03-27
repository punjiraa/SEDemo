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
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href='https://fonts.googleapis.com/css?family=Sarabun' rel='stylesheet'>
  <title>ระบบแต่งตั้งครูเวรประจำวันออนไลน์</title>
  <style>
  :root {
    --main-color: rgb(0, 0, 0);
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
.btn{
  display: inline-block ;
  padding: 10px 10px; /* ปรับขนาดพื้นที่ภายในปุ่ม */
  background-color: #721c95; /* สีพื้นหลัง */
  color: #fff; /* สีข้อความ */
  border: none ;
  border-radius: 30px; /* กำหนดรูปร่างของปุ่มเป็นทรงแคปซูน */
  font-family:'sarabun';
  font-size: 16px;
  text-align: center;
  text-decoration: none;
  cursor: pointer;
  transition: background-color 0.3s ;
} 
.btn:hover {
    background-color:#721c95; /* เปลี่ยนสีพื้นหลังเมื่อเมาส์ชี้ */
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
                        <li><button class="capsule-btn1"><a href="user.php?logout=1">ออกจากระบบ</a></button></li>
                    </ur>
                </div>
            </div>
        </div>
    
    </nav>
</div>
<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$database = "php-crud";

// Create connection
$connection = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch data from the 'crud' table
$query = "SELECT first_name, last_name, gender FROM crud ORDER BY RAND()";
$result = mysqli_query($connection, $query);

$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

// Close connection
mysqli_close($connection);
?>

<style>
  .container {
    display: flex;
    justify-content: center; /* จัดกรอบให้อยู่ตรงกลางในแนวนอน */
    align-items: center; /* จัดกรอบให้อยู่ตรงกลางในแนวตั้ง */
    width: 300px; /* ปรับความกว้างของกรอบ */
    height: 30px; /* ปรับความสูงของกรอบ */
    margin: 3%;
}

h2 {
    border: 2px solid #FFCD00; /* สีเหลือง */
    background-color: #FFCD00; /* สีเหลืองอ่อน */
    padding: 10px; /* ปรับระยะห่างของข้อความภายในกรอบ */
    border-radius: 20px; /* กำหนดรูปร่างของกรอบเป็นทรงแคปซูล *//
}

.month {
    text-align: center;
    align-items: center;
    margin-bottom: 30px; /* เพิ่มระยะห่างด้านล่าง */
    font-size: 20px;
    border: 2px solid #FFCD00; /* สีเหลือง */
    background-color: #FFCD00; /* สีเหลืองอ่อน */
    padding: 10px; /* ปรับระยะห่างของข้อความภายในกรอบ */
    border-radius: 15px; /* กำหนดรูปร่างของกรอบเป็นทรงแคปซูล */
    width: 600px; /* กำหนดความกว้างของบล็อกข้อความ */
    margin-left: 10px; /* ลดขอบด้านซ้าย */
    margin-right: 10px; /* ลดขอบด้านขวา */
}

capsule-btn a{
  color: black;
}
.capsule-btn {
        text-align: right;
        margin-top: -20px; /* ขยับปุ่มขึ้นด้านบน */
        margin-bottom: 20px;
        padding: 10px 20px;
        background-color: #FFCD00;
        color: #fff;
        border: none;
        border-radius: 20px;
        font-size: 16px;
        cursor: pointer;
        text-decoration: none;
        transition: background-color 0.3s ease;
        display: inline-flex;
        align-items: center;
    }


    .capsule-btn:hover {
        background-color: #0056b3;
    }
  table {
    width: 100%;
    border-collapse: collapse;
  }
  th, td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
  }
  th {
    background-color: #721c95; /* สีพื้นหลังของส่วนหัวตาราง */
    color: white; /* เปลี่ยนสีของตัวอักษรในส่วนหัวตารางเป็นสีขาว */
  }
  th:nth-child(1) { background-color: #FF3131; } /* Sunday (Red) */
  th:nth-child(2) { background-color: #FFCD00; } /* Monday (Light Coral) */
  th:nth-child(3) { background-color: #FF6EB8; } /* Tuesday (Gold) */
  th:nth-child(4) { background-color: #7ED957; } /* Wednesday (GreenYellow) */
  th:nth-child(5) { background-color: #FF914D; } /* Thursday (SkyBlue) */
  th:nth-child(6) { background-color: #38B6FF; } /* Friday (MediumPurple) */
  th:nth-child(7) { background-color: #CB6CE6; } /* Saturday (Plum) */
  /* สีพื้นหลังของวันแต่ละวัน */
  td:nth-child(1) { background-color: #FDCEB2; } /* Sunday */
  td:nth-child(2) { background-color: #F8EAB0; } /* Monday */
  td:nth-child(3) { background-color: #FFCBE5; } /* Tuesday */
  td:nth-child(4) { background-color: #CCFFB7; } /* Wednesday */
  td:nth-child(5) { background-color: #FDCEB2; } /* Thursday */
  td:nth-child(6) { background-color: #C5EAFF; } /* Friday */
  td:nth-child(7) { background-color: #D9D2E9; } /* Saturday */
  
</style>
</head>
<body>
 <center><h2 class="container"  style="margin-top: 60px;">ตารางเวรปฏิบัติงาน</h2>
</center>
<center>
<div class="cc">
  <div class="month" >

  <label for="month">เดือน:</label>
  <select id="month" name="month">
    <option value="1">มกราคม</option>
    <option value="2">กุมภาพันธ์</option>
    <option value="3">มีนาคม</option>
    <option value="4">เมษายน</option>
    <option value="5">พฤษภาคม</option>
    <option value="6">มิถุนายน</option>
    <option value="7">กรกฎาคม</option>
    <option value="8">สิงหาคม</option>
    <option value="9">กันยายน</option>
    <option value="10">ตุลาคม</option>
    <option value="11">พฤศจิกายน</option>
    <option value="12">ธันวายน</option>
  </select>
  <label for="year">ปี (พ.ศ.):</label>
  <input type="number" id="year" name="year" min="1" max="3000" value="2565">
  
  <button type="button" onclick="generateCalendar()" class="btn">สร้างตาราง</button>
  </div>
 
  </div>
</center>
<div class="capsule-btn">
<a href="index.php">
    เพิ่มรายชื่อ
</a>
</div>
<form id="calendarForm">

  
</form>

<div id="ตารางเวรปฏิบัติงาน"></div>

<script>
var calendarData = <?php echo json_encode($data); ?>;

function generateCalendar() {
  var month = document.getElementById("month").value;
  var yearBE = document.getElementById("year").value;
  var yearAD = parseInt(yearBE, 10) - 543; // Convert B.E. to A.D.
  var numOfDays = new Date(yearAD, month, 0).getDate();
  var firstDayIndex = new Date(yearAD, month - 1, 1).getDay();
  
  var calendarContainer = document.getElementById("ตารางเวรปฏิบัติงาน");
  calendarContainer.innerHTML = "";
  
  var table = document.createElement("table");
  var headerRow = table.createTHead().insertRow(0);
  var weekdays = ["วันอาทิตย์", "วันจันทร์", "วันอังคาร", "วันพุธ", "วันพฤหัสบดี", "วันศุกร์", "วันเสาร์"];
  for (var i = 0; i < 7; i++) {
    var th = document.createElement("th");
    th.textContent = weekdays[i];
    headerRow.appendChild(th);
  }
  
  var tbody = table.createTBody();
  var date = 1;
  for (var i = 0; i < 6; i++) {
    var row = tbody.insertRow(i);
    for (var j = 0; j < 7; j++) {
      if (i === 0 && j < firstDayIndex) {
        var cell = row.insertCell(j);
        cell.textContent = "";
      } else if (date > numOfDays) {
        break;
      } else {
        var cell = row.insertCell(j);
        cell.textContent = date;
        if (j >= 1 && j <= 5) { // Monday to Friday
    var femaleNames = calendarData.filter(function(item) {
        return item.gender === 'female';
    });
        if (femaleNames.length > 0) {
        var randomIndex = Math.floor(Math.random() * femaleNames.length);
        cell.textContent = date + ' ' + femaleNames[randomIndex].first_name + ' ' + femaleNames[randomIndex].last_name;
    } else {
        cell.textContent = date;
    }
} else if (j === 6 || j === 0) { // Saturday or Sunday
    var maleNames = calendarData.filter(function(item) {
        return item.gender === 'male';
    });
    if (maleNames.length > 0) {
        var randomIndex = Math.floor(Math.random() * maleNames.length);
        cell.textContent = date + ' ' + maleNames[randomIndex].first_name + ' ' + maleNames[randomIndex].last_name;
    } else {
        cell.textContent = date;
    }
  } else {
    if (calendarData.length > 0) {
        var randomIndex = Math.floor(Math.random() * calendarData.length);
        cell.textContent = date + ' ' + calendarData[randomIndex].first_name + ' ' + calendarData[randomIndex].last_name;
    }
}


        date++;
      }
    }
  }
  
  calendarContainer.appendChild(table);
}

// Generate calendar for current month and year
window.onload = function() {
  var currentDate = new Date();
  var currentMonth = currentDate.getMonth() + 1; // January is 0, so add 1
  var currentYearBE = currentDate.getFullYear() + 543; // Convert A.D. to B.E.
  document.getElementById("month").value = currentMonth;
  document.getElementById("year").value = currentYearBE;
  generateCalendar();
};
</script>


</body>
</html>
