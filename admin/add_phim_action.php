<?php
include("../aovis/connect.php");
session_start();
//anh chinh
$nameAnhChinh = $_FILES["imgAnhChinh"]["name"];
$targetAnhChinh = "../aovis/img/" . $nameAnhChinh;
$tmp_nameAnhChinh = $_FILES["imgAnhChinh"]["tmp_name"];
$typeAnhChinh = $_FILES["imgAnhChinh"]["type"];
$sizeAnhChinh = $_FILES["imgAnhChinh"]["size"];

if ((($typeAnhChinh != "image/png") && ($typeAnhChinh != "image/jpeg") && ($typeAnhChinh != "image/gif")) || ($sizeAnhChinh > 5000000)) {
    $_SESSION["add_upload"] = "Chỉ cho phép upload ảnh và dung lượng dưới 5M";
    header("Location:add_phim.php");
} else if (move_uploaded_file($tmp_nameAnhChinh, $targetAnhChinh)) {
    $_SESSION["add_upload"] = "Tải tệp thành công!";

    //anh them
    $nameAnhThem = $_FILES["imgAnhPhu"]["name"];
    $targetAnhThem = "../aovis/img/" . $nameAnhThem;
    $tmp_nameAnhThem = $_FILES["imgAnhPhu"]["tmp_name"];
    $typeAnhThem = $_FILES["imgAnhPhu"]["type"];
    $sizeAnhThem = $_FILES["imgAnhPhu"]["size"];
    if ((($typeAnhThem != "image/png") && ($typeAnhThem != "image/jpeg") && ($typeAnhThem != "image/gif")) || ($sizeAnhThem > 5000000)) {
        $_SESSION["add_upload"] = "Chỉ cho phép upload ảnh và dung lượng dưới 5M";
    } else if (move_uploaded_file($tmp_nameAnhThem, $targetAnhThem)) {
        $_SESSION["add_upload"] = "Tải tệp thành công!";

        // them phim
        $TenPhim = $_POST["txtTenPhim"];
        $TheLoai = $_POST["txtTheLoai"];
        $NgonNgu = $_POST["txtNgonNgu"];
        $NhaSanXuat = $_POST["txtNhaSanXuat"];
        $QuocGia = $_POST["txtQuocGia"];
        $Mota = $_POST["txtMoTa"];
        $LichChieu = $_POST["txtLichChieu"];
        $GiaVe = $_POST["txtGiaVe"];
        $Trailer = $_POST["txtTrailer"];
        $DaoDien = $_POST["txtDaoDien"];
        $ThoiLuong = $_POST["txtThoiLuong"];
        //kiểm tra xem cname đã có chưa, có rồi báo lỗi
        $sql = "SELECT * FROM phim WHERE TenPhim LIKE '" . $TenPhim . "'";
        $result = $conn->query($sql) or die($conn->connect_error);
        if ($result->num_rows > 0) {
            $_SESSION["add_phim"] = "Phim đã tồn tại";
            header("Location:add_phim.php");
        } else {
            $_SESSION["add_phim"] = "";
            $sqlinsert = "INSERT INTO `phim`( `TenPhim`, `TheLoai`, `NgonNgu`, `QuocGia`, `NhaSanXuat`, `detail`, `LichChieu`, `GiaVe` , `AnhChinh`, `AnhThem`, `Trailer`, `DaoDien`, `ThoiLuong`) 
                    VALUES ('" . $TenPhim . "','" . $TheLoai . "','" . $NgonNgu . "','" . $QuocGia . "','" . $NhaSanXuat . "','" . $Mota . "','" . $LichChieu . "','" . $GiaVe . "','" . $nameAnhChinh . "','" . $nameAnhThem . "','" . $Trailer . "','" . $DaoDien . "','" . $ThoiLuong . "')";
            $conn->query($sqlinsert) or die($conn->connect_error);
            $_SESSION["add_phim"] = "Thêm phim thành công";
            header("Location:add_phim.php");
        }
    } else {
        $_SESSION["add_upload"] = "Tải tệp không thành công!";
        header("Location:add_phim.php");
    }
} else {
    $_SESSION["add_upload"] = "Tải tệp không thành công!";
    header("Location:add_phim.php");
}
