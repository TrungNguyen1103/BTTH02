<?php
require_once 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;

interface EmailServerInterface {
	public function sendEmail($to, $subject, $message);
}

class EmailSender {
    private $emailServer;

    public function __construct(EmailServerInterface $emailServer) {
        $this->emailServer = $emailServer;
    }

    public function send($to, $subject, $message) {
        $this->emailServer->sendEmail($to, $subject, $message);
    }
}


class MyEmailServer implements EmailServerInterface {
    private $mailer;

    public function __construct() {
        $this->mailer = new PHPMailer();
        $this->mailer->isSMTP();
        $this->mailer->Host = 'smtp.gmail.com';
        $this->mailer->SMTPAuth = true;
        $this->mailer->Username = 'hatuankiet150299@gmail.com';
        $this->mailer->Password = 'zglirrjmzgbxnvoi
        ';
        $this->mailer->SMTPSecure = 'tls';
        $this->mailer->Port = 587;
    }

    public function sendEmail($to, $subject, $message) {
        $this->mailer->setFrom('hatuankiet150299@gmail.com');
        $this->mailer->addAddress($to);
        $this->mailer->Subject = $subject;
        $this->mailer->Body = $message;

        if (!$this->mailer->send()) {
            throw new Exception('Email could not be sent.');
        }
    }
}
$emailServer = new MyEmailServer();
$emailSender = new EmailSender($emailServer);
$emailSender->send("hatuankiet150299@gmail.com", "DIEM DANH CONG NGHE WEB", "Hà Tuấn Kiệt, MÃ SV: 1951060796, lớp học phần : 62TH4.");

?>