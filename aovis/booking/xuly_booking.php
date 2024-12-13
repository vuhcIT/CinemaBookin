<?php
include("../connect.php");
$action = $_POST["action"];

switch ($action) {
    case "SetGioChieu":
        $IDKhachHang = $_POST["IDKhachHang"];
        $IDPhim = $_POST["IDPhim"];
        $NgayChieu = $_POST["NgayChieu"];
?>
        <select id="GioChieuSelect" name="txtGioChieu">
            <option>Time</option>
            <?php
            $sql_date = "SELECT DISTINCT
                CONCAT(
                  LPAD(HOUR(buoichieu.BuoiChieu), 2, '0'), ':',
                  LPAD(MINUTE(buoichieu.BuoiChieu), 2, '0'), ':',
                  LPAD(SECOND(buoichieu.BuoiChieu), 2, '0')
                ) AS ThoiGian, buoichieu.IDBuoiChieu
              FROM buoichieu
              WHERE buoichieu.IDPhim =" . $IDPhim . " and DATE(buoichieu.BuoiChieu) = '" . $NgayChieu . "'
              group by ThoiGian";
            $result_date = $conn->query($sql_date);
            while ($row = $result_date->fetch_assoc()) {
            ?>
                <option value="<?php echo $row["ThoiGian"] ?>"><?php echo $row["ThoiGian"] ?></option>
            <?php
            }
            ?>
        </select>
    <?php
        break;

    case "SetPhong":
        $IDKhachHang = $_POST["IDKhachHang"];
        $IDPhim = $_POST["IDPhim"];
        $NgayChieu = $_POST["NgayChieu"];
        $GioChieu = $_POST["GioChieu"];
        $BuoiChieu = $NgayChieu . " " . $GioChieu;
    ?>
        <select id="PhongChieuSelect" name="txtPhongChieu">
            <option>Room</option>
            <?php
            $sql_date = "select phongchieu.IDPhongChieu from phongchieu
                        join buoichieu on phongchieu.IDPhongChieu = buoichieu.IDPhongChieu
                        where buoichieu.IDPhim = " . $IDPhim . " and buoichieu.BuoiChieu = '" . $BuoiChieu . "'";
            $result_date = $conn->query($sql_date);
            while ($row = $result_date->fetch_assoc()) {
            ?>
                <option value="<?php echo $row["IDPhongChieu"] ?>"><?php echo $row["IDPhongChieu"] ?></option>
            <?php
            }
            ?>
        </select>
    <?php
        break;

    case "SetGhe":
        $IDKhachHang = $_POST["IDKhachHang"];
        $IDPhim = $_POST["IDPhim"];
        $NgayChieu = $_POST["NgayChieu"];
        $GioChieu = $_POST["GioChieu"];
        $BuoiChieu = $NgayChieu." ".$GioChieu;
        $PhongChieu = $_POST["PhongChieu"];

        $sql_idlich = "select * from buoichieu";
        $result_lich = $conn->query("$sql_idlich");
        while ($row = $result_lich->fetch_assoc()) {
            if ($BuoiChieu == $row["BuoiChieu"]) {
                $IDBuoiChieu = $row["IDBuoiChieu"];
            }
        }
    ?>
        <select style="min-width:750px" name="txtSoGhe">
            <?php
            $sql_seat = "SELECT ghe.SoGhe FROM ghe WHERE NOT EXISTS ( SELECT SoGhe FROM booking WHERE booking.phongchieuID = ".$PhongChieu." AND booking.buoichieuID = ".$IDBuoiChieu." AND booking.SoGhe = ghe.SoGhe ) GROUP by SoGhe;";
            $result_seat = $conn->query($sql_seat);
            while ($row = $result_seat->fetch_assoc()) {
            ?>
                <option value="<?php echo $row["SoGhe"] ?>"><?php echo $row["SoGhe"] ?></option>
            <?php
            }
            ?>
        </select>
<?php
    break;
}
?>