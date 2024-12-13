<?php
session_start();
// print_r($_POST);
include("../../testdangky/connect.php");
require_once("config.php"); 

$IDPhim = $_POST['txtIdPhim'];
$PhongChieu = $_POST['txtPhongChieu'];
$GiaVe = $_POST['txtGiaVe'];
$NgayChieu = $_POST['txtNgayChieu'];
$GioChieu = $_POST['txtGioChieu'];
$SoGhe = $_POST['txtSoGhe'];
$IDKhachHang = $_POST['txtIdKhachHang'];


$MaDon = 'Room:'. $PhongChieu . ', Day: ' . $NgayChieu . ', Time: ' . $GioChieu . ', Seat: ' . $SoGhe;
//$MaDon =  [$PhongChieu,  $NgayChieu , $GioChieu, $SoGhe]
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Thanh toán hóa đơn</title>
        <!-- Bootstrap core CSS -->
        <link href="../vnpay_php/assets/bootstrap.min.css" rel="stylesheet"/>
        <!-- Custom styles for this template -->
        <link href="../vnpay_php/assets/jumbotron-narrow.css" rel="stylesheet">  
        <script src="../vnpay_php/assets/jquery-1.11.3.min.js"></script>
    </head>

    <body>

        <div class="container">
        <h3><?php echo 'Thanh toán vé phim'?></h3>
            <div class="table-responsive">
                <form action="../../Payment/CongThanhToan.php" id="frmCreateOrder" method="post">  
                <div class="form-group">
            <label for="OrderDescription">Nội dung thanh toán</label>
            <input disabled class="form-control" cols="50" id="OrderDescription" rows="2" value='<?php echo $MaDon ?>'></input>
                
            <input type='hidden' class="form-control" cols="50" id="OrderDescription" name="madon" rows="2" value='<?php echo $MaDon ?>'> </input>
               
        </div>      
                    <div class="form-group">
                        <label for="amount">Số tiền</label>
                        <input disabled class="form-control" data-val="true" data-val-number="The field Amount must be a number." data-val-required="The Amount field is required." id="amount"  max="100000000" min="1" value="<?php echo $GiaVe,' VNĐ' ?>" />
                        <input type="hidden" class="form-control" data-val="true" data-val-number="The field Amount must be a number." data-val-required="The Amount field is required." id="amount"  max="100000000" min="1" name="amount" value="<?php echo $GiaVe ?>" />
                    </div>
                     <h4>Chọn phương thức thanh toán</h4>
                     <div class="form-group">
        <label for="bankcode">Ngân hàng</label>
        <select name="bankcode" id="bankcode" class="form-control">
            <option value="">Không chọn </option>    
			<option value="QRONLY">Thanh toan QRONLY</option>			
			<option value="MBAPP">Ung dung MobileBanking</option>			
            <option value="VNPAYQR">VNPAYQR</option>
            <option value="VNBANK">LOCAL BANK</option>
            <option value="IB">INTERNET BANKING</option>
            <option value="ATM">ATM CARD</option>
            <option value="INTCARD">INTERNATIONAL CARD</option>
            <option value="VISA">VISA</option>
            <option value="MASTERCARD"> MASTERCARD</option>
            <option value="JCB">JCB</option>
            <option value="UPI">UPI</option>
            <option value="VIB">VIB</option>
             <option value="VIETCAPITALBANK">VIETCAPITALBANK</option>
            <option value="SCB">Ngan hang SCB</option>
            <option value="NCB">Ngan hang NCB</option>
            <option value="SACOMBANK">Ngan hang SacomBank  </option>
            <option value="EXIMBANK">Ngan hang EximBank </option>
            <option value="MSBANK">Ngan hang MSBANK </option>
            <option value="NAMABANK">Ngan hang NamABank </option>
            <option value="VNMART"> Vi dien tu VnMart</option>
            <option value="VIETINBANK">Ngan hang Vietinbank  </option>
            <option value="VIETCOMBANK">Ngan hang VCB </option>
            <option value="HDBANK">Ngan hang HDBank</option>
            <option value="DONGABANK">Ngan hang Dong A</option>
            <option value="TPBANK">Ngân hàng TPBank </option>
            <option value="OJB">Ngân hàng OceanBank</option>
            <option value="BIDV">Ngân hàng BIDV </option>
            <option value="TECHCOMBANK">Ngân hàng Techcombank </option>
            <option value="VPBANK">Ngan hang VPBank </option>
            <option value="AGRIBANK">Ngan hang Agribank </option>
            <option value="MBBANK">Ngan hang MBBank </option>
            <option value="ACB">Ngan hang ACB </option>
            <option value="OCB">Ngan hang OCB </option>
            <option value="IVB">Ngan hang IVB </option>
            <option value="SHB">Ngan hang SHB </option>
			<option value="APPLEPAY">Apple Pay </option>
			<option value="GOOGLEPAY">Google Pay </option>
        </select>
    </div>
                    <div class="form-group">
                        <h5>Chọn ngôn ngữ giao diện thanh toán:</h5>
                         <input type="radio" id="language" Checked="True" name="language" value="vn">
                         <label for="language">Tiếng việt</label><br>
                         <input type="radio" id="language" name="language" value="en">
                         <label for="language">Tiếng anh</label><br>
                         
                    </div>
                    <input type="hidden" name="IDPhim" value="<?php echo $IDPhim; ?>">
<input type="hidden" name="PhongChieu" value="<?php echo $PhongChieu; ?>">
<input type="hidden" name="GiaVe" value="<?php echo $GiaVe; ?>">
<input type="hidden" name="GioChieu" value="<?php echo $GioChieu; ?>">
<input type="hidden" name="NgayChieu" value="<?php echo $NgayChieu; ?>">
<input type="hidden" name="SoGhe" value="<?php echo $SoGhe; ?>">
<input type="hidden" name="IDKhachHang" value="<?php echo $IDKhachHang; ?>">
                    <button type="submit" class="btn btn-default" href>Thanh toán</button>
                </form>
            </div>
            <p>
                &nbsp;
            </p>
            <footer class="footer">
                <p> <img style="width: 50px; height: auto; vertical-align: middle; " src="../vnpay_php/image/vnpay-logo.png" alt="VNPAY Logo" class="logo">&copy;VNPAY 2020</p>
            </footer>
        </div>  
        
    </body>
</html>
