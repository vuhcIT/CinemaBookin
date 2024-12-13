<?php
session_start();
include("connect.php");
include("functionsadmin.php");
$user_data = check_login($conn);
error_reporting(1);

// Execute the update query  
$sql1 = "UPDATE booking b
INNER JOIN buoichieu ON b.buoichieuID = buoichieu.IDBuoiChieu
SET b.TrangThaiVe = 1
WHERE buoichieu.BuoiChieu < DATE_SUB(NOW(), INTERVAL 3 HOUR);";
$result1 = mysqli_query($conn, $sql1);

$sql = "SELECT DISTINCT DATE(buoichieu.BuoiChieu) AS NgayChieu ,phim.TenPhim, phim.AnhChinh, phim.GiaVe , 
CONCAT(
  LPAD(HOUR(buoichieu.BuoiChieu), 2, '0'), ':',
  LPAD(MINUTE(buoichieu.BuoiChieu), 2, '0'), ':',
  LPAD(SECOND(buoichieu.BuoiChieu), 2, '0')
) AS ThoiGian, booking.phongchieuID, booking.SoGhe, booking.ThoiGianBook, bookingID, Khachhang.TenKH,
CASE WHEN TrangThaiVe = 0 THEN 'Chưa phát vé'
                    ELSE 'Đã phát vé'
               END AS TinhTrangVe
FROM phim 
join booking on phim.IDPhim = booking.movieID
join buoichieu on booking.buoichieuID = buoichieu.IDBuoiChieu
JOIN Khachhang ON booking.userID = Khachhang.IDKhachHang
where userID=$IDKhachHang";

$result = $conn->query("SELECT COUNT(*) AS total_rows FROM (SELECT DISTINCT DATE(buoichieu.BuoiChieu) AS NgayChieu, phim.TenPhim, phim.AnhChinh, phim.GiaVe,
CONCAT(
    LPAD(HOUR(buoichieu.BuoiChieu), 2, '0'), ':',
    LPAD(MINUTE(buoichieu.BuoiChieu), 2, '0'), ':',
    LPAD(SECOND(buoichieu.BuoiChieu), 2, '0')
) AS ThoiGian, booking.phongchieuID, booking.SoGhe,booking.ThoiGianBook, bookingID, Khachhang.TenKH,
CASE WHEN TrangThaiVe = 0 THEN 'Chưa phát vé'
                    ELSE 'Đã phát vé'
               END AS TinhTrangVe
FROM phim
JOIN booking ON phim.IDPhim = booking.movieID
JOIN buoichieu ON booking.buoichieuID = buoichieu.IDBuoiChieu
JOIN Khachhang ON booking.userID = Khachhang.IDKhachHang
WHERE buoichieu.BuoiChieu > NOW()) AS subquery");
$row = $result->fetch_assoc();
$total_rows = $row['total_rows'];

// Set records per page
$records_per_page = 4;

// Calculate total pages
$total_pages = ceil($total_rows / $records_per_page);

// Get current page
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;

// Calculate offset
$offset = ($current_page - 1) * $records_per_page;

// Execute the modified SQL query
$sql = "SELECT DISTINCT DATE(buoichieu.BuoiChieu) AS NgayChieu, phim.TenPhim, phim.AnhChinh, phim.GiaVe, 
CONCAT(
    LPAD(HOUR(buoichieu.BuoiChieu), 2, '0'), ':',
    LPAD(MINUTE(buoichieu.BuoiChieu), 2, '0'), ':',
    LPAD(SECOND(buoichieu.BuoiChieu), 2, '0')
) AS ThoiGian, booking.phongchieuID, booking.SoGhe,booking.ThoiGianBook, bookingID, Khachhang.TenKH,
CASE WHEN TrangThaiVe = 0 THEN 'Chưa phát vé'
                    ELSE 'Đã phát vé'
               END AS TinhTrangVe
FROM phim
JOIN booking ON phim.IDPhim = booking.movieID
JOIN buoichieu ON booking.buoichieuID = buoichieu.IDBuoiChieu
JOIN Khachhang ON booking.userID = Khachhang.IDKhachHang
WHERE buoichieu.BuoiChieu > NOW()
LIMIT $offset, $records_per_page";
$result = $conn->query($sql);



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cinemax Admin</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"/>
</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon">
                            <i class="fa-solid fa-user-tie"></i>
                        </span>
                        <span class="title">Xin Chào <?php echo $user_data['UserName']; ?></span>
                    </a>
                </li>

                <li>
                    <a href="../testdangnhapadmin/indexadmin.php">
                        <span class="icon">
                            <i class="fa-solid fa-house"></i>
                        </span>
                        <span class="title">Trang Chủ</span>
                    </a>
                </li>

                <li>
                    <a href="../admin/khachhang.php">
                        <span class="icon">
                            <i class="fa-solid fa-users"></i>
                        </span>
                        <span class="title">Khách Hàng</span>
                    </a>
                </li>

                <li>
                    <a href="../admin/admin_phim.php">
                        <span class="icon">
                            <i class="fa-solid fa-film"></i>
                        </span>
                        <span class="title">Thông Tin Phim</span>
                    </a>
                </li>

                <li>
                    <a href="../admin/lichtrinh.php">
                        <span class="icon">
                            <i class="fa-regular fa-calendar-days"></i>
                        </span>
                        <span class="title">Lịch trình Chiếu</span>
                    </a>
                </li>

                <li>
                    <a href="../admin/lichsudatve.php">
                        <span class="icon">
                            <i class="fa-solid fa-clock-rotate-left"></i>
                        </span>
                        <span class="title">Lịch Sử Đặt Vé</span>
                    </a>
                </li>

                <li>
                    <a href="../admin/comment.php">
                        <span class="icon">
                             <i class="fa-solid fa-comment-dots"></i>
                        </span>
                        <span class="title">Bình Luận/Đánh giá</span>
                    </a>
                </li>

                <li>
                    <a href="../testdangnhapadmin/doimatkhau.php">
                        <span class="icon">
                            <i class="fa-solid fa-lock"></i>
                        </span>
                        <span class="title">Đổi Mật Khẩu</span>
                    </a>
                </li>

                <li>
                    <a href="../testdangnhapadmin/registeradmin.php">
                        <span class="icon">
                            <i class="fa-solid fa-user-plus"></i>
                        </span>
                        <span class="title">Sign Up</span>
                    </a>
                </li>
                <li>
                    <a href="logoutadmin.php">
                        <span class="icon">
                            <i class="fa-solid fa-right-from-bracket"></i>
                        </span>
                        <span class="title">Log Out</span>
                    </a>
                </li>

            </ul>
        </div>

        <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

              

            </div>

            <!-- ======================= Cards ================== -->


            <!-- ================ Order Details List ================= -->
            <div class="details">
                <div class="recentOrders">
                

                    <div class="admin-section-panel admin-section-panel1">
                    <div class="admin-panel-section-header">
                        <h2>Mục: Lịch Sử Đặt Vé</h2>
                    </div>
                    <form role="search" method="get" class="search-form" action="lichsudatve.php">
														<input type="search" class="search-field" placeholder="Tìm kiếm..." value="" name="s" title="Search for:">
														
                                                     <button type="submit"> <i class="fa-solid fa-magnifying-glass"></i>Search</button>   
														
													</form>
                    <div class="admin-panel-section-content" >
                    <table border=1 width=100%>
                    <tr>
					<th>Tên phim</th>
                    <th>Ảnh</th>	
                    <th>Ngày Chiếu</th>
                    <th>Giờ Chiếu</th>
                    <th>Phòng Chiếu</th>
                    <th>Số Ghế</th>
                    <th>Người đặt</th>
                    <th>Giá Vé</th>
                    <th>Thanh toán</th>
                    <th>Trạng thái vé</th>
                    <th>Trả vé</th>
                    <th>Thời gian đặt vé</th>
                    <th>Hủy</th> 
                    
                    
				</tr>
                <tr>
                                <?php

                // Check if the search query is submitted
                if (isset($_GET['s']) && !empty($_GET['s'])) {
                    $keyword = $_GET['s'];

                    // Prepare and execute the SQL query
                    
                    $sql_search = "SELECT DISTINCT DATE(buoichieu.BuoiChieu) AS NgayChieu ,phim.TenPhim, phim.AnhChinh, phim.GiaVe , 
CONCAT(
  LPAD(HOUR(buoichieu.BuoiChieu), 2, '0'), ':',
  LPAD(MINUTE(buoichieu.BuoiChieu), 2, '0'), ':',
  LPAD(SECOND(buoichieu.BuoiChieu), 2, '0')
) AS ThoiGian, booking.phongchieuID, booking.SoGhe, booking.ThoiGianBook, bookingID, Khachhang.TenKH,
CASE WHEN TrangThaiVe = 0 THEN 'Chưa phát vé'
                    ELSE 'Đã phát vé'
               END AS TinhTrangVe
FROM phim   
join booking on phim.IDPhim = booking.movieID
join buoichieu on booking.buoichieuID = buoichieu.IDBuoiChieu
JOIN Khachhang ON booking.userID = Khachhang.IDKhachHang
where userID=".$IDKhachHang." and buoichieu.BuoiChieu>NOW() and phim.TenPhim LIKE '%$keyword%' or booking.SoGhe LIKE '%$keyword%'
or booking.phongchieuID LIKE '%$keyword%' or KhachHang.TenKH LIKE '%$keyword%' or phim.GiaVe LIKE '%$keyword%'
or phim.TenPhim LIKE '%$keyword%' ";

$result_search = $conn->query("SELECT COUNT(*) AS total_rows FROM (SELECT DISTINCT DATE(buoichieu.BuoiChieu) AS NgayChieu, phim.TenPhim, phim.AnhChinh, phim.GiaVe,
CONCAT(
    LPAD(HOUR(buoichieu.BuoiChieu), 2, '0'), ':',
    LPAD(MINUTE(buoichieu.BuoiChieu), 2, '0'), ':',
    LPAD(SECOND(buoichieu.BuoiChieu), 2, '0')
) AS ThoiGian, booking.phongchieuID, booking.SoGhe,booking.ThoiGianBook, bookingID, Khachhang.TenKH,
CASE WHEN TrangThaiVe = 0 THEN 'Chưa phát vé'
                    ELSE 'Đã phát vé'
               END AS TinhTrangVe
FROM phim
JOIN booking ON phim.IDPhim = booking.movieID
JOIN buoichieu ON booking.buoichieuID = buoichieu.IDBuoiChieu
JOIN Khachhang ON booking.userID = Khachhang.IDKhachHang
WHERE buoichieu.BuoiChieu > NOW() and phim.TenPhim LIKE '%$keyword%' or booking.SoGhe LIKE '%$keyword%'
or booking.phongchieuID LIKE '%$keyword%' or KhachHang.TenKH LIKE '%$keyword%' or phim.GiaVe LIKE '%$keyword%'
or phim.TenPhim LIKE '%$keyword%' ) AS subquery  ");
$row = $result_search->fetch_assoc();
$total_rows = $row['total_rows'];

// Set records per page
$records_per_page = 4;

// Calculate total pages
$total_pages = ceil($total_rows / $records_per_page);

// Get current page
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;

// Calculate offset
$offset = ($current_page - 1) * $records_per_page;

// Execute the modified SQL query
$sql_search = "SELECT DISTINCT DATE(buoichieu.BuoiChieu) AS NgayChieu, phim.TenPhim, phim.AnhChinh, phim.GiaVe, 
CONCAT(
    LPAD(HOUR(buoichieu.BuoiChieu), 2, '0'), ':',
    LPAD(MINUTE(buoichieu.BuoiChieu), 2, '0'), ':',
    LPAD(SECOND(buoichieu.BuoiChieu), 2, '0')
) AS ThoiGian, booking.phongchieuID, booking.SoGhe,booking.ThoiGianBook, bookingID, Khachhang.TenKH,
CASE WHEN TrangThaiVe = 0 THEN 'Chưa phát vé'
                    ELSE 'Đã phát vé'
               END AS TinhTrangVe
FROM phim
JOIN booking ON phim.IDPhim = booking.movieID
JOIN buoichieu ON booking.buoichieuID = buoichieu.IDBuoiChieu
JOIN Khachhang ON booking.userID = Khachhang.IDKhachHang
WHERE buoichieu.BuoiChieu > NOW() and phim.TenPhim LIKE '%$keyword%' or booking.SoGhe LIKE '%$keyword%'
or booking.phongchieuID LIKE '%$keyword%' or KhachHang.TenKH LIKE '%$keyword%' or phim.GiaVe LIKE '%$keyword%'
or phim.TenPhim LIKE '%$keyword%'
LIMIT $offset, $records_per_page";
$result_search = $conn->query($sql_search);        
                
                ?>
                <?php 
                $result_search = $conn->query($sql_search);
					if ($result_search->num_rows == 0){
						echo "<tr><td colspan = 7>Không có vé</td></tr>";
					} else {
						while ($row=$result_search->fetch_assoc()){
				?>
					<tr>
						<td><?php echo $row["TenPhim"];?></td>
						<td><img src="../aovis/img/<?php echo $row["AnhChinh"];?>" width=60px></td>
						<td><?php echo $row["NgayChieu"];?></td>
						<td><?php echo $row["ThoiGian"];?></td>
						<td><?php echo $row["phongchieuID"];?></td>
                        <td><?php echo $row["SoGhe"];?></td>
                        <td><?php echo $row["TenKH"];?></td>
                        <td><?php echo $row["GiaVe"]."vnđ";?></td>
                        <td><span style="color: green;">Đã Thanh Toán</span></td>
                        <td>
                        <span style="color: <?php echo ($row['TinhTrangVe'] == 'Đã phát vé' ? 'green' : 'red'); ?>"><?php echo $row['TinhTrangVe']; ?></span>
                        </td>
                        <td><a href ="trave.php?IDBooking=<?php echo $row["bookingID"]?>">Trả vé</a></td>
                        <td><?php echo $row["ThoiGianBook"];?></td>
                        <td><a href ="deletelichsudatve.php?IDBooking=<?php echo $row["bookingID"]?>">Hủy</a></td>
                        
                        
						
					</tr>
                    <?php 				
						}
					}}
                 else {
                $result = $conn->query($sql);
					if ($result->num_rows == 0){
						echo "<tr><td colspan = 7>Không có vé</td></tr>";
					} else {
						while ($row=$result->fetch_assoc()){
				?>
					<tr>
						<td><?php echo $row["TenPhim"];?></td>
						<td><img src="../aovis/img/<?php echo $row["AnhChinh"];?>" width=60px></td>
						<td><?php echo $row["NgayChieu"];?></td>
						<td><?php echo $row["ThoiGian"];?></td>
						<td><?php echo $row["phongchieuID"];?></td>
                        <td><?php echo $row["SoGhe"];?></td>
                        <td><?php echo $row["TenKH"];?></td>
                        <td><?php echo $row["GiaVe"]."vnđ";?></td>
                        <td><span style="color: green;">Đã Thanh Toán</span></td>
                        <td>
                        <span style="color: <?php echo ($row['TinhTrangVe'] == 'Đã phát vé' ? 'green' : 'red'); ?>"><?php echo $row['TinhTrangVe']; ?></span>
                        </td>
                        <td><a href ="trave.php?IDBooking=<?php echo $row["bookingID"]?>">Trả vé</a></td>
                        <td><?php echo $row["ThoiGianBook"];?></td>
                        <td><a href ="deletelichsudatve.php?IDBooking=<?php echo $row["bookingID"]?>">Hủy</a></td>
                        
                        
						
					</tr>
                    <?php 				
						}
					}
                }
				?>
			</table>
            <center>
				<?php 
					for($i=1;$i<=$total_pages;$i++){
						if ($i == $page){
							echo " ".$i." ";
						} else {
							echo " <a href=lichsudatve.php?page=".$i.">".$i."</a> ";
						}
						
					}
				?>
			</center>
                    
                    </div>
                </div>
             
        </div>
    </div>

    <!-- =========== Scripts =========  -->
    <script src="assets/js/main.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>