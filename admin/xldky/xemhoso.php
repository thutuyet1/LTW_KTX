<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông Tin Hồ Sơ</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .row {
            margin: 30px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            max-width: 1200px;
        }

        h1 {
            text-align: center;
            font-size: 24px;
            color: #004080;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            padding: 10px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #004080;
            color: white;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #e9f5ff;
        }

        .btn {
            display: block;
            width: 150px;
            margin: 20px auto 0;
            text-align: center;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            font-size: 14px;
            background-color: #004080;
            color: white;
            text-decoration: none;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<div class="row">
    <h1>Thông tin hồ sơ</h1>
    <table>
        <tbody>
            <?php
            foreach ($hosoid as $tthoso) {
                echo '
                <tr>
                    <th>Mã số sinh viên</th>
                    <td>' . htmlspecialchars($tthoso['mssv']) . '</td>
                </tr>
                <tr>
                    <th>Họ và tên</th>
                    <td>' . htmlspecialchars($tthoso['hoten']) . '</td>
                </tr>
                <tr>
                    <th>Ngày sinh</th>
                    <td>' . htmlspecialchars($tthoso['ngaysinh']) . '</td>
                </tr>
                <tr>
                    <th>Địa chỉ</th>
                    <td>' . htmlspecialchars($tthoso['diachi']) . '</td>
                </tr>
                <tr>
                    <th>Nơi sinh</th>
                    <td>' . htmlspecialchars($tthoso['noisinh']) . '</td>
                </tr>
                <tr>
                    <th>Điện thoại</th>
                    <td>' . htmlspecialchars($tthoso['dienthoai']) . '</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>' . htmlspecialchars($tthoso['email']) . '</td>
                </tr>
                <tr>
                    <th>Khoa</th>
                    <td>' . htmlspecialchars($tthoso['khoa']) . '</td>
                </tr>
                <tr>
                    <th>Điện thoại phụ huynh</th>
                    <td>' . htmlspecialchars($tthoso['dtph']) . '</td>
                </tr>
                <tr>
                    <th>Căn cước công dân</th>
                    <td>' . htmlspecialchars($tthoso['cccd']) . '</td>
                </tr>
                <tr>
                    <th>Giới tính</th>
                    <td>' . htmlspecialchars($tthoso['gioitinh']) . '</td>
                </tr>
                <tr>
                    <th>Hệ đào tạo</th>
                    <td>' . htmlspecialchars($tthoso['hedaotao']) . '</td>
                </tr>
                <tr>
                    <th>Dân tộc</th>
                    <td>' . htmlspecialchars($tthoso['dantoc']) . '</td>
                </tr>';
            }
            ?>
        </tbody>
    </table>
    <a href="indexx.php?act=qldangky" class="btn">Danh Sách</a>
</div>
</body>
</html>
