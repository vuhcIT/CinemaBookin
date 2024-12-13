<?php
session_start();
// print_r($_POST);
include("../testdangky/connect.php");

$IDPhim = $_POST['IDPhim'];
$PhongChieu = $_POST['PhongChieu'];
$GiaVe = $_POST['GiaVe'];
$NgayChieu = $_POST['NgayChieu'];
$GioChieu = $_POST['GioChieu'];
$SoGhe = $_POST['SoGhe'];
$IDKhachHang = $_POST['IdKhachHang'];


$MaDon = 'Room:'. $PhongChieu . ', Day: ' . $NgayChieu . ', Time: ' . $GioChieu . ', Seat: ' . $SoGhe;

//code thanh toan vnpay
date_default_timezone_set('Asia/Ho_Chi_Minh');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
  
$vnp_TmnCode = "VRW9K1SS"; //Mã định danh merchant kết nối (Terminal Id)
$vnp_HashSecret = "PW058FHIUP76PMIJEN5YSW6BCMC1XY1U"; //Secret key
$vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
$vnp_Returnurl = "http://localhost/doanwebTN/chonloc/vnpay_php/vnpay_php/vnpay_return.php?IDPhim=$IDPhim&PhongChieu=$PhongChieu&GiaVe=$GiaVe&NgayChieu=$NgayChieu&GioChieu=$GioChieu&SoGhe=$SoGhe&IdKhachHang=$IDKhachHang&ThoiGianBook=$ThoiGianBook";
//$vnp_Returnurl = "http://localhost/doanwebTN/chonloc/aovis/booking/booking2.php?IDPhim=$IDPhim&PhongChieu=$PhongChieu&GiaVe=$GiaVe&NgayChieu=$NgayChieu&GioChieu=$GioChieu&SoGhe=$SoGhe&IdKhachHang=$IDKhachHang&ThoiGianBook=$ThoiGianBook";
$vnp_apiUrl = "http://sandbox.vnpayment.vn/merchant_webapi/merchant.html";
$apiUrl = "https://sandbox.vnpayment.vn/merchant_webapi/api/transaction";
//Config input format
//Expire
$startTime = date("YmdHis");
$expire = date('YmdHis',strtotime('+15 minutes',strtotime($startTime)));
//end config file


$vnp_TxnRef = $_POST['madon']; //Mã giao dịch thanh toán tham chiếu của merchant
$vnp_Amount = $_POST['amount']; // Số tiền thanh toán
$vnp_Locale = $_POST['language']; //Ngôn ngữ chuyển hướng thanh toán
$vnp_BankCode = $_POST['bankcode']; //Mã phương thức thanh toán
$vnp_IpAddr = $_SERVER['REMOTE_ADDR']; //IP Khách hàng thanh toán

$inputData = array(
    "vnp_Version" => "2.1.0",
    "vnp_TmnCode" => $vnp_TmnCode,
    "vnp_Amount" => $vnp_Amount* 100,
    "vnp_Command" => "pay",
    "vnp_CreateDate" => date('YmdHis'),
    "vnp_CurrCode" => "VND",
    "vnp_IpAddr" => $vnp_IpAddr,
    "vnp_Locale" => $vnp_Locale,
    "vnp_OrderInfo" => "Thanh toan GD",
    "vnp_OrderType" => "other",
    "vnp_ReturnUrl" => $vnp_Returnurl,
    "vnp_TxnRef" => $vnp_TxnRef,
    "vnp_ExpireDate"=>$expire,
);

if (isset($vnp_BankCode) && $vnp_BankCode != "") {
    $inputData['vnp_BankCode'] = $vnp_BankCode;
}

ksort($inputData);
$query = "";
$i = 0;
$hashdata = "";
foreach ($inputData as $key => $value) {
    if ($i == 1) {
        $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
    } else {
        $hashdata .= urlencode($key) . "=" . urlencode($value);
        $i = 1;
    }
    $query .= urlencode($key) . "=" . urlencode($value) . '&';
}

$vnp_Url = $vnp_Url . "?" . $query;
if (isset($vnp_HashSecret)) {
    $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
    $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
}
header('Location: ' . $vnp_Url);
die();
?>

<html lang="en">
<input type="hidden" name="IDPhim" value="<?php echo $IDPhim; ?>">
<input type="hidden" name="PhongChieu" value="<?php echo $PhongChieu; ?>">
<input type="hidden" name="GiaVe" value="<?php echo $GiaVe; ?>">
<input type="hidden" name="GioChieu" value="<?php echo $GioChieu; ?>">
<input type="hidden" name="NgayChieu" value="<?php echo $NgayChieu; ?>">
<input type="hidden" name="SoGhe" value="<?php echo $SoGhe; ?>">
<input type="hidden" name="ThoiGianBook" value="<?php echo $inputData['vnp_CreateDate']; ?>">
</html>