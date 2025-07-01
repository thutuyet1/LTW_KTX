<?php
function insert_btrisc($ngayguiyeucau, $noidung, $FKPhong, $FKSV){
    if (is_array($FKPhong)) {
        throw new Exception("FKPhong không hợp lệ. Giá trị phải là chuỗi hoặc số, không phải mảng.");
    }

    $sql = "insert into baotrisuachua(NgayGuiYeuCau, NoiDung, FKPhong, FKSV) values('$ngayguiyeucau','$noidung', '$FKPhong', '$FKSV')";
    return pdo_execute_return_lastInsertId($sql);
    
}
function get_phong_by_sv($FKSV) {
    $sql = "SELECT FK_phong FROM sinhvien WHERE MSSV = ?";
    $result = pdo_query_one_btri($sql, [$FKSV]); // Truy vấn với tham số

    // Kiểm tra và trả về giá trị FK_phong, nếu không có thì trả về null
    return $result ? $result['FK_phong'] : null;
}



function loadall_btrisc(){
    $sql = "select b.MaSuaChua, b.NgayGuiYeuCau, p.TenPhong as 'TenPhong', b.NoiDung, 
                CASE 
                    WHEN b.status  = 0 THEN 'CHƯA SỬA CHỮA' 
                    ELSE 'ĐÃ SỬA CHỮA' 
                END AS TrangThai
                FROM baotrisuachua b
                INNER JOIN phong p ON b.FKPhong = p.MaPhong";
    $listbtrisc = pdo_query($sql);
    return $listbtrisc;
}

function load_all_btsc()
{
    $sql = "select * from baotrisuachua";
    $listbtsc = pdo_query($sql);
    return $listbtsc;
}
            
?>