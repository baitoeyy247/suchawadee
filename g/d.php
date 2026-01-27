<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>สุชาวดี สุระสิงห์ (ใบเตย) - Dashboard</title>
<link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;500&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>
    body {
        font-family: 'Sarabun', sans-serif;
        background-color: #f8f9fa;
        color: #444;
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 40px 20px;
        margin: 0;
    }
    h1 {
        font-weight: 500;
        color: #2c3e50;
        margin-bottom: 40px;
    }
    .container {
        display: flex;
        flex-wrap: wrap;
        gap: 25px;
        justify-content: center;
        max-width: 1200px;
        width: 100%;
    }
    .card {
        background: white;
        padding: 25px;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.04);
        flex: 1; /* ให้ยืดหยุ่นตามเนื้อหา */
        min-width: 320px;
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .table-card {
        max-width: 400px;
    }
    table {
        border-collapse: collapse;
        width: 100%;
    }
    th {
        border-bottom: 2px solid #f1f1f1;
        padding: 15px 10px;
        color: #888;
        font-weight: 500;
        text-align: left;
    }
    td {
        padding: 15px 10px;
        border-bottom: 1px solid #f9f9f9;
    }
    .chart-container {
        min-width: 350px;
        max-width: 500px;
    }
    .chart-title {
        font-size: 16px;
        font-weight: 500;
        margin-bottom: 20px;
        color: #555;
    }
</style>
</head>

<body>
<h1>📊 ระบบสรุปยอดขาย - สุชาวดี สุระสิงห์ (ใบเตย)</h1>

<div class="container">
    <div class="card table-card">
        <div class="chart-title">รายละเอียดรายประเทศ</div>
        <table>
        <tr>
            <th>ประเทศ</th>
            <th style="text-align: right;">ยอดขาย (บาท)</th>
        </tr>

        <?php
            include_once("connectdb.php");
            
            $sql = "SELECT p_country, SUM(p_amount) AS total FROM popsupermarket GROUP BY p_country";
            $rs = mysqli_query($conn, $sql);
            
            $total_all = 0;
            
            while ($data = mysqli_fetch_array($rs)){
                $total_all += $data['total'];
                $countries[] = $data['p_country'];
                $totals[] = $data['total'];
        ?>
        <tr>
            <td><?php echo $data['p_country'];?></td>
            <td align="right"><?php echo number_format($data['total'], 0);?></td>
        </tr>
        <?php } ?>

        <tr style="background-color: #fdfdfd; font-weight: bold;">
            <td align="center">รวมทั้งสิ้น</td>
            <td align="right" style="color: #ff8585; border-top: 2px solid #eee;">
                <?php echo number_format($total_all, 0); ?>
            </td>
        </tr>
        </table>
    </div>

    <div class="card chart-container">
        <div class="chart-title">สัดส่วนยอดขาย (Bar Chart)</div>
        <canvas id="salesBarChart"></canvas>
    </div>

    <div class="card chart-container">
        <div class="chart-title">สัดส่วนยอดขาย (Pie Chart)</div>
        <div style="width: 100%; max-width: 350px;">
            <canvas id="salesPieChart"></canvas>
        </div>
    </div>
</div>

<script>
    // ข้อมูลสำหรับกราฟ
    const labelsData = <?php echo json_encode($countries); ?>;
    const salesData = <?php echo json_encode($totals); ?>;
    
    // ชุดสีพาสเทลมินิมอล
    const pastelColors = [
        'rgba(255, 173, 173, 0.8)',
        'rgba(255, 214, 165, 0.8)',
        'rgba(252, 246, 189, 0.8)',
        'rgba(202, 255, 191, 0.8)',
        'rgba(155, 246, 255, 0.8)',
        'rgba(160, 196, 255, 0.8)',
        'rgba(189, 178, 255, 0.8)',
        'rgba(255, 198, 255, 0.8)'
    ];

    const borderColors = [
        '#ffadad', '#ffd6a5', '#fcf6bd', '#caffbf', '#9bf6ff', '#a0c4ff', '#bdb2ff', '#ffc6ff'
    ];

    // 1. การตั้งค่ากราฟแท่ง (Bar Chart)
    const ctxBar = document.getElementById('salesBarChart').getContext('2d');
    new Chart(ctxBar, {
        type: 'bar',
        data: {
            labels: labelsData,
            datasets: [{
                label: 'ยอดขายสะสม',
                data: salesData,
                backgroundColor: pastelColors,
                borderColor: borderColors,
                borderWidth: 1,
                borderRadius: 8
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false }
            },
            scales: {
                y: { beginAtZero: true, grid: { display: false } },
                x: { grid: { display: false } }
            }
        }
    });

    // 2. การตั้งค่ากราฟวงกลม (Pie Chart) - เพิ่มใหม่
    const ctxPie = document.getElementById('salesPieChart').getContext('2d');
    new Chart(ctxPie, {
        type: 'pie', // หรือเปลี่ยนเป็น 'doughnut' เพื่อความมินิมอลยิ่งขึ้น
        data: {
            labels: labelsData,
            datasets: [{
                data: salesData,
                backgroundColor: pastelColors,
                borderColor: '#ffffff',
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        font: { family: 'Sarabun', size: 12 },
                        padding: 20
                    }
                }
            }
        }
    });
</script>

</body>
</html>