<?php 
session_start(); //print_r($_SESSION);
  include("connect.php");
	include("functions.php");
  error_reporting(0);
  $user_data = check_login($con);
  $tendangnhap = $user_data['UserName'];
  //print_r($_POST)
  if (isset($_POST['btndoimatkhau'])==true){
    $matkhaucu= $_POST['matkhaucu'];
    $matkhaumoi_1= $_POST['matkhaumoi_1'];
    $matkhaumoi_2= $_POST['matkhaumoi_2'];

    $conn = new PDO("mysql:host=localhost;dbname=da;charset=utf8", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM khachhang  WHERE UserName = ? AND PassWord = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$tendangnhap,$matkhaucu]);

    if ( $stmt->rowCount()==0 ){$loi.= "Mật khẩu cũ sai<br>";}
      
    if (strlen($matkhaumoi_1)<8){$loi.="Mật khẩu không được nhỏ hơn 8 kí tự<br>";}  

    if ($matkhaumoi_1!=$matkhaumoi_2){$loi.="Mật khẩu nhập lại không khớp<br>";}

    
    if ($loi==""){
      $sql = "UPDATE khachhang SET PassWord = ? WHERE UserName = ?";
      $conn->prepare($sql);
      $stmt = $conn->prepare($sql);
      $stmt->execute([$matkhaumoi_1,$tendangnhap]);
      echo "<script>alert('Cập nhật mật khẩu thành công !!!');</script>";
      header("Location:../aovis/account/account.php");
      exit();
    }
  }
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<form method="post" style="width:600px" class="border rounded m-auto">
  <?php if ($loi!=""){
    ?> 
    <div class="alert alert-primary"><?php echo $loi ?></div>
    <?php
  }
  
  ?>
  <div class="mb-3">
    <label for="tendangnhap" class="form-label">Tên Đăng Nhập</label>
    <input value="<?php echo $tendangnhap?>" disabled class="form-control" id="tendangnhap">
  </div>
  <div class="mb-3">
    <label for="matkhaucu" class="form-label">mật khẩu cũ</label>
    <input value="<?php if(isset($matkhaucu)==true) echo $matkhaucu ?>" type="password" class="form-control" id="matkhaucu" name="matkhaucu">
  </div>
  <div class="mb-3">
    <label for="matkhaumoi_1" class="form-label">mật khẩu mới</label>
    <input value="<?php if(isset($matkhaumoi_1)==true) echo $matkhaumoi_1 ?>" type="password" class="form-control" id="matkhaumoi_1" name="matkhaumoi_1">
  </div>
  <div class="mb-3">
    <label for="matkhaumoi_2" class="form-label">Nhập lại mật khẩu mới</label>
    <input value="<?php if(isset($matkhaumoi_2)==true) echo $matkhaumoi_2 ?>" type="password" class="form-control" id="matkhaumoi_2" name="matkhaumoi_2">
  </div>
  <button type="submit" name="btndoimatkhau" value="doimk" class="btn btn-primary">Đổi mật khẩu</button>
</form>