<?php
// Thay 4 dòng dưới đây bằng thông tin thật của bạn từ InfinityFree
$servername = "sql100.infinityfree.com"; // Thay bằng MySQL Host Name
$username = "if0_40698005";              // Thay bằng MySQL User Name
$password = "eHcK8SXMxl3i";          // Thay bằng Password (lấy ở FTP Details)
$dbname = "if0_40698005_demo";           // Thay bằng MySQL Database Name

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
  die("Kết nối thất bại: " . $conn->connect_error);
}
echo "<h1>Kết nối Database thành công!</h1>";
echo "<p>Host: " . $servername . "</p>";
echo "<p>DB Name: " . $dbname . "</p>";
?>