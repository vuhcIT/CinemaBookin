<?php 
	require("../aovis/connect.php");
	$IDkhachhang = $_GET["IDKhachHang"];
	$sql = "DELETE from khachhang WHERE IDKhachHang = ".$IDkhachhang."";
	$conn->query($sql) or die($conn->error);
	header("Location:khachhang.php");
?>

<html>
	<head>
		<meta charset="utf-8">
	</head>
	<body>
	</body>
</html>