<?php
session_start();
include("connect.php");
include("functionsadmin.php");
$user_data = check_login($conn);
error_reporting(1);
if(!isset($_SESSION["buoichieu"])){
    $_SESSION["buoichieu"]="";
}
if (!isset($_REQUEST["page"])){
    $page=1;
} else { 
    $page = $_REQUEST["page"];
}
$num_row=3;
$sql1 = "SELECT phim.TenPhim, buoichieu.IDPhongChieu, buoichieu.BuoiChieu from buoichieu
join phim on buoichieu.IDPhim = phim.IDPhim order by buoichieu.BuoiChieu"
;
$result1 = $conn->query($sql1) or die($conn->error);
$num_of_page = ceil($result1->num_rows / $num_row);
if ($page<1) {
    $page = 1;
} 
if ($page>$num_of_page){
    $page = $num_of_page;
}
$sql = "SELECT buoichieu.IDBuoiChieu, phim.TenPhim, buoichieu.IDPhongChieu, buoichieu.BuoiChieu from buoichieu
join phim on buoichieu.IDPhim = phim.IDPhim order by buoichieu.BuoiChieu DESC limit " . $num_row*($page-1).",".$num_row;
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
    background-color: #3e8e41; 
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
                        <h2>Mục: Thông Tin Phim <a href="add_buoichieu.php" class="btn-add-film" >+ Add Buổi Chiếu</a></h2>
                    </div>
                    <div class="admin-panel-section-content" >
                    <form role="search" method="get" class="search-form" action="lichtrinh.php">
														<input type="search" class="search-field" placeholder="Tìm kiếm..." value="" name="s" title="Search for:">
														
                                                     <button type="submit"> <i class="fa-solid fa-magnifying-glass"></i>Search</button>   
														
													</form>
                    <table border=1 width=100%>
                    <tr>
					<th>Tên phim</th>
                    <th>Phòng Chiếu</th>
                    <th>Buổi Chiếu</th>
					<th>Xóa</th>
				</tr>
<!-- search -->
 
<?php

// Check if the search query is submitted
if (isset($_GET['s']) && !empty($_GET['s'])) {
    $keyword = $_GET['s'];
//sql prepare
    if(!isset($_SESSION["buoichieu"])){
        $_SESSION["buoichieu"]="";
    }
    if (!isset($_REQUEST["page"])){
        $page=1;
    } else { 
        $page = $_REQUEST["page"];
    }
    $num_row=3;
    $sql1_search = "SELECT phim.TenPhim, buoichieu.IDPhongChieu, buoichieu.BuoiChieu from buoichieu
    join phim on buoichieu.IDPhim = phim.IDPhim where buoichieu.BuoiChieu>Now() and phim.TenPhim LIKE '%$keyword%' or buoichieu.IDPhongChieu LIKE '%$keyword%'
     order by buoichieu.BuoiChieu"
    ;
    $result1_search = $conn->query($sql1_search) or die($conn->error);
    $num_of_page = ceil($result1_search->num_rows / $num_row);
    if ($page<1) {
        $page = 1;
    } 
    if ($page>$num_of_page){
        $page = $num_of_page;
    }
    $sql1_search = "SELECT buoichieu.IDBuoiChieu, phim.TenPhim, buoichieu.IDPhongChieu, buoichieu.BuoiChieu from buoichieu
    join phim on buoichieu.IDPhim = phim.IDPhim where buoichieu.BuoiChieu>Now() and phim.TenPhim LIKE '%$keyword%' or buoichieu.IDPhongChieu LIKE '%$keyword%' order by buoichieu.BuoiChieu DESC limit " . $num_row*($page-1).",".$num_row;
    $result1_search = $conn->query($sql1_search) or die($conn->error);

    //if-clause
    if ($result1_search->num_rows == 0){
        echo "<tr><td colspan = 4>No result!</td></tr>";
    } else {
        while ($row=$result1_search->fetch_assoc()){
            ?>
					<tr>
						<td><?php echo $row["TenPhim"];?></td>
						<td><?php echo $row["IDPhongChieu"];?></td>
						<td><?php echo $row["BuoiChieu"];?></td>
						<td><a href="del_lichtrinh.php?IDBuoiChieu=<?php echo $row["IDBuoiChieu"]?>">Xóa</a></td>
					</tr>
				<?php 				
						}
}
//else-clause
} else {
?>

				<?php 
					if ($result->num_rows == 0){
						echo "<tr><td colspan = 4>No result!</td></tr>";
					} else {
						while ($row=$result->fetch_assoc()){
				?>
					<tr>
						<td><?php echo $row["TenPhim"];?></td>
						<td><?php echo $row["IDPhongChieu"];?></td>
						<td><?php echo $row["BuoiChieu"];?></td>
						<td><a href="del_buoichieu.php?IDBuoiChieu=<?php echo $row["IDBuoiChieu"]?>">Xóa</a></td>
					</tr>
				<?php 				
						}
					}}
				?>
			</table>
			<center>
				<?php 
					for($i=1;$i<=$num_of_page;$i++){
						if ($i == $page){
							echo " ".$i." ";
						} else {
							echo " <a href=lichtrinh.php?page=".$i.">".$i."</a> ";
						}
						
					}
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