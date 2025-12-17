<?php
// --- PHẦN 1: BACKEND (XỬ LÝ LOGIC & DATABASE) ---
include 'db_connect.php'; // Gọi file kết nối DB bạn đã làm ở bước trước

$message = "";

// Xử lý khi người dùng bấm nút "Thêm sinh viên" (Create)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['fullname'];
    $major = $_POST['major'];

    if (!empty($name) && !empty($major)) {
        // Câu lệnh SQL để chèn dữ liệu
        $sql = "INSERT INTO students (fullname, major) VALUES ('$name', '$major')";
        
        if ($conn->query($sql) === TRUE) {
            $message = "✅ Thêm sinh viên thành công!";
        } else {
            $message = "❌ Lỗi: " . $conn->error;
        }
    } else {
        $message = "⚠️ Vui lòng nhập đủ thông tin!";
    }
}

// Xử lý lấy danh sách sinh viên để hiển thị (Read)
$sql_get = "SELECT id, fullname, major, reg_date FROM students ORDER BY id DESC";
$result = $conn->query($sql_get);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Demo Project PHP Fullstack</title>
    <style>
        body { font-family: sans-serif; max-width: 800px; margin: 20px auto; padding: 20px; }
        .form-container { background: #f4f4f4; padding: 20px; border-radius: 8px; margin-bottom: 20px; }
        input, button { padding: 10px; margin: 5px 0; width: 100%; box-sizing: border-box; }
        button { background: #28a745; color: white; border: none; cursor: pointer; }
        button:hover { background: #218838; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #007bff; color: white; }
        .msg { color: red; font-weight: bold; }
    </style>
</head>
<body>

    <h1>📝 Quản lý Sinh viên (Demo CI/CD)</h1>
    <h1>Trần Hữu Phước báo cáo Lab T4 Ca 1</h1>
    <p>Version: 3.0 - Fullstack (Frontend + Backend + DB)</p>

    <div class="form-container">
        <h3>Thêm Sinh viên mới</h3>
        <?php if($message) echo "<p class='msg'>$message</p>"; ?>
        
        <form method="post" action="">
            <label>Họ và Tên:</label>
            <input type="text" name="fullname" placeholder="Nhập tên..." required>
            
            <label>Chuyên ngành:</label>
            <input type="text" name="major" placeholder="Ví dụ: CNTT, Kinh tế..." required>
            
            <button type="submit">Lưu vào Database</button>
        </form>
    </div>

    <h3>Danh sách Sinh viên hiện có</h3>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Họ Tên</th>
                <th>Ngành</th>
                <th>Ngày đăng ký</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                // Vòng lặp Backend đổ dữ liệu ra Frontend
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row["id"] . "</td>
                            <td>" . $row["fullname"] . "</td>
                            <td>" . $row["major"] . "</td>
                            <td>" . $row["reg_date"] . "</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='4'>Chưa có dữ liệu nào</td></tr>";
            }
            ?>
        </tbody>
    </table>

</body>
</html>