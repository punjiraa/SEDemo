<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Sarabun' rel='stylesheet'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>เข้าสู่ระบบ</title>
</head>
<body>
    <div class="wrapper ">
        <form action="process-login.php" method="POST">
            <div class="container">
            <div class="child">
                <img src =img2.png width="180px">
            </div>
            </div>
            <h1>เข้าสู่ระบบ</h1>
            <div class="input-box">
                <input name="email_account" type="email" placeholder="อีเมล" require>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input name="password_account" type="password" placeholder="รหัสผ่าน" require>
                <i class='bx bxs-lock-alt' ></i>
            </div>

            <div class="container">
                <button type="submit" class="btn">เข้าสู่ระบบ</button>
                <a href="form-register.php"></a>
            </div>
            <div class="register-link">
                <p>สร้างบัญชีใหม่
                    <a href="form-register.php"> ลงทะเบียน </a></p>
            </div>
            
        </form>
    </div>
</body>
</html>