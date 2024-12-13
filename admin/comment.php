<?php
session_start();
include("connect.php");
include("functionsadmin.php");
$user_data = check_login($conn);

if (!isset($_REQUEST["page"])){
    $page=1;
} else { 
    $page = $_REQUEST["page"];
}
$num_row=3;
$sql2 = "SELECT IDFeedBack, feedback.ThoiGianFB, khachhang.TenKH, phim.TenPhim, feedback.comment, phim.AnhChinh, feedback.IDKhachHang
        FROM feedback
        INNER JOIN Khachhang ON feedback.IDKhachHang = khachhang.IDKhachHang
        INNER JOIN Phim ON feedback.IDPhim = phim.IDPhim
        ORDER BY feedback.ThoiGianFB DESC";

$result2 = $conn->query($sql2);

$sql1 = "select * from feedback";
$result1 = $conn->query($sql1) or die($conn->error);
$num_of_page = ceil($result1->num_rows / $num_row);
if ($page<1) {
    $page = 1;
} 
if ($page>$num_of_page){
    $page = $num_of_page;
}
$sql = "select * from feedback limit " . $num_row*($page-1).",".$num_row;
//echo $num_of_page;
$result = $conn->query($sql) or die($conn->error);	

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
    <style>
        .btn-add-film {
    color: white;
    background-color: #2a2185;
    text-decoration: none;
    padding: 7px 10px;
    border-radius: 5px;
}

.btn-add-film:hover {
    background-color: #3e8e41; /* Màu xanh lá cây đậm hơn khi hover */
}
    </style>
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
                        <h2 >Mục: Bình Luận/Đánh Giá</h2>
                        
                    </div>
                    <div class="admin-panel-section-content" >
                    <table border=1 width=100%>
                    <form role="search" method="get" class="search-form" action="comment.php">
														<input type="search" class="search-field" placeholder="Tìm kiếm..." value="" name="s" title="Search for:">
														
                                                     <button type="submit"> <i class="fa-solid fa-magnifying-glass"></i>Search</button>   
														
													</form>
                <tr>
					<th>Thời Gian</th>
                    <th>Tên Khách Hàng</th>	
                    <th>Phim</th>
                    <th>Ảnh</th>
                    <th>Nội Dung Bình Luận</th>
                    
				</tr>
                <tr>
                <?php
// Check if the search query is submitted
if (isset($_GET['s']) && !empty($_GET['s'])) {
    $keyword = $_GET['s'];
//sql prepare
if (!isset($_REQUEST["page"])){
    $page=1;
} else { 
    $page = $_REQUEST["page"];
}
$num_row=3;
$sql2_search = "SELECT IDFeedBack, feedback.ThoiGianFB, khachhang.TenKH, phim.TenPhim, feedback.comment, phim.AnhChinh, feedback.IDKhachHang
        FROM feedback
        INNER JOIN Khachhang ON feedback.IDKhachHang = khachhang.IDKhachHang
        INNER JOIN Phim ON feedback.IDPhim = phim.IDPhim
        WHERE feedback.ThoiGianFB LIKE '%$keyword%' or khachhang.TenKH LIKE '%$keyword%' or phim.TenPhim LIKE '%$keyword%'
        ORDER BY feedback.ThoiGianFB DESC";

$result2_search = $conn->query($sql2_search);

$sql1_search = "SELECT * from feedback";
$result1_search = $conn->query($sql1_search) or die($conn->error);
$num_of_page = ceil($result1_search->num_rows / $num_row);
if ($page<1) {
    $page = 1;
} 
if ($page>$num_of_page){
    $page = $num_of_page;
}
$sql1_search = "SELECT * from feedback limit " . $num_row*($page-1).",".$num_row;
//echo $num_of_page;
$result1_search = $conn->query($sql1_search) or die($conn->error);	

$result2_search = $conn->query($sql2_search);
if ($result2_search->num_rows == 0){
    echo "<tr><td colspan = 7>Không tồn tại</td></tr>";
} else {
    while ($row=$result2_search->fetch_assoc()){
?>
    <tr>
    <td><?php echo $row["ThoiGianFB"]?></td>
    <td><?php echo $row["TenKH"]?></td>
    <td><?php echo $row["TenPhim"]?></td>
    <td><img src="../aovis/img/<?php echo $row["AnhChinh"];?>" width=160px></td>
    <td><?php echo $row["comment"]?></td>
    <td><a href ="xoacomment.php?IDFeedBack=<?php echo $row["IDFeedBack"]?>">Xóa</a></td>
    </tr>
<?php 				
    }
}
}else {
?>

                <?php 
                $result2 = $conn->query($sql2);
					if ($result2->num_rows == 0){
						echo "<tr><td colspan = 7>Không tồn tại</td></tr>";
					} else {
						while ($row=$result2->fetch_assoc()){
				?>
                        <tr>
                        <td><?php echo $row["ThoiGianFB"]?></td>
						<td><?php echo $row["TenKH"]?></td>
						<td><?php echo $row["TenPhim"]?></td>
                        <td><img src="../aovis/img/<?php echo $row["AnhChinh"];?>" width=160px></td>
						<td><?php echo $row["comment"]?></td>
						<td><a href ="xoacomment.php?IDFeedBack=<?php echo $row["IDFeedBack"]?>">Xóa</a></td>
                        </tr>
                <?php 				
						}
					}
				?>
                
                </tr>
			</table>
			<center>
				<?php 
					for($i=1;$i<=$num_of_page;$i++){
						if ($i == $page){
							echo " ".$i." ";
						} else {
							echo " <a href=comment.php?page=".$i.">".$i."</a> ";
						}
						
					}}
				?>
			</center>
				
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