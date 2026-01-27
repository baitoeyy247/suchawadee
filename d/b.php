<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>สุชาวดี สุระสิงห์(ใบเตย)</title>
</head>

<body>
<h1>ฟอร์มสมัครสมาชิก --สุชาวดี สุระสิงห์(ใบเตย)</h1>

<form method="post" action="">

ชื่อ-สกุล <input type="text" name="fullname" required autofocus> * <br>
เบอร์โทร <input type="text" name="Phone" required> * <br>
ความสูง <input type="number" name="height" step="5" min="100"max="200" required>ซม.*<br>
สีที่ชอบ <input type="color"name="color"</br>

<br>
สาขาวิชา
<select name="major">
    <option value="การบัญชี">การบัญชี</option>
    <option value="การจัดการ">การจัดการ</option>
    <option value="การตลาด">การตลาด</option>
    <option value="คอมพิวเตอร์ธุรกิจ">คอมพิวเตอร์ธุรกิจ</option>
</select> <br>

<!---<input type="submit" name="Submit" value="สมัครสมาชิก">-->
<button type="submit" name="Submit">สมัครสมาชิก</button>
<button type="reset" name=>Reset</button>
<button type="button" onClick="window.location='https://www.msu.ac.th';">go to Msu</button>
<button type="button" onClick="window.print();">พิมพ์</button>
</form>
<hr>

<?php
if (isset($_POST['Submit'])){
	$fullname = $_POST['fullname'];
	$Phone = $_POST['Phone'];
	$height = $_POST['height'];
	$color = $_POST['color'];
	$major = $_POST['major'];
	
    echo"ชื่อ-สกุล:".$fullname."<br>";
	echo "เบอร์โทร:".$Phone."<br>";
	echo "ความสูง:".$height."ซม.<br>";
	echo "สีที่ชอบ:".$color."<div style='background:{$color}'> x </div>";
	echo "สาขาวิชา:".$major."<br>";
}
?>

</body>
</html>