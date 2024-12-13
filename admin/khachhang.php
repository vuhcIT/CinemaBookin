<?php
session_start();
include("connect.php");
$sql = "SELECT * FROM khachhang";
include("functionsadmin.php");

	$user_data = check_login($conn);
    $result = $conn->query($sql);
error_reporting(0);
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
                    <a href="../testdangnhapadmin/logoutadmin.php">
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
                        <h2>Mục: Khách Hàng</h2>
                    </div>
                    <div class="admin-panel-section-content" >
                    <form role="search" method="get" class="search-form" action="khachhang.php">
														<input type="search" class="search-field" placeholder="Tìm kiếm..." value="" name="s" title="Search for:">
														
                                                     <button type="submit"> <i class="fa-solid fa-magnifying-glass"></i>Search</button>   
														
													</form>
                    <table border=1 width=100%>
				<tr>
					<th>Tên Đăng Nhập</th>
                    <th>Mật Khẩu</th>	
                    <th>Số Điện thoại</th>
                    <th>CMND</th>
                    <th>Email</th>
                    <th>Tên Khách Hàng</th>
                
                    
				</tr>
                <tr>
<?php
// Check if the search query is submitted
if (isset($_GET['s']) && !empty($_GET['s'])) {
    $keyword = $_GET['s'];
//sql prepare
$sql_search = "SELECT * FROM khachhang where UserName LIKE '%$keyword%' or PassWord LIKE '%$keyword%' or SĐT LIKE '%$keyword%' or CMND LIKE '%$keyword%' 
or email LIKE '%$keyword%' or TenKH LIKE '%$keyword%' ";

$result_search = $conn->query($sql_search);
if ($result_search->num_rows == 0){
    echo "<tr><td colspan = 7>Không tồn tại</td></tr>";
} else {
    while ($row=$result_search->fetch_assoc()){
?>
<tr>
    <td><?php echo $row["UserName"];?></td>
    <td><?php echo $row["PassWord"];?></td>
    <td><?php echo $row["SĐT"];?></td>
    <td><?php echo $row["CMND"];?></td>
    <td><?php echo $row["email"];?></td>
    <td><?php echo $row["TenKH"];?></td>
    <td><a href ="deletekhachhang.php?IDKhachHang=<?php echo $row["IDKhachHang"]?>">Xóa</a></td>
</tr>
<?php
}}}
else {
?>
                
                <?php 
                $result = $conn->query($sql);
					if ($result->num_rows == 0){
						echo "<tr><td colspan = 7>Không tồn tại</td></tr>";
					} else {
						while ($row=$result->fetch_assoc()){
				?>
					<tr>
						<td><?php echo $row["UserName"];?></td>
						<td><?php echo $row["PassWord"];?></td>
						<td><?php echo $row["SĐT"];?></td>
						<td><?php echo $row["CMND"];?></td>
						<td><?php echo $row["email"];?></td>
                        <td><?php echo $row["TenKH"];?></td>
						<td><a href ="deletekhachhang.php?IDKhachHang=<?php echo $row["IDKhachHang"]?>">Xóa</a></td>
					</tr>
				<?php 				
						}
					}}
				?>
                </tr>
			</table>
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