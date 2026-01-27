<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ใบสมัครงาน | บริษัท ชนิกานต์ ขำสระน้อย</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="bg-light">
   
    <div class="container my-5" style="max-width: 800px;">
       
        <h2 class="text-center mb-4 text-primary">ใบสมัครงาน บริษัท ชนิกานต์ ขำสระน้อย</h2>

        <div class="card shadow-lg p-4">
           
            <form method="post" action="">
               
                <h4 class="mb-3 text-secondary border-bottom pb-2">🎯 ตำแหน่งที่ต้องการสมัคร</h4>
                <div class="mb-4">
                    <label for="position" class="form-label fw-bold">ตำแหน่งงานที่สนใจ *</label>
                    <select class="form-select" id="position" name="position" required>
                        <option selected disabled value="">--- กรุณาเลือกตำแหน่ง ---</option>
                        <option value="วิศวกรซอฟต์แวร์">วิศวกรซอฟต์แวร์</option>
                        <option value="นักวิเคราะห์ข้อมูล">นักวิเคราะห์ข้อมูล</option>
                    </select>
                </div>
               
                <h4 class="mb-3 text-secondary border-bottom pb-2">👤 ข้อมูลส่วนตัว</h4>
                <div class="row g-3 mb-4">
                   
                    <div class="col-md-3">
                        <label for="prefix" class="form-label">คำนำหน้าชื่อ *</label>
                        <select class="form-select" id="prefix" name="prefix" required>
                            <option value="นาย">นาย</option>
                            <option value="นาง">นาง</option>
                            <option value="นางสาว">นางสาว</option>
                        </select>
                    </div>

                    <div class="col-md-5">
                        <label for="fullname" class="form-label">ชื่อ-สกุล *</label>
                        <input type="text" class="form-control" id="fullname" name="fullname" required>
                    </div>
                   
                    <div class="col-md-4">
                        <label for="dob" class="form-label">วัน/เดือน/ปีเกิด *</label>
                        <input type="date" class="form-control" id="dob" name="dob" required>
                    </div>
                </div>

                <h4 class="mb-3 text-secondary border-bottom pb-2">🎓 การศึกษาและความสามารถ</h4>
                <div class="row g-3 mb-4">
                   
                    <div class="col-md-6">
                        <label for="education" class="form-label">ระดับการศึกษาสูงสุด *</label>
                        <select class="form-select" id="education" name="education" required>
                            <option value="ปริญญาตรี">ปริญญาตรี</option>
                            <option value="ปริญญาโท">ปริญญาโท</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="skills" class="form-label">ความสามารถพิเศษ / ทักษะเด่น</label>
                        <input type="text" class="form-control" id="skills" name="skills" placeholder="เช่น ภาษาอังกฤษ, Python">
                    </div>
                </div>

                <h4 class="mb-3 text-secondary border-bottom pb-2">💼 ประสบการณ์ทำงาน</h4>
                <div class="mb-4">
                    <label for="experience" class="form-label">ประสบการณ์ทำงานโดยสรุป *</label>
                    <textarea class="form-control" id="experience" name="experience" rows="4" required placeholder="โปรดระบุชื่อบริษัท, ตำแหน่ง และระยะเวลาการทำงาน"></textarea>
                </div>
               
                <div class="d-grid gap-2 d-md-flex justify-content-md-end pt-3">
                    <button type="submit" name="Submit" class="btn btn-primary btn-lg px-4">ส่งใบสมัคร ✔</button>
                    <button type="reset" class="btn btn-outline-secondary">ล้างข้อมูล</button>
                </div>
            </form>
        </div>

<?php
if (isset($_POST['Submit'])) {

    // ดึงข้อมูลจากฟอร์ม
    $position   = $_POST['position'];
    $prefix     = $_POST['prefix'];
    $fullname   = $_POST['fullname'];
    $dob        = $_POST['dob'];
    $education  = $_POST['education'];
    $skills     = $_POST['skills'];
    $experience = $_POST['experience'];

    // เชื่อมต่อฐานข้อมูล
    include_once("connectdb.php");

    // ป้องกัน SQL Injection ด้วย mysqli_real_escape_string
    $position   = mysqli_real_escape_string($conn, $position);
    $prefix     = mysqli_real_escape_string($conn, $prefix);
    $fullname   = mysqli_real_escape_string($conn, $fullname);
    $dob        = mysqli_real_escape_string($conn, $dob);
    $education  = mysqli_real_escape_string($conn, $education);
    $skills     = mysqli_real_escape_string($conn, $skills);
    $experience = mysqli_real_escape_string($conn, $experience);

    // ตรวจสอบวันเกิด (ถ้าไม่ถูกต้องเก็บเป็นค่าว่าง)
    if (DateTime::createFromFormat('Y-m-d', $dob) === false) {
        $dob = '';
    }

    $sql = "INSERT INTO application
        (position, prefix, fullname, dob, education, skills, experience)
        VALUES ('$position', '$prefix', '$fullname', '$dob', '$education', '$skills', '$experience')";

   
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('เพิ่มข้อมูลสำเร็จ');</script>";
    } else {
        echo "เกิดข้อผิดพลาด: " . mysqli_error($conn);
    }

    // ปิดการเชื่อมต่อ
    mysqli_close($conn);
}
?>


       
    </div>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
