<?php 
	require("../connect.php");
	$IDBooking = $_GET["IDBooking"];
	$sql = "DELETE from booking WHERE bookingID = ".$IDBooking."";
	$conn->query($sql) or die($conn->error);
	header("Location:account.php");
?>

<html>
	<head>
		<meta charset="utf-8">
	</head>
	<body>
	</body>
</html>