<?php

function load_bed_info()
{
    $sql = "select * from giuong";
    $listgiuong = pdo_query($sql);
    return $listgiuong;
}
function load_bed($selected_khu, $selected_loaiphong) {
    $sql = "SELECT 
                g.MaGiuong,
                g.giuong_status,
                g.room_id,
                p.TenPhong,
                p.Tang,
                l.TenLoaiPhong,
                l.Khu
            FROM 
                phong p
            INNER JOIN 
                giuong g on p.MaPhong = g.room_id
            INNER JOIN 
                loaiphong l ON p.FK_LoaiPhong = l.MaLoaiPhong    
            WHERE 
                 l.Khu = :selected_khu
                AND l.TenLoaiPhong = :selected_loaiphong
            GROUP BY 
                p.MaPhong, g.MaGiuong";
    
    return pdo_query_all_btri($sql, [
        ':selected_khu' => $selected_khu,
        ':selected_loaiphong' => $selected_loaiphong
    ]);
}

function load_beds_in_room($room_id) {
    $sql = "SELECT * FROM giuong WHERE room_id = ?";
    return pdo_query($sql, $room_id);
}

function update_bed_status($bed_id, $status) {
    $sql = "UPDATE giuong SET giuong_status = ? WHERE MaGiuong = ?";
    return pdo_execute($sql, $status, $bed_id);
}

function insert_hoso($mssv, $hoten, $ngaysinh, $diachi, $noisinh, $dienthoai, $email, $khoa, $dtph, $cccd, $gioitinh, $hedaotao, $dantoc, $lop, $hsut, $thoigiandk, $bedId, $Phong_id) {
    $sql = "INSERT INTO hoso (mssv, hoten, ngaysinh, diachi, noisinh, dienthoai, email, khoa, dtph, cccd, gioitinh, hedaotao, dantoc, lop, hsut, thoigiandk, FK_magiuong, FK_maphong)
                    VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    pdo_execute_dn($sql, [$mssv, $hoten, $ngaysinh, $diachi, $noisinh, $dienthoai, $email, $khoa, $dtph, $cccd, $gioitinh, $hedaotao, $dantoc, $lop, $hsut, $thoigiandk, $bedId, $Phong_id]);
}
?>