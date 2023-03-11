<?php
require_once 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
class MyEmailServer implements EmailServerInterface {
    public function sendEmail($to, $subject, $message) {
// Kết nối đến cơ sở dữ liệu
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "database_name";

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

// Lấy thông tin người dùng từ form đăng ký
$email = $_POST['email'];
$password = $_POST['password'];

// Tạo mã kích hoạt duy nhất
$activation_code = md5($email . time());

// Thêm thông tin người dùng và mã kích hoạt vào cơ sở dữ liệu
$stmt = $conn->prepare("INSERT INTO users (email, password, activation_code) VALUES (email, password, activation_code)");
$stmt->bindParam('email', $email);
$stmt->bindParam('password', $password);
$stmt->bindParam('activation_code', $activation_code);
$stmt->execute();

// Gửi email kích hoạt tới địa chỉ email của người dùng
// require_once('vendor/autoload.php');
$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'trungng27@gmail.com'; // Địa chỉ email của bạn
$mail->Password = 'kxayhlyduovzwvpq
'; // Mật khẩu email của bạn
$mail->SMTPSecure = 'tls';
$mail->Port = 587;
$mail->setFrom('trungng27@gmail.com', 'Trung Nguyen');
$mail->addAddress($email);
$mail->isHTML(true);
$mail->Subject = 'Activation code for your account';
$mail->Body    = '<a href="http://example.com/activate.php?code=' . $activation_code . '">Click here to activate your account</a>';
if(!$mail->send()) {
    echo 'Email could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Activation email has been sent to your email address.';
}

            }
}
