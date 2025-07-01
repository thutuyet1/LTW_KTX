<?php
function loadall_dn(){
    $sql = "select * from diennuoc";
    $listdn = pdo_query($sql);
    return $listdn;
}

function loadall_hddn(){  
    if (isset($_SESSION['phong'])) {
    $phong = $_SESSION['phong'];
    $sql = "SELECT * FROM hddiennuoc 
                WHERE FK_diennuoc IN (SELECT MaDienNuoc FROM diennuoc WHERE FK_Phong = '$phong')";
        $listhddn = pdo_query($sql);
        return $listhddn;
}
}

function update_ttoanhddn($MaHDdiennuoc, $pttt, $NgayThanhToanDN) {
    $sql = "UPDATE hddiennuoc 
            SET pttt = ?, NgayThanhToanDN = ?
            WHERE MaHDdiennuoc = ?";
    pdo_execute_dn($sql, [$pttt, $NgayThanhToanDN, $MaHDdiennuoc]);
}

function get_fk_dn_by_dn($FK_diennuoc) {
    $sql = "SELECT count(*) FROM diennuoc WHERE MaDienNuoc = ?";
    $result = pdo_query_one_btri($sql, [$FK_diennuoc]); // Truy vấn với tham số

    // Kiểm tra và trả về giá trị FK_phong, nếu không có thì trả về null
    return $result > 0;
}
function update_hddn($MaHDdiennuoc, $pttt, $ngaythanhtoan) {
    $sql = "UPDATE hddiennuoc 
            SET pttt = ?, NgayThanhToan = ?, HD_status = 1
            WHERE MaHDdiennuoc = ?";
    pdo_execute_dn($sql, [$pttt, $ngaythanhtoan, $MaHDdiennuoc]);
}
?>