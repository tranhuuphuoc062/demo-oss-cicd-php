<?php
// Bật hiển thị lỗi
ini_set('display_errors', 1);
error_reporting(E_ALL);

// KIỂM TRA MÔI TRƯỜNG:
// Nếu có biến môi trường 'DB_HOST' (Do Docker tạo ra) thì dùng nó.
// Nếu không thì dùng thông tin của InfinityFree.

if (getenv('DB_HOST')) {
    // --- CẤU HÌNH CHO DOCKER (LOCAL) ---
    $servername = getenv('DB_HOST'); // Lấy từ docker-compose: 'db-server'
    $username = getenv('DB_USER');   // 'root'
    $password = getenv('DB_PASS');   // 'rootpassword'
    $dbname = getenv('DB_NAME');     // 'docker_demo_db'
    $env_name = "Docker Local";      // Để in ra màn hình cho dễ biết
} else {
    // --- CẤU HÌNH CHO INFINITYFREE (HOSTING) ---
    $servername = "sql100.infinityfree.com"; // Thay bằng Host thật của bạn
    $username = "if0_40698005";              // Thay bằng User thật của bạn
    $password = "eHcK8SXMxl3i";              // Thay bằng Pass thật của bạn
    $dbname = "if0_40698005_test_db";           // Thay bằng DB Name thật của bạn
    $env_name = "InfinityFree Hosting";
}

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    // Nếu kết nối Docker thất bại, thử tự động tạo bảng (chỉ dành cho lần chạy đầu tiên của Docker)
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Nếu là Docker, tự động tạo bảng nếu chưa có (Tiện lợi)
if (getenv('DB_HOST')) {
    $sql_create = "CREATE TABLE IF NOT EXISTS students (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        fullname VARCHAR(50) NOT NULL,
        major VARCHAR(50) NOT NULL,
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";
    $conn->query($sql_create);
}
?>