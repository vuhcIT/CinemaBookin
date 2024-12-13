<?php 
	session_start();
	if(!isset($_SESSION["add_buoichieu"])){
		$_SESSION["add_buoichieu"]= "";
	}
    include("../aovis/connect.php");
    $sql = "select * from phongchieu";
    $result = $conn->query($sql);
    $sql_phim = "select * from phim";
    $result_phim = $conn->query($sql_phim);
	$sql_buoichieu = "select * from buoichieu";
	$result_buoichieu = $conn->query($sql_buoichieu);
?>
<html>
	<head>
		<meta charset="utf-8">
		<style type="text/css">
			.width{
				width:250px;
			}
		</style>
	</head>
	<body>
		<h1 align=center>Thêm buổi chiếu phim mới</h1>
		<center><font color=red><?php echo $_SESSION["add_buoichieu"]?></font></center>
		<form method=POST action="add_buoichieu_action.php">
		<table align=center border=0>
			<tr>
				<td align=right>Tên Phim:</td>
                <td>
				<select name ="txtTenPhim">
                    <?php
                        while($row1=$result_phim->fetch_assoc()){
                    ?>
                    <option value="<?php echo $row1["IDPhim"]?>"><?php echo $row1["TenPhim"]?></option>
                    <?php
                    }
                    ?>
                </select>
                </td>
			</tr>
			
			<tr>
				<td valign=top align=right>Phòng Chiếu:</td>
                <td>
				<select name ="txtPhongChieu">
                    <?php
                        while($row=$result->fetch_assoc()){
                    ?>
                    <option value="<?php echo $row["IDPhongChieu"]?>"><?php echo $row["IDPhongChieu"]?></option>
                    <?php
                    }
                    ?>
                </select>
                <td>
			</tr>

            <tr>
				<td valign=top align=right>Buổi Chiếu:</td>
				<td>
				<?php
                        ($row=$result_buoichieu->fetch_assoc())
                    ?>
    <input type="datetime-local" name="txtbuoichieu" class="width" value="<?php echo $row['BuoiChieu']; ?>">
					
</td>
			</tr>
			
			<tr>
				<td align=right><input type=submit value="Add new"></td>
				<td><input type=reset></td>
			</tr>
		</table>
		</form>
        
	</body>
</html>