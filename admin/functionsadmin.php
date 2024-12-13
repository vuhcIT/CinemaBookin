<?php

function check_login($con)
{

	if(isset($_SESSION['IDAdmin']))
	{

		$id = $_SESSION['IDAdmin'];
		// Kiểm tra IDAdmin có bị trùng hay không
		$query = "select * from admin where IDAdmin = '$id' limit 1";

		$result = mysqli_query($con,$query);
		// Nếu kết quả trả về lớn hơn 1 thì nghĩa là IDKhachHang đã tồn tại trong CSDL
		if($result && mysqli_num_rows($result) > 0)
		{

			$user_data = mysqli_fetch_assoc($result);
			return $user_data;
		}
	}

	//redirect to login
	header("Location: loginadmin.php");
	die;

}