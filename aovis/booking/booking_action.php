<?php
include("../connect.php");
date_default_timezone_set('Asia/Ho_Chi_Minh');

$IDPhim = $_POST["IDPhim"];
$IDKhachHang = $_POST["IDKhachHang"];
$NgayChieu = $_POST["NgayChieu"];
$GioChieu = $_POST["GioChieu"];
$BuoiChieu = $NgayChieu . " " . $GioChieu;
$IDPhongChieu = $_POST["PhongChieu"];
$SoGhe = $_POST["SoGhe"];
$ThoiGianBook = date('YmdHis');


$sql = "select * from buoichieu";
$result = $conn->query("$sql");
while ($row = $result->fetch_assoc()){
    if ($BuoiChieu == $row["BuoiChieu"]){
        $IDBuoiChieu = $row["IDBuoiChieu"];
    }
}

$sql_booking = "INSERT INTO `booking`( `movieID`, `phongchieuID`, `buoichieuID`, `userID`, `SoGhe`,`ThoiGianBook`)
         VALUES ($IDPhim,$IDPhongChieu,$IDBuoiChieu,$IDKhachHang,'$SoGhe','$ThoiGianBook')";
 $result = $conn->query("$sql_booking") or die;

 if ($conn->error==""){
    echo 1;
} else {
   echo $sql_booking;
}

//  header("Location:booking.php?IDPhim=".$IDPhim."&IDKhachHang=".$IDKhachHang."");
?>