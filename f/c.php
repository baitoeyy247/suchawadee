<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>สุชาวดี สุระสิงห์ (ใบเตย)</title>
</head>

<body>
<h1>สุชาวดี สุระสิงห์ (ใบเตย)</h1>

<form method="post" action="">
กรอกคะแนน<input type="number" name="a" min="0" max="100" autofocus required>
<button type="submit" name="Submit">OK</button>
</form>
<hr>

<?php
if(isset($_POST['Submit'])){
	
	$score = $_POST['a'];

	if ($score < 0 || $score > 100) {
		echo "กรุณากรอกคะแนนระหว่าง 0 ถึง 100";
	} else {

		if ($score >= 80) {
			$grade = "A";
		} else if ($score >= 70) {
			$grade = "B";
		} else if ($score >= 60) {
			$grade = "C";
		} else if ($score >= 50) {
			$grade = "D";
		} else {
			$grade = "F";
		}

		echo "คะแนน $score ได้เกรด $grade";
	}
}
?>

</body>
</html>