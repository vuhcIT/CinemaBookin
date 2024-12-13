<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
 //post lay data
 error_reporting(0);
 $IDPhim = $_POST['txtIdPhim'];
 $PhongChieu = $_POST['txtPhongChieu'];
 $GiaVe = $_POST['txtGiaVe'];
 $NgayChieu = $_POST['txtNgayChieu'];
 $GioChieu = $_POST['txtGioChieu'];
 $SoGhe = $_POST['txtSoGhe'];
 $IDKhachHang = $_POST['txtIdKhachHang'];


$vnp_TmnCode = "VRW9K1SS"; //Mã định danh merchant kết nối (Terminal Id)
$vnp_HashSecret = "PW058FHIUP76PMIJEN5YSW6BCMC1XY1U"; //Secret key
$vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html?IDPhim=$IDPhim&PhongChieu=$PhongChieu&GiaVe=$GiaVe&NgayChieu=$NgayChieu&GioChieu=$GioChieu&SoGhe=$SoGhe&IdKhachHang=$IDKhachHang";
$vnp_Returnurl ="http://localhost/doanwebTN/chonloc/aovis/booking/booking2.php?IDPhim=$IDPhim&PhongChieu=$PhongChieu&GiaVe=$GiaVe&NgayChieu=$NgayChieu&GioChieu=$GioChieu&SoGhe=$SoGhe&IdKhachHang=$IDKhachHang";
//$vnp_Returnurl = "http://localhost/vnpay_php/vnpay_return.php";
$vnp_apiUrl = "http://sandbox.vnpayment.vn/merchant_webapi/merchant.html";
$apiUrl = "https://sandbox.vnpayment.vn/merchant_webapi/api/transaction";
//Config input format
//Expire
$startTime = date("YmdHis");
$expire = date('YmdHis',strtotime('+15 minutes',strtotime($startTime)));
