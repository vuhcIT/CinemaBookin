<?php 
	session_start();
	if(!isset($_SESSION["edit_phim"])){
		$_SESSION["edit_phim"]= "";
	}

	if(!isset($_SESSION["edit_upload"])){
		$_SESSION["edit_upload"]= "";
	}
    include("../aovis/connect.php");
    $IDPhim = $_GET["IDPhim"];
    $sql = "select * from phim where IDPhim =".$IDPhim;
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

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
		<h1 align=center>Edit movie <?php echo $row["TenPhim"]?></h1>
		<center><font color=red><?php echo $_SESSION["edit_phim"]?></font></center>
		<center><font color=red><?php echo $_SESSION["edit_upload"]?></font></center>
		<form method=POST enctype="multipart/form-data" action="edit_action.php?IDPhim=<?php echo $IDPhim?>">
		<table align=center border=0>
			<tr>
				<td align=right>Tên Phim:</td>
				<td><input type=text name=txtTenPhim class=width value="<?php echo $row["TenPhim"]?>"></td>
			</tr>
			<tr>
				<td align=right>Ảnh Chính:</td>
                <td><img src="../aovis/img/<?php echo $row["AnhChinh"];?>" width=160px></td>
				<td>
					<input type=file name=imgAnhChinh class=width>
				</td>
			</tr>
			<tr>
				<td align=right>Ảnh Phụ:</td>
                <td><img src="../aovis/img/<?php echo $row["AnhThem"];?>" height=160px></td>
				<td>
					<input type=file name=imgAnhPhu class=width>
				</td>
			</tr>
			<tr>
				<td valign=top align=right>Mô tả:</td>
				<td>
					<textarea class=width cols=30 rows=7 name=txtMoTa><?php echo $row["detail"]?></textarea>
				</td>
			</tr>
			<tr>
				<td align=right>Thể Loại:</td>
				<td><input type=text name=txtTheLoai class=width value="<?php echo $row["TheLoai"]?>"></td>
			</tr>
			<tr>
				<td align=right>Quốc Gia:</td>
				<td><input type=text name=txtQuocGia class=width value="<?php echo $row["QuocGia"]?>"></td>
			</tr>
			<tr>
				<td align=right>Ngôn Ngữ:</td>
				<td><input type=text name=txtNgonNgu class=width value="<?php echo $row["ThoiLuong"]?>"></td>
			</tr>
			<tr>
				<td valign=top align=right>Trailer:</td>
				<td>
					<textarea class=width cols=30 rows=7 name=txtTrailer><?php echo $row["Trailer"]?></textarea>
				</td>
			</tr>
			<tr>
				<td align=right>Đạo Diễn:</td>
				<td><input type=text name=txtDaoDien class=width value="<?php echo $row["DaoDien"]?>"></td>
			</tr>
			<tr>
				<td align=right>Nhà Sản Xuất:</td>
				<td><input type=text name=txtNhaSanXuat class=width value="<?php echo $row["NhaSanXuat"]?>"></td>
			</tr>
			<tr>
				<td align=right>Công Chiếu:</td>
				<td><input type=date name=txtLichChieu class=width value="<?php echo $row["LichChieu"]?>"></td>
			</tr>
			<tr>
				<td align=right>Thời Lượng:</td>
				<td><input type=number name=txtThoiLuong class=width value="<?php echo $row["ThoiLuong"]?>"></td>
			</tr>
			<tr>
				<td align=right>Giá Vé:</td>
				<td><input type=number name=txtGiaVe class=width value="<?php echo $row["GiaVe"]?>"></td>
			</tr>
			<tr>
				<td align=right><input type=submit value="Edit"></td>
				<td><input type=reset></td>
			</tr>
			
		</table>
		</form>
	</body>
</html>