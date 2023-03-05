<?php

require 'database-connection.php';               // Create PDO object
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy thông tin đăng ký từ biểu mẫu và kiểm tra tính hợp lệ của chúng
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];


    if (empty($name) || empty($email) || empty($password) || empty($confirm_password)) {
        // Nếu bất kỳ trường nào trống, hiển thị thông báo lỗi
        echo "Vui lòng điền đầy đủ thông tin đăng ký";
    }

    if (mysqli_num_rows(mysqli_query($conn,"SELECT username FROM users WHERE username='$name'")) > 0){
        echo "Tên đăng nhập này đã có người dùng. Vui lòng chọn tên đăng nhập khác. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }
    if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/", $email))
    {
        echo "Email này không hợp lệ. Vui lòng nhập email khác. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }
          
    //Kiểm tra email đã có người dùng chưa
    if (mysqli_num_rows(mysqli_query($conn,"SELECT email FROM users WHERE email='$email'")) > 0)
    {
        echo "Email này đã có người dùng. Vui lòng chọn Email khác. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }
     else
    if ($password !== $confirm_password) {
        // Nếu mật khẩu không khớp, hiển thị thông báo lỗi
        echo "Mật khẩu và xác nhận mật khẩu không khớp";
        // $confirm_password = md5($password);

    }

    else 
    {
        // Nếu thông tin hợp lệ, cập nhật thông tin tài khoản người dùng trong cơ sở dữ liệu
        $sql = "INSERT INTO users (id_user,username,password,email) values ('','$name', '$password', '$email') ";
    
        if (mysqli_query($conn, $sql)) {
            echo "<h1>Chúc mừng bạn đã đăng ký thành công!</h1><a href='/btth02/views/admin/login.php'>Về trang chủ</a>";
        } else {
            echo "Lỗi khi cập nhật thông tin tài khoản: " . mysqli_error($conn);
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
		<input type="text" id="name" name="name" required>

		<label for="email">Địa chỉ email</label>
		<input type="email" id="email" name="email" required>

		<label for="password">Mật khẩu</label>
		<input type="password" id="password" name="password" required>

		<label for="confirm_password">Xác nhận mật khẩu</label>
		<input type="password" id="confirm_password" name="confirm_password" required>

		<input type="submit" id="POST" value="Đăng ký" >
	</form>
</body>
</html>
