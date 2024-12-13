<?php session_start();
if (isset($_SESSION['IDKhachHang'])){
unset($_SESSION['IDKhachHang']); // xóa session login
}
?>