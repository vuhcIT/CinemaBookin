<?php
require_once("../aovis/connect.php");

// Kiểm tra xem có dữ liệu được gửi từ biểu mẫu không
//if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy IDPhim từ URL
    $IDPhim = $_GET["IDPhim"];

    // Lấy dữ liệu từ biểu mẫu
    $TenPhim = $_POST["txtTenPhim"];
    $MoTa = $_POST["txtMoTa"];
    $TheLoai = $_POST["txtTheLoai"];
    $QuocGia = $_POST["txtQuocGia"];
    $NgonNgu = $_POST["txtNgonNgu"];
    $Trailer = $_POST["txtTrailer"];
    $DaoDien = $_POST["txtDaoDien"];
    $NhaSanXuat = $_POST["txtNhaSanXuat"];
    $LichChieu = $_POST["txtLichChieu"];
    $ThoiLuong = $_POST["txtThoiLuong"];
    $GiaVe = $_POST["txtGiaVe"];

    // Kiểm tra xem có tệp ảnh chính mới được chọn không
    if ($_FILES["imgAnhChinh"]["name"] != "") {
        // Upload và lưu tệp ảnh chính mới
        $nameAnhChinh = $_FILES["imgAnhChinh"]["name"];
        $targetAnhChinh = "../aovis/img/".$nameAnhChinh;
        $tmp_nameAnhChinh = $_FILES["imgAnhChinh"]["tmp_name"];
        $typeAnhChinh = $_FILES["imgAnhChinh"]["type"];
        $sizeAnhChinh = $_FILES["imgAnhChinh"]["size"]; 
        move_uploaded_file($tmp_nameAnhChinh,$targetAnhChinh);
        // Cập nhật bảng phim với ảnh chính mới
        //kiểm tra xem cname đã có chưa, có rồi báo lỗi
        $_SESSION["add_phim"] = "";
        $sqlinsert = "UPDATE `phim` SET 
            `TenPhim`='" . $TenPhim . "',
            `TheLoai`='" . $TheLoai . "',
            `NgonNgu`='" . $NgonNgu . "',
            `QuocGia`='" . $QuocGia . "',
            `NhaSanXuat`='" . $NhaSanXuat . "',
            `detail`='" . $MoTa . "',
            `LichChieu`='" . $LichChieu . "',
            `AnhChinh`='" . $nameAnhChinh . "',
            `Trailer`='" . $Trailer . "',
            `DaoDien`='" . $DaoDien . "',
            `ThoiLuong`='" . $ThoiLuong . "',
             `GiaVe`='" . $GiaVe . "'
             WHERE IDPhim = " . $IDPhim . "";
        $conn->query($sqlinsert) or die($conn->connect_error);
        $_SESSION["edit_phim"] = "";
        //echo $sqlinsert;
    }
    if ($_FILES["imgAnhPhu"]["name"] != "") {
        // Upload và lưu tệp ảnh phụ mới
        $nameAnhThem = $_FILES["imgAnhPhu"]["name"];
        $targetAnhThem = "../aovis/img/".$nameAnhThem;
        $tmp_nameAnhThem = $_FILES["imgAnhPhu"]["tmp_name"];
        $typeAnhThem = $_FILES["imgAnhPhu"]["type"];
        $sizeAnhThem = $_FILES["imgAnhPhu"]["size"]; 
        move_uploaded_file($tmp_nameAnhThem,$targetAnhThem);
        // Cập nhật bảng phim với ảnh chính mới
        //kiểm tra xem cname đã có chưa, có rồi báo lỗi
        $_SESSION["add_phim"] = "";
        $sqlinsert = "UPDATE `phim` SET 
            `TenPhim`='" . $TenPhim . "',
            `TheLoai`='" . $TheLoai . "',
            `NgonNgu`='" . $NgonNgu . "',
            `QuocGia`='" . $QuocGia . "',
            `NhaSanXuat`='" . $NhaSanXuat . "',
            `detail`='" . $MoTa . "',
            `LichChieu`='" . $LichChieu . "',
            `AnhThem`='" . $nameAnhThem . "',
            `Trailer`='" . $Trailer . "',
            `DaoDien`='" . $DaoDien . "',
            `ThoiLuong`='" . $ThoiLuong . "',
            `GiaVe`='" . $GiaVe . "'
             WHERE IDPhim = " . $IDPhim . "";
        $conn->query($sqlinsert) or die($conn->connect_error);
        $_SESSION["edit_phim"] = "";
    }

    // Kiểm tra xem có tệp ảnh phụ mới được chọn không


    // Nếu cả hai ảnh đều không có, cập nhật các trường khác trừ ảnh
    if ($_FILES["imgAnhChinh"]["name"] != 0 && $_FILES["imgAnhPhu"]["name"] != 0) {
        // Cập nhật bảng phim mà không thay đổi trường ảnh

        $_SESSION["edit_phim"] = "";
        $sql_edit = "UPDATE `phim` SET 
            `TenPhim`='" . $TenPhim . "',
            `TheLoai`='" . $TheLoai . "',
            `NgonNgu`='" . $NgonNgu . "',
            `QuocGia`='" . $QuocGia . "',
            `NhaSanXuat`='" . $NhaSanXuat . "',
            `detail`='" . $MoTa . "',
            `LichChieu`='" . $LichChieu . "',
            `Trailer`='" . $Trailer . "',
            `DaoDien`='" . $DaoDien . "',
            `ThoiLuong`='" . $ThoiLuong . "',
            `GiaVe`='" . $GiaVe . "'
             WHERE IDPhim = " . $IDPhim . "";
        $conn->query($sql_edit) or die($conn->connect_error);
        $_SESSION["edit_phim"] = "Thêm phim thành công";
    }
    header("Location:edit_phim.php?IDPhim=" . $IDPhim);

?>
