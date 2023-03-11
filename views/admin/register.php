<?php

require 'database-connection.php';               // Create PDO object
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy thông tin đăng ký từ biểu mẫu và kiểm tra tính hợp lệ của chúng
    $user   = $_POST['txtUser'];
    $mail   = $_POST['txtMail'];
    $pass1  = $_POST['txtPass1'];
    $pass2  = $_POST['txtPass2'];


    if (empty($user) || empty($mail) || empty($pass1) || empty($pass2)) {
        // Nếu bất kỳ trường nào trống, hiển thị thông báo lỗi
        echo "Vui lòng điền đầy đủ thông tin đăng ký";
    }

    if (mysqli_num_rows(mysqli_query($conn,"SELECT username FROM users WHERE username='$user' OR email='$mail'")) > 0){
        echo "Tên đăng nhập này đã có người dùng. Vui lòng chọn tên đăng nhập khác. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }
    if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/", $mail))
    {
        echo "Email này không hợp lệ. Vui lòng nhập email khác. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }
          
    //Kiểm tra email đã có người dùng chưa
    if (mysqli_num_rows(mysqli_query($conn,"SELECT email FROM users WHERE email='$mail'")) > 0)
    {
        echo "Email này đã có người dùng. Vui lòng chọn Email khác. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }
     else
     {
        // Lưu lại bản đăng kí vào CSDL
        $pass_hash = password_hash($pass1, PASSWORD_DEFAULT);
        $code_hash = md5(random_bytes(20));
        $insert_sql = "INSERT INTO users (username, email, password, activation_code)
        VALUES ('$user', '$mail', '$pass_hash', '$code_hash')";
        if(mysqli_query($conn,$insert_sql)){
            echo "<p style='color:green'>Đăng kí thành công, vui lòng check Email để kích hoạt tài khoản</p>";
            echo "<p >Quay lại <href='login.php'/p>";
            // Kích hoạt là gì?
        }

        
    }
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Đăng ký tài khoản</title>
    <link rel="stylesheet" href="/btth02/assets/css/style_regiser.css">
</head>
<body>
	<form action="register.php" method="post">
		<label for="name">Họ và tên</label>
		<input type="text" id="" name="txtUser" required>

		<label for="email">Địa chỉ email</label>
		<input type="email" id="" name="txtMail" required>

		<label for="password">Mật khẩu</label>
		<input type="password" id="" name="txtPass1" required>

		<label for="confirm_password">Xác nhận mật khẩu</label>
		<input type="password" id="" name="txtPass2" required>

		<input type="submit" id="" value="Đăng ký" >
	</form>
</body>
</html>
