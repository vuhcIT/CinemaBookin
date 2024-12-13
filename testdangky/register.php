<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="./style.css">
</head>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="./style.css">

</head>

<body>
    <!-- partial:index.partial.html -->
    <!doctype html>

    <html lang="en">

    <head>

        <meta charset="UTF-8">

        <title>Register Form</title>

        <link rel="stylesheet" href="./style.css">

    </head>

    <body> <!-- partial:index.partial.html -->


        <section> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>


            <form class="signin" method="post">

                <div class="content">

                    <h2>Register Cinemax</h2>

                    <div class="form">

                        <div class="inputBox">

                            <input type="text" name='UserName' required> <i>Username</i>

                        </div>

                        <div class="inputBox">

                            <input type="password" name='PassWord' id="myInput" required  > <i>Password</i>

                        </div>
                        <script>
                                function checkPasswordLength() {
                                var password = document.getElementById("myInput");
                            
                                if (password.value.length < 8) {
                                    alert("Mật khẩu phải có ít nhất 8 ký tự");
                                    password.focus();
                                    return false;
                                
                                }
                                                                }
                        </script>
                        <div>
						<input style="cursor:pointer" type="checkbox"  onclick="myFunction()" >;<a style="color:white">Show Password</a>
                        
                            <script>
								function myFunction() {
									var x = document.getElementById("myInput");
									if (x.type === "password") {
										x.type = "text";
									} else {
										x.type = "password";
									}
								}
							</script>
							
							
						</div>
                        <div class="inputBox">

                            <input type="email" name='email' required> <i>Email</i>

                        </div>
                        <div class="inputBox">

                            <input type="tel" name='SĐT' onkeypress="return onlyNumberKey(event)" pattern="[0-9]{10}" required> <i>Phone Number</i>

                        </div>
                        <div class="inputBox">

                            <input type="text" name='TenKH' required> <i>Tên khách hàng</i>

                        </div>
                        <div class="inputBox">

                            <input type="tel" name='CMND' onkeypress="return onlyNumberKey(event)" pattern="[0-9]{12}" required> <i>Số căn cước</i>

                        </div>
                        <a style="color:lime" href='login.php' title='login'>Đã có tài khoản ?</a>
                        
                        <?php require 'xulyregister.php'; ?>

                        <div class="inputBox">

                            <input type="submit" name="dangky" value="Đăng Ký" onclick="return checkPasswordLength()" >

                        </div>

                    </div>

                </div>

            </form>


        </section> <!-- partial -->
        </form>
        <script>
            function onlyNumberKey(evt) {
                var ASCIICode = (evt.which) ? evt.which : evt.keyCode
                if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
                    return false;
                return true;

            }
        </script>
    </body>

    </html>

</body>

</html>

</html>