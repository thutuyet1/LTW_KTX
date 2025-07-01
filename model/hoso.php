<?php
function loadall_hoso(){
    $sql = "select * from hoso";
    $listhoso = pdo_query($sql);
    return $listhoso;
}
function insert_sv($MSSV, $HoTen, $SDT, $GioiTinh, $NgaySinh, $Email, $DiaChi,  $QueQuan, $CCCD, $FK_phong, $FK_giuong, $thoigiandk, $pass, $role) {
    $sql = "INSERT INTO sinhvien (MSSV, HoTen, SDT, GioiTinh, NgaySinh, Email, DiaChi, QueQuan, CCCD, FK_phong, FK_giuong, thoigiandk, pass, role)
                    VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    pdo_execute_dn($sql, [$MSSV, $HoTen, $SDT, $GioiTinh, $NgaySinh, $Email, $DiaChi,  $QueQuan, $CCCD, $FK_phong, $FK_giuong, $thoigiandk, $pass, $role]);
}
?>