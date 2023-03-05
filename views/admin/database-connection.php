<?php
// session_start();
// class DBConnection{
//     private $conn=null;

//     public function __construct(){
//          // B1. Kết nối DB Server
//          try {
//             $this->conn = new PDO('mysql:host=localhost;dbname=btth01_cse485;port=3306', 'root','');
//         } catch (PDOException $e) {
//             echo $e->getMessage();
//         }
//     }

//     public function getConnection(){
//         return $this->conn;
//     }


// }
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "btth01_cse485";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if (!$conn) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . mysqli_connect_error());
}