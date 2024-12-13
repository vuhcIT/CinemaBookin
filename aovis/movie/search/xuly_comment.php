<?php
require_once("Connect.php");
$IDKhachHang = $_POST["IDKhachHang"];
$IDPhim = $_POST["IDPhim"];
$comment = $_POST["comment"];
$ThoiGian = date('Y-m-d H:i:s');
$sql = "INSERT INTO `feedback`(`ThoiGianFB`,`IDKhachHang`, `IDPhim`, `comment`) VALUES ('$ThoiGian','$IDKhachHang', '$IDPhim', '$comment')";
$conn->query($sql);


$sql1 = "select feedback.*, khachhang.TenKH from feedback join khachhang on feedback.IDKhachHang = khachhang.IDKhachHang where IDPhim = $IDPhim";
$result = $conn->query("$sql1");
while ($row = $result->fetch_assoc()) {
?>
    <ul style="color : white" class="container__feedback__list">
        <li class="container__feedback__items"><?php echo $row["TenKH"] ?>: </li>
        <li class="container__feedback__items"><span style="color:#e1641a">Comment: </span> <?php echo $row["comment"] ?></li>
        <li class="container__feedback__items" style="font-size:12px"><?php echo $row["ThoiGianFB"] ?></li>
    </ul>
<?php
}
?>