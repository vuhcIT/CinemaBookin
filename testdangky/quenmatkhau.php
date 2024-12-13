<?php
$loi = "";
if (isset($_POST['nutguiyeucau']) == true) {
    $email = $_POST['email'];
    $conn = new PDO("mysql:host=localhost;dbname=da;charset=utf8", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM khachhang  WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$email]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $UserName = $result['UserName'];

    $count = $stmt->rowCount();
    
    if ($count == 0) {
        echo '<script language="javascript">alert("Email chưa đăng ký!");</script>';
    } else {
        $matkhaumoi = substr(md5(rand(0, 9999999)), 0, 8);
        $sql = "UPDATE khachhang SET PassWord =? WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$matkhaumoi, $email]);
        guimatkhaumoi($email, $matkhaumoi, $UserName);
    }
}
?>
<?php
function guimatkhaumoi($email, $matkhaumoi, $UserName)
{
    require "PHPMailer/src/PHPMailer.php";
    require "PHPMailer/src/SMTP.php";
    require 'PHPMailer/src/Exception.php';
    $mail = new PHPMailer\PHPMailer\PHPMailer(true); //true:enables exceptions
    try {
        $mail->SMTPDebug = 0; //0,1,2: chế độ debug
        $mail->isSMTP();
        $mail->CharSet  = "utf-8";
        $mail->Host = 'smtp.gmail.com';  //SMTP servers
        $mail->SMTPAuth = true; // Enable authentication
        $mail->Username = 'hoanglongvu1272003@gmail.com'; // SMTP username
        $mail->Password = 'cdfz fjzd alay klid';   // SMTP password
        $mail->SMTPSecure = 'tls';  // encryption TLS/SSL 
        $mail->Port = 587;  // port to connect to  //456              
        $mail->setFrom('hoanglongvu1272003@gmail.com', 'Thư Đổi Mật Khẩu');
        $mail->addAddress($email);
        $mail->isHTML(true);  // Set email format to HTML
        $mail->Subject = 'Thư Đổi Mật Khẩu';
        $noidungthu = "<p>Bạn nhận được thư này do hệ thống nhận được yêu cầu đổi mật khẩu</p>
        Mật khẩu mới của bạn là ($matkhaumoi) <br>
        Tên tài khoản đăng nhập là ($UserName)";
        $mail->Body = $noidungthu;
        $mail->smtpConnect(array(
            "ssl" => array(
                "verify_peer" => false,
                "verify_peer_name" => false,
                "allow_self_signed" => true
            )
        ));
        $mail->send();
        echo '<script language="javascript">alert("Yêu cầu gửi thành công!");</script>';
    } catch (Exception $e) {
        echo '', $mail->ErrorInfo;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="./style.css">

</head>

<body>
    <section> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>

        <form class="signin" method="post">
        <div class="content">
        <div class="form">
            <?php if ($loi != "") { ?>
                <?= $loi ?>
            <?php } ?>

            <div class="inputBox">

                            <input value="<?php if (isset($email) == true) echo $email ?>" type="email" name='email' required> <i>Nhập email đã đăng kí</i>

                        </div>
            
            
            <div class="inputBox">

                <input type="submit" name="nutguiyeucau" value="Gửi yêu cầu">
            </div>
            </div>
            <a style="color:lime" href='login.php' title='login'>Đăng nhập</a>

        </div>

            
            
           
        </form>
</body>

</html>