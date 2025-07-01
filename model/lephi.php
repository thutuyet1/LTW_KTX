<?php

function loadall_lephi(){  
    if (isset($_SESSION['username'])) {
    $user = $_SESSION['username'];
    $sql = "
            SELECT 
            lp.MaLePhi as MaLePhi,
            lph.TenLoaiPhong as TenLoaiPhong,
            s.thoigiandk as thoigiandk,
            lp.total as TongTien,
            lp.MaLePhi_status as MaLePhi_status
            FROM hdlephi lp
            INNER JOIN sinhvien s ON lp.FK_sv = s.MSSV
            INNER JOIN phong p ON s.FK_phong = p.MaPhong
            INNER JOIN loaiphong lph ON p.FK_LoaiPhong = lph.MaLoaiPhong
            WHERE s.MSSV = '$user'";
            $hoaDonLePhi = pdo_query($sql);
            return $hoaDonLePhi;
    }
}

function update_ttoanlephi($MaLePhi, $MaLePhi_status, $pttt) {
    $sql = "UPDATE hddiennuoc 
            SET pttt = ?, MaLePhi_status = ?
            WHERE MaLePhi = ?";
    pdo_execute_dn($sql, [$MaLePhi, $MaLePhi_status, $pttt]);
}
?>