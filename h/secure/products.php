<?php
session_start();
// สมมติว่าไฟล์ check_login.php มีการ session_start() ไว้แล้ว
include_once("check_login.php"); 
?>
<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>จัดการสินค้า : Admin System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;500&family=Itim&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <style>
        body {
            background-color: #fffafa; /* ขาวอมแดงนิดๆ */
            font-family: 'Sarabun', sans-serif;
        }
        h1, h2, .nav-link {
            font-family: 'Itim', cursive;
        }
        /* Sidebar Style */
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
        /* Content Style */
        .main-content {
            padding: 30px;
        }
        .product-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(255, 138, 138, 0.15);
        }
        .table thead {
            background-color: #ffe5e5;
            color: #d63031;
        }
        .btn-add {
            background-color: #ff6b6b;
            color: white;
            border-radius: 20px;
            padding: 8px 20px;
        }
        .btn-add:hover {
            background-color: #ee5253;
            color: white;
        }
        .admin-badge {
            background-color: #fff;
            color: #ff8a8a;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <nav class="col-md-3 col-lg-2 d-md-block sidebar collapse p-3">
            <div class="text-center mb-4">
                <div class="mb-2">
                    <i class="bi bi-person-circle" style="font-size: 3rem;"></i>
                </div>
                <span class="admin-badge shadow-sm">
                    <i class="bi bi-heart-fill"></i> <?php echo $_SESSION['aname']; ?>
                </span>
            </div>
            <hr>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="index2.php">
                        <i class="bi bi-house-door me-2"></i> หน้าหลักแอดมิน
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="products.php">
                        <i class="bi bi-box-seam me-2"></i> จัดการสินค้า
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="orders.php">
                        <i class="bi bi-cart-check me-2"></i> จัดการออเดอร์
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="customers.php">
                        <i class="bi bi-people me-2"></i> จัดการลูกค้า
                    </a>
                </li>
                <li class="nav-item mt-4">
                    <a class="nav-link text-warning" href="logout.php" onclick="return confirm('ยืนยันการออกจากระบบ?')">
                        <i class="bi bi-box-arrow-left me-2"></i> ออกจากระบบ
                    </a>
                </li>
            </ul>
        </nav>

        <main class="col-md-9 ms-sm-auto col-lg-10 main-content">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="text-danger">จัดการสินค้า 🍎</h1>
                <button class="btn btn-add shadow-sm">
                    <i class="bi bi-plus-lg me-1"></i> เพิ่มสินค้าใหม่
                </button>
            </div>

            <div class="card product-card">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0 align-middle">
                            <thead>
                                <tr>
                                    <th class="ps-4">รหัสสินค้า</th>
                                    <th>รูปภาพ</th>
                                    <th>ชื่อสินค้า</th>
                                    <th>ราคา</th>
                                    <th>สต็อก</th>
                                    <th class="text-center">จัดการ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="ps-4">P001</td>
                                    <td><img src="https://via.placeholder.com/50" class="rounded" alt="สินค้า"></td>
                                    <td>สินค้าตัวอย่าง 1</td>
                                    <td>฿199.00</td>
                                    <td><span class="badge bg-success-subtle text-success">10 ชิ้น</span></td>
                                    <td class="text-center">
                                        <button class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></button>
                                        <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                    </td>
                                </tr>
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            <footer class="mt-5 text-center text-muted">
                <small>© 2024 สุชาวดี สุระสิงห์ (ใบเตย) - Admin Dashboard</small>
            </footer>
        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>