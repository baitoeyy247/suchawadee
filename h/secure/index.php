<?php
    session_start();
?>

<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login : สุชาวดี สุระสิงห์ (ใบเตย)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;500&family=Itim&display=swap" rel="stylesheet">
    
    <style>
        body {
            background-color: #fff5f5; /* พื้นหลังสีแดงอ่อนมากๆ */
            font-family: 'Itim', cursive, 'Sarabun', sans-serif;
        }
        .login-card {
            max-width: 400px;
            margin: 100px auto;
            border: none;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(255, 182, 193, 0.3);
        }
        .card-header {
            background-color: #ff8a8a; /* สีแดงอ่อนหัวข้อ */
            color: white;
            border-radius: 20px 20px 0 0 !important;
            text-align: center;
            padding: 20px;
        }
        .btn-login {
            background-color: #ff6b6b;
            color: white;
            border: none;
            border-radius: 10px;
            padding: 10px;
            transition: 0.3s;
        }
        .btn-login:hover {
            background-color: #ee5253;
            color: white;
            transform: translateY(-2px);
        }
        .form-control:focus {
            border-color: #ff8a8a;
            box-shadow: 0 0 0 0.25px rgba(255, 138, 138, 0.5);
        }
    </style>
</head>

<body>

<div class="container">
    <div class="card login-card">
        <div class="card-header">
            <h4 class="mb-0">เข้าสู่ระบบหลังบ้าน ❤️</h4>
            <small>คุณสุชาวดี สุระสิงห์ (ใบเตย)</small>
        </div>
        <div class="card-body p-4">
            <form method="post" action="">
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" name="auser" class="form-control" placeholder="ระบุชื่อผู้ใช้งาน" autofocus required>
                </div>
                <div class="mb-4">
                    <label class="form-label">Password</label>
                    <input type="password" name="apwd" class="form-control" placeholder="ระบุรหัสผ่าน" required>
                </div>
                <div class="d-grid">
                    <button type="submit" name="Submit" class="btn btn-login shadow-sm">
                        เข้าสู่ระบบ
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
if(isset($_POST['Submit'])) {
    include_once("connectdb.php");
	$sql = "SELECT * FROM admin WHERE a_username='{$_POST['auser']}' AND a_password='{$_POST['apwd']}' LIMIT 1";
    
    $rs = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($rs);
	if ($num == 1) {
        $data = mysqli_fetch_array($rs);
        $_SESSION['aid'] = $data['a_id'];
        $_SESSION['aname'] = $data['a_name'];
		echo "<script>
                window.location='index2.php';
              </script>";
	} else {
        echo "<script>
                alert('อุ๊ย! รหัสผ่านไม่ถูกต้อง ลองใหม่อีกครั้งนะ');
              </script>";
    }
}
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>