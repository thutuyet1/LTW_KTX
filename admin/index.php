<?php 
    include "../model/pdo.php";
    include "../model/loaiphong.php";
    include "../model/phong.php";
    include "../model/giuong.php";
    include "../model/dn.php";
    include "../model/btrisc.php";
    include "../model/hoso.php";
    include "header.php";
    
    
    if(isset($_GET['act'])){
        $act = $_GET['act'];
        switch($act)
        {
            case 'addp':
                if(isset($_POST['themmoi'])&&($_POST['themmoi'])){
                    $maphong = $_POST['maphong'];
                    $tenphong = $_POST['tenphong'];
                    $tang = $_POST['tang'];
                    $FK_LoaiPhong = $_POST['FK_LoaiPhong'];
                    Insert_phong($maphong, $tang, $tenphong, $FK_LoaiPhong);   
                    $thongbao = "Thêm thành công";
                }
                $listlp= loadall_loaiphong();
                include "phong/add.php";
                break;
            case 'listphong':
                $sql = "SELECT 
                    p.MaPhong,
                    lp.TenLoaiPhong AS LoaiPhong,
                    CASE 
                        WHEN COUNT(sv.MSSV) > 0 THEN 'Có sinh viên'
                        ELSE 'Trống'
                    END AS TrangThai,
                    COUNT(sv.MSSV) AS SoNguoiO,
                    lp.TienPhong 
                FROM Phong p
                INNER JOIN LoaiPhong lp ON p.FK_LoaiPhong = lp.MaLoaiPhong
                LEFT JOIN SinhVien sv ON p.MaPhong = sv.FK_phong
                GROUP BY p.MaPhong, p.TenPhong, lp.TenLoaiPhong, lp.TienPhong";
                $dsphong = pdo_query($sql);
                include "phong/list.php";
                break;
            case 'listdn':
                $listdn = loadall_dn();
                include "diennuoc/list.php";
                break;
            case 'suadn':
                if(isset($_GET['MaDienNuoc'])&&($_GET['MaDienNuoc'])){
                $sql = "select * from diennuoc where MaDienNuoc =".$_GET['MaDienNuoc'];
                $dn = pdo_query_one($sql);
                }
                include "diennuoc/update.php";
                break;
            case 'duyetbt':
                if(isset($_GET['MaSuaChua'])&&($_GET['MaSuaChua'])){
                    $MaSuaChua = $_GET['MaSuaChua'];    
                     
                    $sqlUpdate = "UPDATE baotrisuachua SET status = 1 WHERE MaSuaChua = :MaSuaChua";
                    
                    $updateStatus = pdo_execute_dn($sqlUpdate, [':MaSuaChua' => $MaSuaChua]);
                    // Kiểm tra kết quả và thông báo
                    echo "<script>
                        alert('Duyệt xử lý thành công!');
                        window.location.href = 'indexx.php?act=qlbaotri';
                        </script>";
                    exit();
                } else {
                    echo "Yêu cầu không hợp lệ.";
                }
                $listbtrisc =loadall_btrisc();
                include "baotri/list.php";
                break;
                
            case 'updatedn':
                if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
                $ChiSoDienCuoi = floatval($_POST['ChiSoDienCuoi']);
                $ChiSoNuocCuoi = floatval($_POST['ChiSoNuocCuoi']);
                $MaDienNuoc = $_POST['MaDienNuoc'];
                $ChiSoDienDau = floatval($_POST['ChiSoDienDau']);  // Lấy giá trị chỉ số đầu điện
                $ChiSoNuocDau = floatval($_POST['ChiSoNuocDau']);  // Lấy giá trị chỉ số đầu nước
                // Tính toán SuDungDien và SuDungNuoc
                $SuDungDien = $ChiSoDienCuoi - $ChiSoDienDau;
                $SuDungNuoc = $ChiSoNuocCuoi - $ChiSoNuocDau;
                $sql = "update diennuoc set 
                ChiSoDienCuoi = '".$ChiSoDienCuoi."',
                ChiSoNuocCuoi = '".$ChiSoNuocCuoi."',
                SuDungDien = '".$SuDungDien."',
                SuDungNuoc = '".$SuDungNuoc."'
                where MaDienNuoc =".$MaDienNuoc;
                pdo_execute($sql);
                }
                $listdn = loadall_dn();
                include "diennuoc/list.php";
                break;
                
            case 'adddn':
                if(isset($_POST['luudn'])&&($_POST['luudn'])){
                    $chisodiencuoi = $_POST['ChiSoDienCuoi'];
                    $chisonuoccuoi = $_POST['ChiSoNuocCuoi'];
                    $khu = $_POST['khu'];
                    $tang = $_POST['tang'];
                    $FK_LoaiPhong = $_POST['FK_LoaiPhong'];
                    insert_phong($maphong, $khu, $tang, $tenphong, $FK_LoaiPhong);   
                    $thongbao = "Thêm thành công";
                }
            case 'qldangky':
                $listhoso = loadall_hoso();
                include "xldky/list.php";
                break;
            case 'xemhoso':
                if(isset($_GET['mssv'])&&($_GET['mssv'])){
                    $mssv = $_GET['mssv'];
                    $sql = "SELECT * FROM hoso WHERE mssv = ?";
                    $hosoid = pdo_query($sql, $mssv);
                    }
                    include "xldky/xemhoso.php";
                    break;
            case 'duyethoso':
                if(isset($_GET['mssv'])&&($_GET['mssv'])){
                    $mssv = $_GET['mssv']; // Lấy mã số sinh viên từ URL
                    // Truy vấn thông tin từ bảng hoso
                    $query = "SELECT * FROM hoso WHERE mssv = :mssv";
                    $result = pdo_query_one_btri($query, [':mssv' => $mssv]);
                    if ($result) {
                        $MSSV = $result['mssv'];
                        $HoTen = $result['hoten'];
                        $SDT = $result['dienthoai'];
                        $GioiTinh = $result['gioitinh'];
                        $NgaySinh = $result['ngaysinh'];
                        $Email = $result['email'];
                        $DiaChi  = $result['diachi'];
                        $QueQuan = $result['noisinh'];
                        $CCCD= $result['cccd'];
                        $FK_phong = $result['FK_maphong'];
                        $FK_giuong = $result['FK_magiuong'];
                        $thoigiandk = $result['thoigiandk'];
                        $pass = $result['mssv'];
                        $role= '0';

                            $queryTienPhong = "
                            SELECT lp.TienPhong
                            FROM Phong p
                            JOIN LoaiPhong lp ON p.FK_LoaiPhong = lp.MaLoaiPhong
                            WHERE p.MaPhong = :FK_phong";
                            $tienPhongResult = pdo_query_one_btri($queryTienPhong, [':FK_phong' => $FK_phong]);
                            if ($tienPhongResult) {
                            $TienPhong = $tienPhongResult['TienPhong'];
                            $tongTien = $thoigiandk * $TienPhong; // Tính tổng tiền lệ phí
                        insert_sv($MSSV, $HoTen, $SDT, $GioiTinh, $NgaySinh, $Email, $DiaChi,  $QueQuan, $CCCD, $FK_phong, $FK_giuong, $thoigiandk, $pass, $role);
                        
                        $insertHoaDonQuery = "
                                INSERT INTO hdlephi (MaLePhi_status, FK_sv, total)
                                VALUES (0, :mssv, :total)";
                        pdo_execute_dn($insertHoaDonQuery, [
                            ':mssv' => $MSSV,
                            ':total' => $tongTien
                        ]);
        
                            $deleteQuery = "DELETE FROM hoso WHERE mssv = :mssv";
                            pdo_execute_dn($deleteQuery, [':mssv' => $mssv]);

                            // Hiển thị thông báo và chuyển hướng
                            echo "<script>
                                alert('Duyệt hồ sơ thành công!');
                                window.location.href = 'indexx.php?act=qldangky';
                            </script>";
                            exit();
                            } else {
                                echo "Không tìm thấy thông tin tiền phòng.";
                            }
                        } else {
                            echo "Không tìm thấy thông tin sinh viên trong bảng hoso.";
                        }
                    } else {
                        echo "MSSV không hợp lệ.";
                    }

                    include "xldky/list.php";
                    break;
            case 'tuchoihoso':
                if(isset($_GET['mssv'])&&($_GET['mssv'])){
                    $mssv = $_GET['mssv'];
                    $deleteQuery = "DELETE FROM hoso WHERE mssv = :mssv";
                    pdo_execute_dn($deleteQuery, [':mssv' => $mssv]);

                    // Hiển thị thông báo và chuyển hướng
                    echo "<script>
                        alert('Từ chối hồ sơ thành công!');
                        window.location.href = 'indexx.php?act=qldangky';
                    </script>";
                    exit();
                }
                break;
            case 'qlbaotri':
                $listbtrisc =loadall_btrisc();
                include "baotri/list.php";
                break;
            
            default:
                include "home.php";
                break;
        }
    }
    else
    {
        include "home.php";
    }

    include "footer.php";

?>
