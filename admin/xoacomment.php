<?php 
	require("../aovis/connect.php");
	$IDFeedback = $_GET["IDFeedBack"];
	$sql = "DELETE from feedback WHERE IDFeedBack = ".$IDFeedback."";
	$conn->query($sql) or die($conn->error);
	header("Location:comment.php");
?>

<html>
	<head>
		<meta charset="utf-8">
	</head>
	<body>
	</body>
</html>