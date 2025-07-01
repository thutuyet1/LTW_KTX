<?php
include "../../model/pdo.php";
include "../../model/dn.php";

$now = (new DateTime('now', new DateTimeZone('Asia/Ho_Chi_Minh')))->format('Y-m-d H:i:s');


if (isset($_GET['partnerCode'])){

   
    $partnerCode = $_GET['partnerCode'];
    $orderId = $_GET['orderId'];
    $amount = $_GET['amount'];
    $orderInfo = $_GET['orderInfo'];
    $orderType = $_GET['orderType'];
    $transId = $_GET['transId'];
    $payType = $_GET['payType'];
    $MaHDdiennuoc = $_GET['MaHDdiennuoc'] ?? null;
    
   
    $sql = "INSERT INTO ttmomo
    (partnerCode, orderId, amount, orderInfo, orderType, transId, pay_type)
    VALUE('".$partnerCode."','".$orderId."','".$amount."','".$orderInfo."','".$orderType."','".$transId."','".$payType."')";

    $insert_ttmomo = pdo_execute($sql);
    if ($insert_ttmomo === false) {
        echo "Lỗi khi lưu thông tin giao dịch.";
        exit();
    }

            $sqlUpdate = "UPDATE hddiennuoc 
        SET NgayThanhToanDN = :NgayThanhToanDN, 
            HD_status = 1, 
            pttt = 3";

         // In câu lệnh SQL để kiểm tra
        $update_hd = pdo_execute_dn($sqlUpdate, [
            ':NgayThanhToanDN' => $now,
            
        ]);
        echo 'THANH TOÁN THÀNH CÔNG';

} else {
    echo "Giao dịch MoMo ATM thất bại";
}

?>
