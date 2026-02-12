<?php
session_start();
include_once("check_login.php"); 
?>
<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>จัดการออเดอร์ : Admin System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;500&family=Itim&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <style>
        body {
            background-color: #fffafa;
            font-family: 'Sarabun', sans-serif;
        }
        h1, h2, .nav-link {
            font-family: 'Itim', cursive;
        }
        .sidebar {
            background-color: #ff8a8a; /* แดงอ่อนพาสเทล */
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
        .order-card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 5px 20px rgba(255, 138, 138, 0.1);
            overflow: hidden;
        }
        .table thead {
            background-color: #ffe5e5;
            color: #d63031;
        }
        /* สถานะออเดอร์ */
        .status-pending { background-color: #fff4e5; color: #ff9f43; border: 1px solid #ff9f43; }
        .status-success { background-color: #e3f9e5; color: #2ecc71; border: 1px solid #2ecc71; }
        
        .admin-profile {
            background: rgba(255, 255, 255, 0.2);
            padding: 10px;
            border-radius: 15px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <nav class="col-md-3 col-lg-2 d-md-block sidebar collapse p-3">
            <div class="admin-profile text-center">
                <i class="bi bi-person-heart" style="font-size: 2.5rem;"></i>
                <div class="mt-2 small">แอดมิน: <strong><?php echo $_SESSION['aname']; ?></strong></div>
            </div>
            <ul class="nav flex-column">
                <li class="nav-item"><a class="nav-link" href="index2.php"><i class="bi bi-house-heart me-2"></i> หน้าหลักแอดมิน</a></li>
                <li class="nav-item"><a class="nav-link" href="products.php"><i class="bi bi-box-seam me-2"></i> จัดการสินค้า</a></li>
                <li class="nav-item"><a class="nav-link active" href="orders.php"><i class="bi bi-bag-heart me-2"></i> จัดการออเดอร์</a></li>
                <li class="nav-item"><a class="nav-link" href="customers.php"><i class="bi bi-people me-2"></i> จัดการลูกค้า</a></li>
                <hr>
                <li class="nav-item"><a class="nav-link text-white-50" href="logout.php"><i class="bi bi-power me-2"></i> ออกจากระบบ</a></li>
            </ul>
        </nav>

        <main class="col-md-9 ms-sm-auto col-lg-10 main-content">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="text-danger">รายการออเดอร์จากลูกค้า 🛍️</h1>
                <div class="text-muted small">วันนี้: <?php echo date("d/m/Y"); ?></div>
            </div>

            <div class="card order-card">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0 align-middle">
                            <thead>
                                <tr>
                                    <th class="ps-4">เลขที่ออเดอร์</th>
                                    <th>ชื่อลูกค้า</th>
                                    <th>วันที่สั่งซื้อ</th>
                                    <th>ราคารวม</th>
                                    <th>สถานะ</th>
                                    <th class="text-center">รายละเอียด</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="ps-4 fw-bold text-primary">#ORD-6701</td>
                                    <td>คุณสมชาย ใจดี</td>
                                    <td>2 ก.พ. 2569</td>
                                    <td>฿1,250.00</td>
                                    <td><span class="badge status-pending rounded-pill px-3">รอชำระเงิน</span></td>
                                    <td class="text-center">
                                        <a href="#" class="btn btn-sm btn-light text-danger shadow-sm border">
                                            <i class="bi bi-search"></i> ดูข้อมูล
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="ps-4 fw-bold text-primary">#ORD-6702</td>
                                    <td>คุณสมหญิง รักดี</td>
                                    <td>1 ก.พ. 2569</td>
                                    <td>฿890.00</td>
                                    <td><span class="badge status-success rounded-pill px-3">ชำระแล้ว</span></td>
                                    <td class="text-center">
                                        <a href="#" class="btn btn-sm btn-light text-danger shadow-sm border">
                                            <i class="bi bi-search"></i> ดูข้อมูล
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-4">
                    <div class="card border-0 bg-white shadow-sm p-3 rounded-4">
                        <div class="d-flex align-items-center">
                            <div class="rounded-circle bg-danger-subtle p-3 me-3 text-danger">
                                <i class="bi bi-graph-up-arrow"></i>
                            </div>
                            <div>
                                <p class="mb-0 text-muted small">ออเดอร์วันนี้</p>
                                <h4 class="mb-0 fw-bold">15 รายการ</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>