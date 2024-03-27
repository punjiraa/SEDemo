<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Sarabun' rel='stylesheet'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>สร้างบัญชีใหม่</title>
</head>
<body>
        <div class="wrapper ">
        <form action="process-register.php" method="POST">
                <div class="container">
                <div class="child">
                    <img src =img2.png width="180px">
                </div>
                </div>
                <h1>สร้างบัญชีของคุณ</h1>
                <div class="input-box">
                    <input name="username_account" type="text" placeholder="ชื่อผู้ใช้" require>
                </div>
                <div class="input-box">
                    <input name="email_account" type="email" placeholder="อีเมล" require>
                </div>
                <div class="input-box">
                    <input name="password_account1" type="password" placeholder="รหัสผ่านใหม่" require>
                </div>
                <div class="input-box">
                    <input name="password_account2" type="password" placeholder="ยืนยันรหัสผ่าน" require>
                </div>

                <div class="container">
                        <button type="submit" class="btn">สร้างบัญชี</button> <br>
                    <div class="register-link">
                        <p><a href="form-login.php"><span style="color: #fff;">กลับไปหน้า login </span></a></p>
                    </div>
                </div>
        </div>
        </form>
</body>
</html>