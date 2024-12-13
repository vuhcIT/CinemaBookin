<?php 
	session_start();
	require("../aovis/connect.php");
	$IDBuoiChieu = $_GET["IDBuoiChieu"];
	$sql = "delete from buoichieu where IDBuoiChieu=$IDBuoiChieu";
	$conn->query($sql) or die($conn->error);
	$conn->close();
	$_SESSION["buoichieu"]="Delete success!";
	//echo "test";
	header("Location:lichtrinh.php");
?>

<html>
	<head>
		<meta charset="utf-8">
	</head>
	<body>
	</body>
</html>