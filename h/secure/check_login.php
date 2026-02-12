<?php
	
	if(empty($_SESSION['aid'])){
	echo "Access Denied !!!" ;
	echo "<mata http-equiv='refresh' content='3; url=index.php'>";
    exit;
	}
?>