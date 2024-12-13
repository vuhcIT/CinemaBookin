<?php
require_once("../aovis/connect.php");
session_start();
$TenPhim = $_POST["txtTenPhim"];
$PhongChieu = $_POST["txtPhongChieu"];
$dateString = $_POST["txtbuoichieu"];

$dateTime = new DateTime($dateString);

$BuoiChieu = $dateTime->format('Y-m-d H:i:s');
$sql_lich = "SELECT * from buoichieu where BuoiChieu='" . $BuoiChieu . "' AND IDPhongChieu='".$PhongChieu."'";
$result_lich = $conn->query("$sql_lich");
if ($result_lich->num_rows > 0) {
    $_SESSION["add_buoichieu"] = "Buổi chiếu đã tồn tại";
    header("Location:add_buoichieu.php");
} else {
    $_SESSION["add_buoichieu"] = "";
    //$lastbuoichieuID = $conn->insert_id;

    $sql_insert_buoichieu = "INSERT INTO buoichieu (IDPhim, IDPhongChieu, BuoiChieu) VALUES ('$TenPhim', '$PhongChieu', '$BuoiChieu')";

    $conn->query($sql_insert_buoichieu) or die($conn->error);
    if ($conn->error == "") {
        $_SESSION["buoichieu"] = "Insert successful!";
        header("Location: lichtrinh.php");
    }
}
