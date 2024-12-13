<?php

function check_login($conn)
{

	if(isset($_SESSION['IDKhachHang']))
	{

		$id = $_SESSION['IDKhachHang'];
		$query = "select * from khachhang where IDKhachHang = '$id' limit 1";

		$result = mysqli_query($conn,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$user_data = mysqli_fetch_assoc($result);
			return $user_data;
		}
	}

	//redirect to login
	header("Location: ../../testdangky/login.php");
	die;
}