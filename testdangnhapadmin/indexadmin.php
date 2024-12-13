<?php 
session_start();

	include("connect.php");
	include("functionsadmin.php");
    $sql = "SELECT SUM(phim.GiaVe) AS TongTien
            FROM phim
            INNER JOIN booking ON phim.IDPhim = booking.movieID
            WHERE phim.IDPhim = booking.movieID;";
    $sql1 = "SELECT COUNT(booking.bookingID) AS Sale FROM booking";

    $sql2 = "SELECT COUNT(feedback.IDFeedBack) AS Cmt FROM feedback";
    

	$user_data = check_login($con);

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
                    <a href="indexadmin.php">
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
                    <a href="doimatkhau.php">
                        <span class="icon">
                            <i class="fa-solid fa-lock"></i>
                        </span>
                        <span class="title">Đổi Mật Khẩu</span>
                    </a>
                </li>

                <li>
                    <a href="registeradmin.php">
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
<!-- 
                <div class="search">
                    <label>
                        <input type="text" placeholder="Search here">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div> -->

                <!-- <div class="user">
                    <img src="assets/imgs/customer01.jpg" alt="">
                </div> -->
            </div>

            <!-- ======================= Cards ================== -->
            <div style="display:grid; place-items: center" class="cardBox">

                <div class="card">
                    <div>
                        <div class="numbers">
                        <?php 
                $result = $con->query($sql1);
					if ($result->num_rows == 0){
						echo "<tr><td colspan = 7>Không tồn tại</td></tr>";
					} else {
						while ($row=$result->fetch_assoc()){
				?>
					<tr>
						<td><?php echo $row["Sale"];?></td>
					</tr>
				<?php 				
						}
					}
				?>        
                        </div>
                        <div class="cardName">Sales</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="cart-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">
                        <?php 
                $result = $con->query($sql2);
					if ($result->num_rows == 0){
						echo "<tr><td colspan = 7>Không tồn tại</td></tr>";
					} else {
						while ($row=$result->fetch_assoc()){
				?>
					<tr>
						<td><?php echo $row["Cmt"];?></td>
					</tr>
				<?php 				
						}
					}
				?>
                        </div>
                        <div class="cardName">Comments</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="chatbubbles-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">
                        <?php 
                $result = $con->query($sql);
					if ($result->num_rows == 0){
						echo "<tr><td colspan = 7>Không tồn tại</td></tr>";
					} else {
						while ($row=$result->fetch_assoc()){
				?>
					<tr>
						<td><?php echo $row["TongTien"]."vnđ";?></td>
					</tr>
				<?php 				
						}
					}
				?>
                        </div>
                        <div class="cardName">Earning</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="cash-outline"></ion-icon>
                    </div>
                </div>
            </div>

            <!-- ================ Order Details List ================= -->
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Recent Orders</h2>
                        <a href="../admin/lichsudatve.php" class="btn">View All</a>
                    </div>
                    <div class="imgBx"><img src="../aovis/wp-content/uploads/2023/03/background-event-home-1.png" alt=""></div>
                </div>

                <!-- ================= New Customers ================ -->
                <div class="recentCustomers">
                    <div class="cardHeader">
                        <h2>Recent Customers</h2>
                        <a href="../admin/khachhang.php" class="btn">View All</a>
                    </div>
                      
                                
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