<?php
function Insert_phong($maphong, $tang, $tenphong, $FK_LoaiPhong){
    $sql = "insert into phong(MaPhong,Tang,TenPhong, FK_LoaiPhong) values('$maphong', '$tang', '$tenphong','$FK_LoaiPhong')";
    pdo_execute($sql);
    
}
function loadall_phong(){
    $sql = "select * from phong";
    $listp = pdo_query($sql);
    return $listp;
}

            
?>