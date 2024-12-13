<?php

session_start();

if(isset($_SESSION['IDAdmin']))
{
	unset($_SESSION['IDAdmin']);

}

header("Location: loginadmin.php");
die;