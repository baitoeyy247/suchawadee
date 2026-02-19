<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>สุชาวดี สุระสิงห์ (ใบเตย)</title>
</head>

<body>
<h1>ข้อมูลภาค -- สุชาวดี สุระสิงห์ (ใบเตย)</h1>

<form method="post" action="">
    ชื่อภาค
    <input type="text" name="rname" autofocus required>
    <input type="submit" name="Submit" value="บันทึก">
</form>

<br><br>

<?php
if(isset($_POST['Submit'])) {
    // แก้ไข Path ให้เรียก connectdb.php ในโฟลเดอร์เดียวกัน
    include_once("connectdb.php");

    $rname = mysqli_real_escape_string($conn, $_POST['rname']);
    $sql2 = "INSERT INTO regions (r_id, r_name) VALUES (NULL, '$rname')";
    if(mysqli_query($conn, $sql2)) {
        echo "<script>window.location.href='a.php';</script>";
    } else {
        echo "insert ไม่ได้: " . mysqli_error($conn);
    }
}
?>

<table border="1" >
<tr>
    <th>รหัสภาค</th>
    <th>ชื่อภาค</th>
    <th>ลบ</th>
</tr>

<?php
// แก้ไข Path ให้เรียก connectdb.php ในโฟลเดอร์เดียวกัน
include_once("connectdb.php");
$sql = "SELECT * FROM regions ORDER BY r_id ASC";
$rs = mysqli_query($conn, $sql);

while($data = mysqli_fetch_array($rs)){
?>
<tr>
    <td><?php echo $data['r_id']; ?></td>
    <td><?php echo $data['r_name']; ?></td>
    <td width="50" align="center">
        <a href="delete.php?id=<?php echo $data['r_id'];?>" onClick="return confirm('ยืนยันการลบ');">
            <img src="img/dlet.jpg" width="20" alt="ลบ">
        </a>
    </td>
</tr>
<?php } ?>

</table>

</body>
</html>
