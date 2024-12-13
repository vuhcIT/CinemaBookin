<?php 
	session_start();
	
	if(!isset($_SESSION["add_phim"])){
		$_SESSION["add_phim"]= "";
	}

	if(!isset($_SESSION["add_upload"])){
		$_SESSION["add_upload"]= "";
	}
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
		<h1 align=center>Add new Movie</h1>
		<center><font color=red><?php echo $_SESSION["add_phim"]?></font></center>
		<center><font color=red><?php echo $_SESSION["add_upload"]?></font></center>
		<form method=POST action="add_phim_action.php" enctype="multipart/form-data">
		<table align=center border=0>
			<tr>
				<td align=right>Tên Phim:</td>
				<td><input type=text name=txtTenPhim class=width></td>
			</tr>
			<tr>
				<td align=right>Ảnh Chính:</td>
				<td>
					<input type=file name=imgAnhChinh class=width>
				</td>
			</tr>
			<tr>
				<td align=right>Ảnh Phụ:</td>
				<td>
					<input type=file name=imgAnhPhu class=width>
				</td>
			</tr>
			<tr>
				<td valign=top align=right>Mô tả:</td>
				<td>
					<textarea class=width cols=20 rows=7 name=txtMoTa></textarea>
				</td>
			</tr>
			<tr>
				<td align=right>Thể Loại:</td>
				<td><input type=text name=txtTheLoai class=width></td>
			</tr>
			<tr>
				<td align=right>Quốc Gia:</td>
				<td><input type=text name=txtQuocGia class=width></td>
			</tr>
			<tr>
				<td align=right>Ngôn Ngữ:</td>
				<td><input type=text name=txtNgonNgu class=width></td>
			</tr>
			<tr>
				<td valign=top align=right>Trailer:</td>
				<td>
					<textarea class=width cols=20 rows=7 name=txtTrailer></textarea>
				</td>
			</tr>
			<tr>
				<td align=right>Đạo Diễn:</td>
				<td><input type=text name=txtDaoDien class=width></td>
			</tr>
			<tr>
				<td align=right>Nhà Sản Xuất:</td>
				<td><input type=text name=txtNhaSanXuat class=width></td>
			</tr>
			<tr>
				<td align=right>Công Chiếu:</td>
				<td><input type=date name=txtLichChieu class=width></td>
			</tr>
			<tr>
				<td align=right>Thời Lượng:</td>
				<td><input type=number name=txtThoiLuong class=width></td>
			</tr>
			<tr>
				<td align=right>Giá Vé:</td>
				<td><input type=number name=txtGiaVe class=width></td>
			</tr>
			<tr>
				<td align=right><input type=submit value="Add new"></td>
				<td><input type=reset></td>
			</tr>
		</table>
		</form>
	</body>
</html>