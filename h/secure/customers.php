<?php
session_start();
include_once("check_login.php"); 
?>
<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>จัดการลูกค้า : Admin System</title>
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
        .customer-card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 8px 25px rgba(255, 138, 138, 0.1);
            background-color: white;
        }
        .table thead {
            background-color: #ffe5e5;
            color: #d63031;
        }
        .avatar-circle {
            width: 40px;
            height: 40px;
            background-color: #ffcccc;
            color: #ff6b6b;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            font-weight: bold;
        }
        .btn-contact {
            background-color: #fff0f0;
            color: #ff6b6b;
            border: 1px solid #ffcccc;
            border-radius: 15px;
            font-size: 0.85rem;
            transition: 0.3s;
        }
        .btn-contact:hover {
            background-color: #ff6b6b;
            color: white;
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <nav class="col-md-3 col-lg-2 d-md-block sidebar collapse p-3 shadow">
            <div class="text-center mb-4 mt-2">
                <div class="p-2 border border-2 border-white rounded-circle d-inline-block">
                    <i class="bi bi-person-hearts" style="font-size: 2rem;"></i>
                </div>
                <div class="mt-2 fw-bold text-white"><?php echo $_SESSION['aname']; ?></div>
                <span class="badge bg-white text-danger rounded-pill">Admin Mode</span>
            </div>
            <ul class="nav flex-column">
                <li class="nav-item"><a class="nav-link" href="index2.php"><i class="bi bi-house-door me-2"></i> หน้าหลักแอดมิน</a></li>
                <li class="nav-item"><a class="nav-link" href="products.php"><i class="bi bi-box-seam me-2"></i> จัดการสินค้า</a></li>
                <li class="nav-item"><a class="nav-link" href="orders.php"><i class="bi bi-cart-check me-2"></i> จัดการออเดอร์</a></li>
                <li class="nav-item"><a class="nav-link active" href="customers.php"><i class="bi bi-people me-2"></i> จัดการลูกค้า</a></li>
                <hr class="text-white-50">
                <li class="nav-item"><a class="nav-link text-warning-emphasis" href="logout.php"><i class="bi bi-door-closed me-2"></i> ออกจากระบบ</a></li>
            </ul>
        </nav>

        <main class="col-md-9 ms-sm-auto col-lg-10 main-content">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="text-danger">รายชื่อสมาชิก 💖</h1>
                <div class="input-group w-25 shadow-sm">
                    <input type="text" class="form-control border-danger-subtle" placeholder="ค้นหาชื่อลูกค้า...">
                    <button class="btn btn-danger" type="button"><i class="bi bi-search"></i></button>
                </div>
            </div>

            <div class="card customer-card">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0 align-middle">
                            <thead>
                                <tr>
                                    <th class="ps-4">ลำดับ</th>
                                    <th>โปรไฟล์</th>
                                    <th>ชื่อ-นามสกุล</th>
                                    <th>อีเมล / เบอร์โทรศัพท์</th>
                                    <th>วันที่สมัคร</th>
                                    <th class="text-center">จัดการ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="ps-4 text-muted">01</td>
                                    <td>
                                        <div class="avatar-circle">ส</div>
                                    </td>
                                    <td><span class="fw-bold">สมชาย รักเรียน</span></td>
                                    <td>
                                        <div class="small text-muted"><i class="bi bi-envelope me-1"></i> somchai@email.com</div>
                                        <div class="small text-muted"><i class="bi bi-telephone me-1"></i> 081-234-5678</div>
                                    </td>
                                    <td>1 ก.พ. 2569</td>
                                    <td class="text-center">
                                        <button class="btn btn-sm btn-contact shadow-sm me-1"><i class="bi bi-eye"></i></button>
                                        <button class="btn btn-sm btn-outline-danger border-0"><i class="bi bi-trash3"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="ps-4 text-muted">02</td>
                                    <td>
                                        <div class="avatar-circle">น</div>
                                    </td>
                                    <td><span class="fw-bold">นารี สวยงาม</span></td>
                                    <td>
                                        <div class="small text-muted"><i class="bi bi-envelope me-1"></i> naree@email.com</div>
                                        <div class="small text-muted"><i class="bi bi-telephone me-1"></i> 089-888-9999</div>
                                    </td>
                                    <td>2 ก.พ. 2569</td>
                                    <td class="text-center">
                                        <button class="btn btn-sm btn-contact shadow-sm me-1"><i class="bi bi-eye"></i></button>
                                        <button class="btn btn-sm btn-outline-danger border-0"><i class="bi bi-trash3"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <p class="mt-4 text-center text-muted small">
                พบลูกค้าทั้งหมด 2 รายการในระบบ
            </p>
        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>