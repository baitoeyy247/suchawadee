<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>สุชาวดี สุระสิงห์ (ใบเตย)</title>
    <link href="https://fonts.googleapis.com/css2?family=Mitr:wght@300;400&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Mitr', sans-serif;
            background-color: #f0fdf4; /* พื้นหลังเขียวอ่อนมากๆ */
            color: #2d5a27;
        }
        .card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        }
        .table-mint {
            --bs-table-bg: #e6fffa; /* สีเขียวมิ้นต์อ่อน */
            --bs-table-striped-bg: #f0fff4;
            border-radius: 15px;
            overflow: hidden;
        }
        .thead-mint {
            background-color: #a7f3d0 !important; /* หัวตารางเขียวมิ้นต์เข้มขึ้นนิดนึง */
            color: #065f46;
        }
        .img-product {
            border-radius: 10px;
            object-fit: cover;
            border: 2px solid #fff;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .total-row {
            background-color: #d1fae5;
            font-weight: bold;
        }
        h2 {
            color: #059669;
            font-weight: 600;
        }
    </style>
</head>

<body>

<div class="container py-5">
    <div class="text-center mb-5">
        <h2 class="display-6">🌿 รายการสินค้า Supermarket</h2>
        <p class="text-muted">จัดการข้อมูลโดย: สุชาวดี สุระสิงห์ (ใบเตย)</p>
    </div>

    <div class="card p-4">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="thead-mint">
                    <tr>
                        <th class="py-3 ps-4">ID</th>
                        <th class="py-3">สินค้า</th> 
                        <th class="py-3">ประเภท</th>
                        <th class="py-3">วันที่</th>
                        <th class="py-3">ประเทศ</th>
                        <th class="py-3 text-end">จำนวนเงิน</th> 
                        <th class="py-3 text-center">รูปภาพ</th>    
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php
                        include_once("connectdb.php");
                        $sql = "SELECT * FROM `popsupermarket`";
                        $rs = mysqli_query($conn, $sql);
                        $total = 0;
                        while ($data = mysqli_fetch_array($rs)){
                            $total += $data['p_amount'];
                    ?>
                    <tr>
                        <td class="ps-4"><span class="badge rounded-pill bg-success bg-opacity-10 text-success">#<?php echo $data['p_order_id'];?></span></td>
                        <td class="fw-bold"><?php echo $data['p_product_name'];?></td>
                        <td><span class="badge bg-light text-dark border"><?php echo $data['p_category'];?></span></td>
                        <td class="text-muted small"><?php echo $data['p_date'];?></td>
                        <td><?php echo $data['p_country'];?></td>
                        <td class="text-end fw-bold"><?php echo number_format($data['p_amount'],0);?> ฿</td>
                        <td class="text-center">
                            <img src="<?php echo $data['p_product_name'];?>.jpg" 
                                 alt="product" 
                                 width="50" 
                                 height="50" 
                                 class="img-product"
                                 onerror="this.src='https://via.placeholder.com/50?text=No+Img'">
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr class="total-row">
                        <td colspan="5" class="text-end py-3">ยอดรวมทั้งสิ้น:</td>
                        <td class="text-end py-3 text-success h5"><?php echo number_format($total,0);?> ฿</td>
                        <td></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
