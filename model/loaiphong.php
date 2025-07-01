<?php
function loadall_loaiphong(){
    $sql = "select * from loaiphong";
    $listlp = pdo_query($sql);
    return $listlp;
}

?>