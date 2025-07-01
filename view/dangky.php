<?php
session_start();
ob_start();
 include "../model/pdo.php";
 include "../model/taikhoan.php";
 include "../model/loaiphong.php";
 include "../model/giuong.php";
 include "../model/phong.php";


?>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: url("../images/hinhnen.jpg") no-repeat center center fixed;
            background-size: cover;
            color: #333;
        }

        header {
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            padding: 5px 10px;
        }

        .header-logo {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .header-logo h1 {
            margin: 0 auto;
            font-size: 24px;
            text-align: center;
            color: #004080;
        }

        .logo {
            width: 100px;
            height: auto;
            margin-right: 10px;
        }

        .navbar {
            background-color: #A21D2E;
            padding: 10px 20px;
            color: white;
            font-weight: bold;
        }

        .navbar-link {
            display: flex;
            align-items: center;
            text-decoration: none;
            color: white;
        }

        .navbar-link img {
            width: 24px;
            height: 24px;
            margin-right: 10px;
        }

        .navbar-link span {
            font-size: 16px;
            line-height: 1;
        }

        .main-content {
            margin: 20px;
        }

        .filters {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
        }

        .filters select {
            padding: 8px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        /* Unified Room Card */
        .room-info {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
            margin: 20px;
        }

        .room-card {
            background: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
            padding: 15px;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .room-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        .room-card h3 {
            font-size: 18px;
            color: #333;
            margin-bottom: 15px;
            text-align: center;
            border-bottom: 1px solid #ddd;
            padding-bottom: 10px;
        }

        /* Room Floor Styling */
        .room-floor {
            font-size: 16px;
            color: #ffffff;
            background-color: #c0392b;
            padding: 5px 10px;
            border-radius: 8px 8px 0 0;
            text-align: center;
            font-weight: bold;
            margin-bottom: 10px;
        }

        /* Bed List */
        .bed-list {
            list-style: none;
            padding: 0;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(100px, 1fr));
            gap: 10px;
        }

        .bed-list li {
            text-align: center;
            padding: 8px;
            border-radius: 5px;
            font-size: 14px;
            cursor: pointer;
            transition: background 0.3s, color 0.3s;
        }

        /* Bed Status Styling */
        .bed-list .available {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .bed-list .occupied {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .bed-list .pending {
            background: #fff3cd;
            color: #856404;
            border: 1px solid #ffeeba;
        }

        .bed-list li:hover {
            filter: brightness(0.9);
        }

        /* Mobile Responsiveness */
        @media (max-width: 768px) {
            .room-card {
                width: 100%;
            }

            .bed-list {
                grid-template-columns: repeat(auto-fit, minmax(80px, 1fr));
            }
        }
    </style>

        <div class="header-logo">
            <img src="../images/logo1.jpg" alt="Logo" class="logo">
            <h1>HỆ THỐNG KÝ TÚC XÁ<br>TRƯỜNG ĐẠI HỌC NGÂN HÀNG TP.HCM</h1>
        </div>
    </header>

    <!-- Navigation Bar -->
    <nav class="navbar">
        <a href="../index.php" class="navbar-link">
            <img src="../images/nha2.jpg" alt="Trang chủ">
            <span>TRANG CHỦ</span>
        </a>
    </nav>

    <!-- Main Content -->
    <div class="main-content">
    <!-- Dropdown Filters -->
    <div class="filters">
        <?php
        $listlp= loadall_loaiphong();
        $listp = loadall_phong();
        $listgiuong= load_bed_info();
        ?>
    <form>
    <select name="selected_khu">
        <option value="">- Khu -</option>
        <option value="A">Khu A</option>
        <option value="B">Khu B</option>
    </select>
    <select name="selected_loaiphong">
        <option value="">- Loại phòng -</option>
        <option value="Phòng 4 người">Phòng 4 người</option>
        <option value="Phòng 8 người">Phòng 8 người</option>
    </select>
        <button style="float:right" type="submit" name="filter_rooms">Lọc Phòng</button>
    </form>
    </div>
    <?php
    if (isset($_GET['filter_rooms'])) {
        $selected_khu = $_GET['selected_khu'];
        $selected_loaiphong = $_GET['selected_loaiphong'];
        if (empty($selected_khu) || empty($selected_loaiphong)) {
            echo "Vui lòng chọn khu vực và loại phòng.";
        } else {
            // Truy vấn danh sách phòng và giường dựa vào khu và loại phòng
            $filteredRooms = load_bed($selected_khu, $selected_loaiphong);

        
            if (!empty($filteredRooms)) {
                $rooms = []; // Mảng để lưu các phòng đã xử lý, tránh lặp
                echo '<div class="room-info">';
                foreach ($filteredRooms as $room) {
                    $room_id = $room['room_id'];
                    // Nếu phòng chưa được xử lý
                    if (!isset($rooms[$room_id])) {
                        $rooms[$room_id] = true; // Đánh dấu phòng đã được xử lý
                        echo '<div class="room-card">';
                        echo '<div class="room-floor">Tầng ' . $room['Tang'] . '</div>';
                        echo '<h3>' . $room['TenPhong'] . ' - ' . $room['TenLoaiPhong'] . '</h3>';

                        $beds = load_beds_in_room($room_id);
                        if (!empty($beds)) {
                            echo '<ul class="bed-list">';
                            foreach ($beds as $bed) {
                                $statusClass = '';
                                $statusText = '';

                                // Đặt class và text dựa trên trạng thái giường
                                if ($bed['giuong_status'] == 0) {
                                    $statusClass = 'occupied';
                                    $statusText = 'Đã có người ở';
                                } elseif ($bed['giuong_status'] == 1) {
                                    $statusClass = 'available';
                                    $statusText = 'Chưa có sinh viên ở';
                                } else {
                                    $statusClass = 'pending';
                                    $statusText = 'Đang chờ';
                                }

                                // Hiển thị giường
                                echo '<li class="' . $statusClass . '" onclick="registerBed(\'' . $bed['MaGiuong'] . '\', \'' . $statusClass . '\')">' .
                                    '<span>Giường ' . $bed['MaGiuong'] . ' - ' . $statusText . '</span>' .
                                    '</li>';
                            }
                            echo '</ul>';
                        } else {
                            echo '<p>Không có giường nào trong phòng này.</p>';
                        }
                        echo '</div>';
                    }
                }
                echo '</div>';
            } else {
                echo '<p>Không có phòng nào phù hợp với lựa chọn.</p>';
            }
        }
}
?>

</div>
    <!-- Room Information -->
    <script>
    function registerBed(MaGiuong, status) {
    // Kiểm tra trạng thái của giường
    if (status === 'occupied' || status === 'pending') {
                let message = (status === 'occupied') ? 'Giường này đã có người ở. Xin hãy chọn giường khác!' : 'Giường này đang chờ.';
                alert(message); // Hiển thị thông báo
                return; // Ngăn không cho chuyển trang
            }
        // Lưu giường vào sessionStorage
        sessionStorage.setItem('selectedBedId', MaGiuong); 
        
        // Chuyển đến trang tiếp theo
        window.location.href = `dk2.php?bed_id=${MaGiuong}`;
    }
</script>
