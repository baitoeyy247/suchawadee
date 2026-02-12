<?php
session_start();
include_once("check_login.php");
?>
<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard : สุชาวดี สุระสิงห์ (ใบเตย)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;500&family=Itim&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <style>
        body {
            background-color: #fffafa;
            font-family: 'Sarabun', sans-serif;
        }
        h1, h2, h3, .nav-link {
            font-family: 'Itim', cursive;
        }
        .sidebar {
            background-color: #ff8a8a;
            min-height: 100vh;
            color: white;
            box-shadow: 2px 0 10px rgba(0,0,0,0.1);
        }
        .nav-link {
            color: rgba(255,255,255,0.9);
            border-radius: 10px;
            margin-bottom: 5px;
            transition: 0.3s;
        }
        .nav-link:hover, .nav-link.active {
            background-color: #ff6b6b;
            color: white;
        }
        .main-content {
            padding: 30px;
        }
        /* Stat Card Style */
        .stat-card {
            border: none;
            border-radius: 20px;
            transition: transform 0.3s;
            box-shadow: 0 5px 15px rgba(255, 138, 138, 0.1);
        }
        .stat-card:hover {
            transform: translateY(-5px);
        }
        .icon-box {
            width: 50px;
            height: 50px;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin-bottom: 15px;
        }
        .welcome-banner {
            background: linear-gradient(45deg, #ff8a8a, #ff6b6b);
            color: white;
            border-radius: 25px;
            padding: 30px;
            margin-bottom: 30px;
            box-shadow: 0 10px 20px rgba(255, 107, 107, 0.2);
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <nav class="col-md-3 col-lg-2 d-md-block sidebar collapse p-3">
            <div class="text-center mb-4 mt-2">
                <i class="bi bi-stars" style="font-size: 2rem;"></i>
                <div class="mt-2 fw-bold"><?php echo $_SESSION['aname']; ?></div>
                <small class="opacity-75">Admin Dashboard</small>
            </div>
            <ul class="nav flex-column">
                <li class="nav-item"><a class="nav-link active" href="index2.php"><i class="bi bi-grid-1x2-fill me-2"></i> หน้าหลัก</a></li>
                <li class="nav-item"><a class="nav-link" href="products.php"><i class="bi bi-box-seam me-2"></i> จัดการสินค้า</a></li>
                <li class="nav-item"><a class="nav-link" href="orders.php"><i class="bi bi-cart-check me-2"></i> จัดการออเดอร์</a></li>
                <li class="nav-item"><a class="nav-link" href="customers.php"><i class="bi bi-people me-2"></i> จัดการลูกค้า</a></li>
                <hr>
                <li class="nav-item"><a class="nav-link text-white-50" href="logout.php"><i class="bi bi-box-arrow-right me-2"></i> ออกจากระบบ</a></li>
            </ul>
        </nav>

        <main class="col-md-9 ms-sm-auto col-lg-10 main-content">
            
            <div class="welcome-banner d-flex align-items-center justify-content-between">
                <div>
                    <h2 class="mb-1">ยินดีต้อนรับกลับมาค่ะ! 🌸</h2>
                    <p class="mb-0 opacity-90">วันนี้มีออเดอร์ใหม่รอให้คุณจัดการอยู่นะคะ สู้ๆ!</p>
                </div>
                <div class="d-none d-md-block">
                    <i class="bi bi-heart-fill" style="font-size: 4rem; opacity: 0.3;"></i>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-12 col-sm-6 col-xl-3">
                    <div class="card stat-card p-3">
                        <div class="icon-box bg-primary-subtle text-primary">
                            <i class="bi bi-box-seam"></i>
                        </div>
                        <h6 class="text-muted">สินค้าทั้งหมด</h6>
                        <h3 class="mb-0">124 <small class="fs-6">รายการ</small></h3>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-xl-3">
                    <div class="card stat-card p-3">
                        <div class="icon-box bg-success-subtle text-success">
                            <i class="bi bi-bag-check"></i>
                        </div>
                        <h6 class="text-muted">ออเดอร์เดือนนี้</h6>
                        <h3 class="mb-0">48 <small class="fs-6">รายการ</small></h3>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-xl-3">
                    <div class="card stat-card p-3">
                        <div class="icon-box bg-danger-subtle text-danger">
                            <i class="bi bi-currency-dollar"></i>
                        </div>
                        <h6 class="text-muted">รายได้รวม</h6>
                        <h3 class="mb-0">฿45,200</h3>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-xl-3">
                    <div class="card stat-card p-3">
                        <div class="icon-box bg-warning-subtle text-warning">
                            <i class="bi bi-people"></i>
                        </div>
                        <h6 class="text-muted">ลูกค้าสมาชิก</h6>
                        <h3 class="mb-0">89 <small class="fs-6">ราย</small></h3>
                    </div>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-lg-8">
                    <div class="card border-0 shadow-sm rounded-4 p-4">
                        <h5 class="mb-4 fw-bold text-danger">กิจกรรมล่าสุด 🕒</h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item px-0 py-3 border-0 border-bottom">
                                <i class="bi bi-check-circle-fill text-success me-2"></i>
                                สมชาย ใจดี สั่งซื้อออเดอร์ #ORD-6701 - <span class="text-muted small">2 นาทีที่แล้ว</span>
                            </li>
                            <li class="list-group-item px-0 py-3 border-0 border-bottom">
                                <i class="bi bi-plus-circle-fill text-primary me-2"></i>
                                เพิ่มสินค้าใหม่ "กระเป๋าสีชมพู" เข้าคลัง - <span class="text-muted small">1 ชม. ที่แล้ว</span>
                            </li>
                            <li class="list-group-item px-0 py-3 border-0">
                                <i class="bi bi-exclamation-triangle-fill text-warning me-2"></i>
                                สินค้า "เสื้อยืดสีขาว" ใกล้หมดสต็อก - <span class="text-muted small">3 ชม. ที่แล้ว</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>