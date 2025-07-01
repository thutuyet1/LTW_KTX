<?php 
session_start();
 include "../model/pdo.php";
 include "../model/taikhoan.php";
 include "../model/loaiphong.php";
 include "../model/giuong.php";
 include "../model/phong.php";
 include "../model/thoigian.php";

 if (isset($_GET['bed_id']) && !empty($_GET['bed_id'])) {
    $bedId = htmlspecialchars($_GET['bed_id']); // Lấy giá trị và bảo vệ chống XSS
} 

// Kiểm tra và lấy thông tin danh sách thời gian
$listthoigian = loadall_tgian();

?>
<html lang="vi">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Đăng Ký Ký Túc Xá</title>
        <link rel="stylesheet" href="style.css">
    
        <style>
            body {
                margin: 0;
                padding: 0;
                font-family: Arial, sans-serif;
                background: url('../images/hinhnen.jpg') no-repeat center center fixed; /* Ảnh nền */
                background-size: cover;
                color: #333;
                }

            header {
                display: flex;
                align-items: center;
                justify-content: center;
                color: white;
                padding:5px 10px;
                height: auto;
            }

            .header-logo {

                display: flex;
                align-items: center;
                gap: 15px;
            }

            .header-logo .logo {
                width: 100px; 
                height: auto; 
                margin-right: 10px;
            }

            .header-text {
                flex: 1; 
                text-align: center; 
            }

            .header-text h1 {
                margin: 0; 
                font-size: 24px; 
                color: #004080; 
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
            
            .form-container {
                margin: 50px;
                padding: 20px;
                background-color: rgba(255, 255, 255, 0.9);
                border-radius: 10px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
                display: grid;
                grid-template-columns: repeat(3,auto);

            }

            .form-column {
                flex: 1;
                margin: 0 auto;
                width: 300px;
            }

            label {
                display: block;
                font-weight: bold;
                margin-bottom: 3px;
                font-size: 16px;
                cursor: pointer;
                margin-right: 15px;
            }

            input, select {
                width: 100%;
                padding: 8px;
                margin-bottom: 10px;
                border: 1px solid #ccc;
                border-radius: 5px;
            }

            .form-section {
                text-align: center;
                margin: 20px 0;
            }

            #ho_so_uu_tien {
                padding: 8px;
                border: 1px solid #ccc;
                border-radius: 5px;
                font-size: 14px;
            }

            .form-buttons {
                display: flex;
                justify-content: center; 
                align-items: center;
                gap: 20px; 
            }

            .file-note {
                font-size: 14px;
                color: #555;
                margin-top: 5px;
            }

            h3 {
                color: #2b4aa3;
                font-size: 18px;
                font-weight: bold;
                margin-bottom: 15px;
            }

            .btn-back, .btn-submit {
                background-color: #a83232; 
                color: white; 
                padding: 10px 20px; 
                border: none; 
                border-radius: 5px;
                cursor: pointer; 
                font-size: 16px; 
                width: 100px; 
                height: 50px;
                text-align: center; 
                line-height: 1.5; 
            }

            .btn-submit {
                background-color: #2b4aa3; 
            }  
        </style>
    </head>
    <body>
        <!-- Header -->
        <header>
            <div class="header-logo">
                <img src="../images/logo1.jpg" alt="Logo" class="logo">
            </div>
            <div class="header-text">
                <h1>HỆ THỐNG KÝ TÚC XÁ<br>TRƯỜNG ĐẠI HỌC NGÂN HÀNG TP.HCM</h1>
            </div>
        </header>

        <!-- Thanh menu -->
        <nav class="navbar">
            <a href="../index.php" class="navbar-link">
            <img src="../images/nha2.jpg" alt="Trang chủ">
            <span>TRANG CHỦ</span>
            </a>
        </nav>

        <!-- Form đăng ký -->
        <form action="dk2.php" method="POST">
               
            <input type="hidden" name="bed_id" value="<?php echo $bedId ?? ''; ?>">
                <!-- Bố cục chia thành các cột -->
                <div class="form-container">
                    <div class="form-column">
                        <label for="mssv">MSSV (*)</label>
                        <input type="text" id="mssv" name="mssv" required>
                    </div>
                    <div class="form-column">
                        <label for="hoten">Họ và Tên</label>
                        <input type="text" id="hoten" name="hoten">
                    </div>
                    <div class="form-column">
                        <label for="ngay_sinh">Ngày sinh</label>
                        <input type="date" id="ngay_sinh" name="ngay_sinh">
                    </div>
                    <div class="form-column">
                        <label for="dia_chi">Địa chỉ</label>
                        <input type="text" id="dia_chi" name="dia_chi">
                    </div>
                    <div class="form-column">
                        <label for="noi_sinh">Nơi sinh</label>
                        <input type="text" id="noi_sinh" name="noi_sinh">
                    </div>
                    <div class="form-column">
                        <label for="dien_thoai">Điện thoại liên hệ</label>
                        <input type="text" id="dien_thoai" name="dien_thoai">
                    </div>
                    <div class="form-column">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email">
                    </div>
                    <div class="form-column">
                        <label for="khoa">Khóa</label>
                        <input type="text" id="khoa" name="khoa">
                    </div>
                    <div class="form-column">
                        <label for="dien_thoai_phu_huynh">Điện thoại phụ huynh</label>
                        <input type="text" id="dien_thoai_phu_huynh" name="dien_thoai_phu_huynh">
                    </div>
                    <div class="form-column">
                        <label for="cccd">CCCD</label>
                        <input type="text" id="cccd" name="cccd">
                    </div>
                    <div class="form-column">
                        <label for="gioi_tinh">Giới tính</label>
                        <input type="text" id="gioi_tinh" name="gioi_tinh">
                    </div>
                    <div class="form-column">
                        <label for="he_dao_tao">Hệ đào tạo</label>
                        <input type="text" id="he_dao_tao" name="he_dao_tao">
                    </div>
                    <div class="form-column">
                        <label for="dan_toc">Dân tộc</label>
                        <input type="text" id="dan_toc" name="dan_toc">
                    </div>
                    <div class="form-column">
                        <label for="lop">Lớp</label>
                        <input type="text" id="lop" name="lop">
                    </div>
                    <div class="form-column">
                        <label for="ho_so_uu_tien">Hồ sơ ưu tiên</label>
                        <input type="file" id="ho_so_uu_tien" name="ho_so_uu_tien" accept=".pdf" style="width:70%;">
                        <p class="file-note"><i>(Định dạng file PDF, kích thước từ 500KB đến 5MB)</i></p>
                    </div>
                </div>

            <!-- Đăng ký thời gian -->
            <div class="form-section">
                <h3>Đăng ký thời gian năm học 2024 - 2025</h3>
                <?php if (!empty($listthoigian)) {
                        foreach ($listthoigian as $listtg) {
                        extract($listtg); ?>
                        <input type="radio" name="thoigiandk" value="<?php echo $listtg['thoigiandk']; ?>"> Đến ngày <?php echo $listtg['den_ngay']; ?>
                    <?php            }
                            } else {
                                echo 'Không có dữ liệu thời gian đăng ký.';
                            } 
                ?>
            </div>
            <!-- Nút chức năng -->
            <div class="form-buttons">
                <button type="button" class="btn-back">Quay về</button>
                <input type="submit" class="btn-submit" name="dk" Value = "Đăng ký">
            </div>
        </form>

        <?php
            if(isset($_POST['dk'])){
                if (empty($_POST['thoigiandk'])) {
                    echo "Vui lòng chọn thời gian đăng ký!";
                } else {
                    $thoigiandk = $_POST['thoigiandk'];
                    // Các xử lý khác của form
                }  
                if (isset($_POST['bed_id']) && !empty($_POST['bed_id'])) {
                    $bedId = htmlspecialchars($_POST['bed_id']);
                    
                    // Tiếp tục xử lý đăng ký với $bedId
                } else {
                    echo "Mã giường không được truyền!";
                }
                    
                    $thoigiandk = $_POST['thoigiandk']; 
                    $mssv = $_POST["mssv"];
                    $hoten = $_POST["hoten"];  
                    $ngaysinh = $_POST["ngay_sinh"];
                    $diachi = $_POST["dia_chi"];
                    $noisinh = $_POST["noi_sinh"];
                    $dienthoai = $_POST["dien_thoai"];
                    $email = $_POST["email"];
                    $khoa = $_POST["khoa"];
                    $dtph = $_POST["dien_thoai_phu_huynh"];
                    $cccd = $_POST["cccd"];
                    $gioitinh = $_POST["gioi_tinh"];
                    $hedaotao = $_POST["he_dao_tao"];
                    $dantoc = $_POST["dan_toc"];
                    $lop = $_POST["lop"];
                    $hsut = null; // Mặc định giá trị là NULL
                if (isset($_FILES['ho_so_uu_tien']) && $_FILES['ho_so_uu_tien']['error'] === UPLOAD_ERR_OK) {
                    $file_tmp = $_FILES['ho_so_uu_tien']['tmp_name'];
                    $file_name = $_FILES['ho_so_uu_tien']['name'];
                    $file_size = $_FILES['ho_so_uu_tien']['size'];

                    // Kiểm tra kích thước file
                    if ($file_size >= 500 * 1024 && $file_size <= 5 * 1024 * 1024) {
                        $upload_dir = 'uploads/';
                        if (!is_dir($upload_dir)) {
                            mkdir($upload_dir, 0777, true);
                        }
                        $file_path = $upload_dir . basename($file_name);
                        if (move_uploaded_file($file_tmp, $file_path)) {
                            $hsut = $file_name; // Lưu tên file vào cơ sở dữ liệu
                        }
                    } else {
                        echo "Kích thước file không hợp lệ (500KB - 5MB).";
                        exit;
                    }
                }
                if ($bedId) {
                    // Tìm mã phòng tương ứng với mã giường
                    $sql = "SELECT room_id FROM giuong WHERE MaGiuong ='$bedId'";
                    $maphong = pdo_query_one_btri($sql);
                    $Phong_id = $maphong['room_id'];
            
                    if ($Phong_id) {
                        insert_hoso($mssv, $hoten, $ngaysinh, $diachi, $noisinh, $dienthoai, $email, $khoa, $dtph, $cccd, $gioitinh, $hedaotao, $dantoc, $lop, $hsut, $thoigiandk, $bedId, $Phong_id);
                        $thongbao = "Thêm thành công";
                    } 
                    else {
                        echo "Không tìm thấy phòng tương ứng với mã giường.";
                    }
                } else {
                    echo "Mã giường không hợp lệ!";
                }
                
                if (isset($_POST['bed_id'])) {
                    $bedId = $_POST['bed_id'];
                    
                    // Cập nhật trạng thái giường là "đã đăng ký"
                    $result = update_bed_status($bedId, '1');
                    echo "<script>
                        alert('Đăng ký thành công!');
                        window.location.href = '../index.php';
                    </script>"; // Cập nhật trạng thái giường
                }
            }
        ?>
