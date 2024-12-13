<?php
    require_once("Connect.php");
    $IDPhim = $_GET["IDPhim"];
    
    $IDKhachHang = $_GET["IDKhachHang"];
    $comment = $_POST["txtComment"];
    $ThoiGian = date('Y-m-d H:i:s');
    $sql ="INSERT INTO `feedback`(`ThoiGianFB`,`IDKhachHang`, `IDPhim`, `comment`) VALUES ('$ThoiGian','$IDKhachHang', '$IDPhim', '$comment')";
    $conn->query($sql);
    
    header("location: detail.php?IDPhim=".$IDPhim);
?>