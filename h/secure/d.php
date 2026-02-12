<?php
    session_start();
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>สุชาวดี สุระสิงห์(ใบเตย)</title>
</head>

<body>
<h1>d.php</h1>

<?php
   unset ($_SESSION['name']) ;
   unset ($_SESSION['nickname']) ;
?>
</body>
</html>