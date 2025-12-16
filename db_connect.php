<?php
// --- BẬT CHẾ ĐỘ HIỂN THỊ LỖI (Thêm đoạn này để sửa lỗi 500) ---
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// -------------------------------------------------------------

// Thông tin kết nối (Hãy kiểm tra thật kỹ từng ký tự)
$servername = "sqlXXX.infinityfree.com"; // CHÚ Ý: Lấy trong mục MySQL Details (không phải localhost)
$username = "if0_40698005";              // Username host
$password = "MẬT_KHẨU_CỦA_BẠN";          // Mật khẩu vPanel (lấy ở mục FTP Details nếu quên)
$dbname = "if0_40698005_demo";           // Tên database (phải có tiền tố if0_...)

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
echo "<h1>Kết nối Database thành công!</h1>";
echo "<p>Host: " . $servername . "</p>";
?>