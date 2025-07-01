<?php
function checkuser($user, $pass)
{
    $sql = "select * from taikhoan where username = '".$user."'AND password = '".$pass."'";
    $tk = pdo_query($sql);
    return $tk[0]['FK_role'];
}

function role_user(){
    $sql = "select * from taikhoan where FK_role = '".$role."'";
    $taikhoan = pdo_query($sql);
    return $taikhoan;
}


?>