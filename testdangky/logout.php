<?php

session_start();

if(isset($_SESSION['IDKhachHang']))
{
	unset($_SESSION['IDKhachHang']);

}

header("Location: ../aovis/indexNotLogin.php");
die;