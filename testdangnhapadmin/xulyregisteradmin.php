<?php
//header('Content-Type: text/html; charset=utf-8');
// Kết nối cơ sở dữ liệu
$conn = mysqli_connect('localhost', 'root', '', 'da') or die('Lỗi kết nối');
mysqli_set_charset($conn, "utf8");

// Dùng isset để kiểm tra Form
if (isset($_POST['dangky'])) {
    $username = trim($_POST['UserName']);
    $password = trim($_POST['PassWord']);
    $email = trim($_POST['email']);

    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if (empty($email)) {
        array_push($errors, "Email is required");
    }





    // Kiểm tra username hoặc email có bị trùng hay không
    $sql = "SELECT * FROM admin WHERE UserName = '$username' OR email = '$email'";

    // Thực thi câu truy vấn
    $result = mysqli_query($conn, $sql);

    // Nếu kết quả trả về lớn hơn 1 thì nghĩa là username hoặc email đã tồn tại trong CSDL
    if (mysqli_num_rows($result) > 0) {
        echo '<script language="javascript">alert("Bị trùng tên hoặc chưa nhập tên!"); window.location="register.php";</script>';

        // Dừng chương trình
        die();
    } else {
        $sql = "INSERT INTO admin (UserName,PassWord,email) VALUES ('$username','$password','$email')";
        echo '<script language="javascript">alert("Đăng ký thành công!"); window.location="registeradmin.php";</script>';

        if (mysqli_query($conn, $sql)) {
            echo "Tên đăng nhập: " . $_POST['UserName'] . "<br/>";
            echo "Mật khẩu: " . $_POST['PassWord'] . "<br/>";
            echo "Email đăng nhập: " . $_POST['email'] . "<br/>";
        } else {
            echo '<script language="javascript">alert("Có lỗi trong quá trình xử lý"); window.location="registeradmin.php";</script>';
        }
    }
}
