<?php
function loadall_tgian(){
    $sql = "select * from thoigian";
    $listthoigian = pdo_query($sql);
    return $listthoigian;
}

?>