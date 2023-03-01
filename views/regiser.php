<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "btth01_cse485";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//  echo "Thành công";
// Nếu không phải là sự kiện đăng ký thì không xử lý
if (!isset($_POST['username'])){
	die('');
}
// include('db_connection.php');
//Khai báo utf-8 để hiển thị được tiếng việt
// header('Content-Type: text/html; charset=UTF-8');
          
//Lấy dữ liệu từ file regiser.php
$username = addslashes($_POST['username']);
$password = addslashes($_POST['passwd']);
$cf_password = addslashes($_POST['confirm_passwd']);
$email = addslashes($_POST['email']);
$birthday = addslashes($_POST['ngaysinh']);
$gender = addslashes($_POST['gender']);
if(isset($_POST['username'])){
    // do something with $_POST['username']
}

if(isset($_POST['passwd'])){
    // do something with $_POST['passwd']
}

if(isset($_POST['confirm_passwd'])){
    // do something with $_POST['confirm_passwd']
}

if(isset($_POST['email'])){
    // do something with $_POST['email']
}

if(isset($_POST['ngaysinh'])){
    // do something with $_POST['ngaysinh']
}

if(isset($_POST['gender'])){
    // do something with $_POST['gender']
}

//Kiểm tra người dùng đã nhập liệu đầy đủ chưa
if (!$username || !$password || !$email  || !$cf_password || !$birthday || !$gender) {
	echo "Vui lòng nhập đầy đủ thông tin. <a href='javascript: history.go(-1)'>Trở lại</a>";
	exit;
}
	  
// 	// Mã khóa mật khẩu
	if($password != $cf_password){
		header("location:login.php?page=register");
		setcookie("error", "Đăng ký không thành công!", time()+1, "/","", 0);
	}
	$password = md5($password);

//Kiểm tra tên đăng nhập này đã có người dùng chưa
if (mysqli_num_rows(mysqli_query($conn,"SELECT username FROM users WHERE username='$username'")) > 0)
{
	echo "Tên đăng nhập này đã có người dùng. Vui lòng chọn tên đăng nhập khác. <a href='javascript: history.go(-1)'>Trở lại</a>";
	exit;
}
	  
//Kiểm tra email có đúng định dạng hay không
if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/", $email))
{
	echo "Email này không hợp lệ. Vui long nhập email khác. <a href='javascript: history.go(-1)'>Trở lại</a>";
	exit;
}  
//Kiểm tra email đã có người dùng chưa
if (mysqli_num_rows(mysqli_query($conn,"SELECT email FROM users WHERE email='$email'")) > 0)
{
	echo "Email này đã có người dùng. Vui lòng chọn Email khác. <a href='javascript: history.go(-1)'>Trở lại</a>";
	exit;
}
//Kiểm tra dạng nhập vào của ngày sinh
if (!preg_match("/^[0-9]+\/[0-9]+\/[0-9]{2,4}$/", $birthday))
{
    echo "Ngày tháng năm sinh không hợp lệ. Vui long nhập lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
    exit;
}

	  
//Lưu thông tin thành viên vào bảng
@$addmember = "
	INSERT INTO users (
		username,
		passwd,
		email,
		ngaysinh,
		gioitinh
	)
	VALUE (
		'{$username}',
		'{$password}',
		'{$email}',
=		'{$birthday}',
		'{$gender}'
	)
";
			  
// //Thông báo quá trình lưu
if ($conn->query($addmember) === TRUE) {
    echo "Quá trình đăng ký thành công. <a href='login.php'>Về trang chủ</a>";
} else {
    echo "Có lỗi xảy ra trong quá trình đăng ký. <a href='regiser.php'>Thử lại</a>";
}

// Đóng kết nối
// $conn->close();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Đăng ký tài khoản</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<style>
		body {
			background-color: #f2f2f2;
		}
		.form-container {
			background-color: #fff;
			margin-top: 50px;
			padding: 20px;
			box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
		}
		.form-container h2 {
			text-align: center;
			margin-bottom: 20px;
		}
		.form-group label {
			font-weight: bold;
		}
		.form-group input {
			border-radius: 5px;
			padding: 10px;
			border: 1px solid #ccc;
			width: 100%;
			margin-bottom: 20px;
		}
		.form-group select {
			border-radius: 5px;
			padding: 10px;
			border: 1px solid #ccc;
			width: 100%;
			margin-bottom: 20px;
		}
		.btn-register {
			background-color: #007bff;
			color: #fff;
			border-radius: 5px;
			padding: 10px 20px;
			border: none;
			cursor: pointer;
		}
		.btn-register:hover {
			background-color: #0069d9;
		}
	</style>
</head>
<body>
        
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-6">
				<div class="form-container">
					<h2>Đăng ký tài khoản</h2>
					<form>
						<div class="form-group">
							<label>Tài khoản:</label>
							<input type="text" name="username" required>
						</div>
						<div class="form-group">
							<label>Email:</label>
							<input type="email" name="email" required>
						</div>
						<div class="form-group">
							<label>Mật khẩu:</label>
							<input type="password" name="passwd" required>
						</div>
						<div class="form-group">
							<label>Nhập lại mật khẩu:</label>
							<input type="password" name="confirm_passwd" required>
						</div>
                        <div class="form-group">
                            <label for="">Email của bạn:</label>
                            <input type="email" name="email" required>
                        </div>
						<div class="form-group">
							<label>Giới tính:</label>
							<select name="gender" required>
								<option value="">--Chọn giới tính--</option>
								<option value="male">Nam</option>
								<option value="female">Nữ</option>
								<option value="other">Khác</option>
							</select>
						</div>
						<div class="form-group">
							<label>Ngày sinh:</label>
							<input type="date" name="ngaysinh" required>
						</div>
						<button type="submit" class="summit">Đăng ký</button>
