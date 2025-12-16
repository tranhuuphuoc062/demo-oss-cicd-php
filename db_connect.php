<?php
$servername = "sql100.infinityfree.com"; // Lấy trong mục MySQL Details
$username = "if0_40698005";
$password = "eHcK8SXMxl3i";
$dbname = "if0_40698005_test_db";

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra
if ($conn->connect_error) {
  die("Kết nối thất bại: " . $conn->connect_error);
}
echo "Kết nối Database thành công!";
?>  