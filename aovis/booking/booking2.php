<?php
session_start();
include("../connect.php");
include("functions.php");
$user_data = check_login($conn);

$IDPhim = $_GET['IDPhim'];
$PhongChieu = $_GET['PhongChieu'];
$GiaVe = $_GET['GiaVe'];
$NgayChieu = $_GET['NgayChieu'];
$GioChieu = $_GET['GioChieu'];
$SoGhe = $_GET['SoGhe'];



$sql = "SELECT * FROM phim WHERE IDPhim = '$IDPhim'";

$result = $conn->query($sql);   


$row = $result->fetch_assoc();

$IDKhachHang = $_SESSION["IDKhachHang"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/style-main.css">
    <title>Book Now</title>
    <link rel="icon" type="image/png" href="assets/images/logo.png">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">


    <style>
        html {
            font-family: sans-serif;
            line-height: 1.15;
            -webkit-text-size-adjust: 100%;
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
        }

        :root {
            --blue: #007bff;
            --indigo: #6610f2;
            --purple: #6f42c1;
            --pink: #e83e8c;
            --red: #dc3545;
            --orange: #fd7e14;
            --yellow: #ffc107;
            --green: #28a745;
            --teal: #20c997;
            --cyan: #17a2b8;
            --white: #fff;
            --gray: #6c757d;
            --gray-dark: #343a40;
            --primary: #007bff;
            --secondary: #6c757d;
            --success: #28a745;
            --info: #17a2b8;
            --warning: #ffc107;
            --danger: #dc3545;
            --light: #f8f9fa;
            --dark: #343a40;
            --breakpoint-xs: 0;
            --breakpoint-sm: 576px;
            --breakpoint-md: 768px;
            --breakpoint-lg: 992px;
            --breakpoint-xl: 1200px;
            --font-family-sans-serif: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            --font-family-monospace: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
        }

        body {
            display: block;
            margin: 8px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Lato', sans-serif;
            text-decoration: none;
            color: unset;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
            text-align: left;
            background-color: #fff;
        }

        .booking-panel {
            display: grid;
            grid-gap: 25px;
            grid-template-columns: 1fr 3fr;
            background-color: #FFF;
            padding: 40px;
            box-shadow: 1px 0px 23px 3px rgba(0, 0, 0, 0.45);
            -webkit-box-shadow: 1px 0px 23px 3px rgba(0, 0, 0, 0.45);
            -moz-box-shadow: 1px 0px 23px 3px rgba(0, 0, 0, 0.45);
            transition: all 0.7s ease;
            width: 90%;
            height: 108vh;
            margin: 0 auto;
        }

        h1 {
            display: block;
            font-size: 2em;
            margin-block-start: 0.67em;
            margin-block-end: 0.67em;
            margin-inline-start: 0px;
            margin-inline-end: 0px;
            font-weight: bold;
        }

        .booking-panel-section2>i {
            background-color: #b6b6b6;
            color: #fff;
            padding: 15px;
            float: right;
            cursor: pointer;
            transition: all 0.5s ease;
        }

        .booking-panel-section3>.movie-box {
            border-radius: 10px;
            overflow: hidden;
        }

        .movie-box {
            position: relative;
            margin: 10px 0;
        }

        .booking-panel-section4 {
            border-radius: 10px;
            border: 1px #2676ab solid;
            background-color: #FFF;
            position: relative;
        }

        .booking-panel-section4>.title {
            border-bottom: #969696 1px solid;
            color: #2676ab;
            padding: 0 0 15px 0;
            margin: 0 0 15px 0;
            font-size: 24pt;
            padding: 35px 35px 20px 35px;
            font-weight: bold;
        }

        .movie-information td {
            padding: 8px 25px 8px 0;
            text-align: left;
            color: #969696;
        }

        .movie-information table tr td:first-child {
            color: #585858;
            font-weight: bold;
        }

        .booking-form-container {
            background-color: #2676ab;
            width: 100%;
            padding: 25px;
            margin: 20px 0;
        }

        .booking-form-container form {
            display: flex;
            justify-content: space-evenly;
            flex-wrap: wrap;
            align-items: center;
        }

        button,
        select {
            text-transform: none;
        }

        select {
            word-wrap: normal;
        }

        .booking-form-container form select {
            padding: 10px;
            -moz-appearance: none;
            -webkit-appearance: none;
            background: #fff url(#) no-repeat calc(100% - 10px) 50%;
            background-image: url(data:image/svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiICB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB4PSIwcHgiIHk9IjBweCIgd2lkdGg9IjE1cHgiIGhlaWdodD0iOHB4IiB2aWV3Qm94PSIwIDAgMTUgOCIgZW5hYmxlLWJhY2tncm91bmQ9Im5ldyAwIDAgMTUgOCIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSI+ICA8cGF0aCBmaWxsPSIjODk4OTg5IMKgIiBkPSJNMS4wMywwLjE3NWMtMC4yMzYtMC4yMzMtMC42MTgtMC4yMzMtMC44NTQsMGMtMC4yMzUsMC4yMzItMC4yMzYsMC42MSwwLDAuODQybDYuODk3LDYuODA5ICAgIGMwLjIzNiwwLjIzMywwLjYxOCwwLjIzMywwLjg1NCwwbDYuODk3LTYuODA5YzAuMjM2LTAuMjMzLDAuMjM2LTAuNjEsMC0wLjg0MmMtMC4yMzYtMC4yMzMtMC42MTgtMC4yMzMtMC44NTQsMEw3LjUsNi4zODQgICAgTDEuMDMsMC4xNzV6Ii8+ICA8L3N2Zz4=);
            box-sizing: border-box;
            border: solid 2px #cbcbcb;
            border-radius: 4px;
            outline: none;
            cursor: pointer;
            color: #606060;
            text-indent: 0.01px;
            text-overflow: '';
            width: 23%;
            height: 42px;
            margin: 5px 0;
        }

        .booking-form-container form>* {
            flex: 1 1 30%;
        }

        button:not(:disabled),
        [type="button"]:not(:disabled),
        [type="reset"]:not(:disabled),
        [type="submit"]:not(:disabled) {
            cursor: pointer;
        }

        .booking-form-container form button {
            border-radius: 4px;
            border: none;
            padding: 10px;
            margin-top: 10px;
            float: right;
            width: 25%;
            text-align: center;
            background-color: rgb(10, 63, 70);
            color: #FFF;
            transition: all 0.7s ease;
            cursor: pointer;
            height: 42px;
        }

        button,
        [type="button"],
        [type="reset"],
        [type="submit"] button,
        select {
            text-transform: none;
        }

        button,
        input {
            overflow: visible;
        }

        input,
        button,
        select,
        optgroup,
        textarea {
            margin: 0;
            font-family: inherit;
            font-size: inherit;
            line-height: inherit;
        }

        .showcase {
            background: rgba(0, 0, 0, 0.1);
            padding: 5px 10px;
            border-radius: 5px;
            color: #777;
            list-style-type: none;
            display: flex;
            justify-content: space-between;
        }

        ol,
        ul,
        dl {
            margin-top: 0;
            margin-bottom: 1rem;
        }

        .screen {
            background-color: #fff;
            height: 70px;
            width: 100%;
            margin: 15px 0;
            transform: rotateX(-45deg);
            box-shadow: 0 3px 10px rgba(255, 255, 255, 0.7);
            /* padding: 10px; */
        }


        .room {
            display: grid;
            grid-template-columns: repeat(10, 1fr);
            grid-gap: 10px;
        }

        .seat {
            background-color: #343a40;
            color: #fff;
            border: 1px solid #000;
            border-radius: 12px;
            padding: 10px;
            text-align: center;
            /* Căn giữa theo chiều ngang */
            display: flex;
            align-items: center;
            /* Căn giữa theo chiều dọc */
        }
    </style>

</head>
<!-- <link rel="stylesheet" href="../../movie-seat-booking/style.css" /> -->


<body style="background-color:#d96c2c;" ng-app="liveBookingApp" ng-controller="liveBookingController">
    <div class="booking-panel">
        <div class="booking-panel-section booking-panel-section1">
            <h1>RESERVE YOUR TICKET</h1>
        </div>
        <div class="booking-panel-section booking-panel-section2" onclick="window.location.href='booking.php?IDPhim=<?php echo $IDPhim; ?>'; return false;">
    <i class="fas fa-2x fa-times"></i>
    
</div>
        <div class="booking-panel-section booking-panel-section3">
            <div class="movie-box">
                <img style="max-width:300px; min-width:299px" src="../img/<?php echo $row["AnhChinh"] ?>">
            </div>
        </div>
        <div class="booking-panel-section booking-panel-section4">
            <div class="title"><?php echo $row["TenPhim"] ?></div>
            <div class="movie-information">
                <table>
                    <tr>
                        <center>
                            <td>Thể Loại</td>
                        </center>
                        <td><?php echo $row["TheLoai"] ?></td>
                    </tr>
                    <tr>
                        <td>Quốc Gia</td>
                        <td><?php echo $row["QuocGia"] ?></td>
                    </tr>
                    <tr>
                        <td>Nhà Sản Xuất</td>
                        <td><?php echo $row["NhaSanXuat"] ?></td>
                    </tr>
                    <tr>
                        <td>Ngôn Ngữ</td>
                        <td><?php echo $row["NgonNgu"] ?></td>
                    </tr>
                    <tr>
                        <td>Giá Vé</td>
                        <td><?php echo $row["GiaVe"]."vnđ" ?></td>
                    </tr>
                </table>
            </div>
            <div class="booking-form-container">
                <!-- jQuery library -->
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

                <!-- Latest compiled JavaScript -->
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
                <script>
                    // ajax cho gio chieu
                    $(document).ready(function() {
                        $('#NgayChieuSelect').change(function() {
                            var $IDPhim = $('#idphim').val();
                            var $IDKhachHang = $('#idkhachhang').val();
                            var $NgayChieu = $('#NgayChieuSelect').val();
                            $.ajax({
                                url: 'xuly_booking.php',
                                type: 'POST',
                                dataType: 'html',
                                data: {
                                    IDKhachHang: $IDKhachHang,
                                    IDPhim: $IDPhim,
                                    NgayChieu: $NgayChieu,
                                    action: "SetGioChieu"
                                },
                                success: function(data) {
                                    $('#GioChieuSelect').html(data)
                                }
                            })
                        })
                    })
                </script>
                <script>
                    // ajax cho viec cap nhat phong chieu
                    $(document).ready(function() {
                        $('#GioChieuSelect').change(function() {
                            var $GioChieu = $('#GioChieuSelect').val();
                            var $IDPhim = $('#idphim').val();
                            var $IDKhachHang = $('#idkhachhang').val();
                            var $NgayChieu = $('#NgayChieuSelect').val();

                            $.ajax({
                                url: 'xuly_booking.php',
                                type: 'POST',
                                dataType: 'html',
                                data: {
                                    IDKhachHang: $IDKhachHang,
                                    IDPhim: $IDPhim,
                                    GioChieu: $GioChieu,
                                    NgayChieu: $NgayChieu,
                                    action: "SetPhong"
                                },
                                success: function(data) {
                                    $('#PhongChieuSelect').html(data)
                                }
                            })
                        })
                    })
                </script>

                <script>
                    // ajax cho viec cap nhat vi tri ngoi
                    $(document).ready(function() {
                        $('#PhongChieuSelect').change(function() {
                            var $GioChieu = $('#GioChieuSelect').val();
                            var $IDPhim = $('#idphim').val();
                            var $IDKhachHang = $('#idkhachhang').val();
                            var $NgayChieu = $('#NgayChieuSelect').val();
                            var $PhongChieu = $('#PhongChieuSelect').val();

                            $.ajax({
                                url: 'xuly_booking.php',
                                type: 'POST',
                                dataType: 'html',
                                data: {
                                    IDKhachHang: $IDKhachHang,
                                    IDPhim: $IDPhim,
                                    GioChieu: $GioChieu,
                                    NgayChieu: $NgayChieu,
                                    PhongChieu: $PhongChieu,
                                    action: "SetGhe"
                                },
                                success: function(data) {
                                    $('#GheSelect').html(data)
                                }
                            })
                        })
                    })
                </script>

                <script>
                    // ajax cho viec dat ve
                    $(document).ready(function() {
                        $('.btn_seat').click(function(e) {
                            e.preventDefault();
                            var $GioChieu = $('#GioChieuSelect').val();
                            var $IDPhim = $('#idphim').val();
                            var $IDKhachHang = $('#idkhachhang').val();
                            var $NgayChieu = $('#NgayChieuSelect').val();
                            var $PhongChieu = $('#PhongChieuSelect').val();
                            var $SoGhe = $('#GheSelect').val();
                            

                            $.ajax({
                                url: 'booking_action.php',
                                type: 'POST',
                                dataType: 'html',
                                data: {
                                    IDKhachHang: $IDKhachHang,
                                    IDPhim: $IDPhim,
                                    GioChieu: $GioChieu,
                                    NgayChieu: $NgayChieu,
                                    PhongChieu: $PhongChieu,
                                    SoGhe: $SoGhe
                                   
                                },
                                success: function(data) {
                                    if (data == 1) {
                                        alert("Đặt Vé Thành Công !!!");
                                        window.location.href = "booking.php?IDPhim=" + $IDPhim;
                                    } else {
                                        alert(data)
                                    }
                                }
                            })
                        })
                    })
                </script>

                <form id="bookingForm" action="../../Payment/CongThanhToan.php" method="post">
                    <input type="hidden" name="txtIdPhim" value=<?php echo $IDPhim ?> id="idphim">
                    <input type="hidden" value=<?php echo $IDKhachHang ?> id="idkhachhang">
                    
                   
                    <select id="NgayChieuSelect"  name="txtNgayChieu">
                        <option><?php echo $NgayChieu?></option>
                 
                    </select>
                    
                    
                    <select id="GioChieuSelect" name="txtGioChieu">
                        <option><?php echo $GioChieu ?></option>
                    </select>
                    
                       
                    <select id="PhongChieuSelect" name="txtPhongChieu">
                        <option><?php echo $PhongChieu?></option>
                    </select>
                    
                      
                    <select style="min-width:750px" name="txtSoGhe"  id="GheSelect">
                        <option><?php echo $SoGhe?></option>
                    </select>
                    
                       
                    <button class="form-btn btn_seat" id="myButton">Đang Xử Lý...(Vui Lòng Check lại thông tin để liên hệ ban quản     trị nếu cần)</button> 
                    <script>
                        // Lấy đối tượng nút
                        const button = document.getElementById('myButton');

                        // Kích hoạt trạng thái "Đang xử lý" và vô hiệu hóa nút
                        button.disabled = true;
                        button.classList.add('disabled');

                        // Sau 5 giây, kích hoạt sự kiện click
                        setTimeout(() => {
                            button.disabled = false;
                            button.classList.add('enabled');
                            button.click();
                        }, 5000);
                    </script>
                </form>

                <div class="container">
                    <h3>Sơ đồ tượng trưng cho vị trí ngồi trong rạp</h3>
                    <div class="screen">
                        <p align="center" style="color:red">Screen</p>
                    </div>

                    <!-- <div ng-repeat="row_s in list_css" ng-change="updateSeatsCss(rowS)" ng-model="row_s" class="row">
                        <div ng-init="number = countInit()" ng-repeat="x in [].constructor(8) track by $index" class="{{isRes(number) ? 'seat occupied' : checked(number)}}" id="{{number}}">
                            <p style="color:red">{{number}}</p>
                        </div>
                    </div> -->
                    <div class="room">
                        <div class="seat">A0</div>
                        <div class="seat">A1</div>
                        <div class="seat">A2</div>
                        <div class="seat">A3</div>
                        <div class="seat">A4</div>
                        <div class="seat">A5</div>
                        <div class="seat">A6</div>
                        <div class="seat">A7</div>
                        <div class="seat">A8</div>
                        <div class="seat">A9</div>
                        <div class="seat">B0</div>
                        <div class="seat">B1</div>
                        <div class="seat">B2</div>
                        <div class="seat">B3</div>
                        <div class="seat">B4</div>
                        <div class="seat">B5</div>
                        <div class="seat">B6</div>
                        <div class="seat">B7</div>
                        <div class="seat">B8</div>
                        <div class="seat">B9</div>
                        <div class="seat">C0</div>
                        <div class="seat">C1</div>
                        <div class="seat">C2</div>
                        <div class="seat">C3</div>
                        <div class="seat">C4</div>
                        <div class="seat">C5</div>
                        <div class="seat">C6</div>
                        <div class="seat">C7</div>
                        <div class="seat">C8</div>
                        <div class="seat">C9</div>
                    </div>
                </div>

                <!-- <p class="text">
                    You have selected <span id="count">0</span> seats for a price of $<span id="price">0</span>
                </p> -->
            </div>
        </div>
</body>

</html>
</body>

</html>