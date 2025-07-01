<?php 
    include "../model/pdo.php";
    include "../model/loaiphong.php";
    include "../model/phong.php";
    include "../model/giuong.php";
    include "../model/dn.php";
    include "../model/btrisc.php";
    include "../model/lephi.php";
   
    include_once "header.php";
  


    $sql =  "SELECT FK_phong FROM sinhvien WHERE MSSV = '$user'";
    $result = pdo_query_one($sql);
    if ($result) {
        $_SESSION['phong'] = $result['FK_phong'];  // Lưu mã phòng vào session
    }

    
    if(isset($_GET['act'])){
        $act = $_GET['act'];
        switch($act)
        {
            case 'hddn':
                $sql = "SELECT 
                hd.MaHDdiennuoc AS 'MaHDdiennuoc',
                dn.NgayThang AS 'NgayChotSo',
                hd.ChiSoDien AS 'ChiSoDien',
                hd.ChiSoNuoc AS 'ChiSoNuoc',
                hd.TongCong AS 'TongCong',
                hd.HD_status AS 'HD_status',
                CASE 
                    WHEN hd.HD_status = 0 THEN 'CHƯA THANH TOÁN' 
                    ELSE 'ĐÃ THANH TOÁN' 
                END AS 'Thông tin thanh toán'
                FROM sinhvien sv
                JOIN phong p ON sv.FK_phong = p.MaPhong
                JOIN diennuoc dn ON p.MaPhong = dn.FK_phong
                JOIN hddiennuoc hd ON dn.MaDienNuoc = hd.FK_diennuoc
                WHERE sv.MSSV = '$user'";
                $dshddn = pdo_query($sql);
                include "dnuoc/ttdn.php";
                break;
            case 'baotri':
                if(isset($_POST['gui'])&&($_POST['gui'])){
                    $noidung = $_POST['noi_dung'];
                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                    $ngayguiyeucau = date('Y-m-d H:i:s');
                    $FKSV = $_SESSION['username'];
                    $FKPhong = get_phong_by_sv($FKSV);
                    if (!empty($FKPhong)) {
                        insert_btrisc($ngayguiyeucau, $noidung,  $FKPhong, $FKSV);
                        $thongbao = "Thêm thành công";
                    } else {
                        $thongbao = "Không tìm thấy thông tin phòng của sinh viên!";
                    }
                    header("Location: index.php?act=baotri");
                    exit; // Dừng ngay việc thực hiện mã sau khi chuyển hướng
                }
                $listbtrisc =loadall_btrisc();
                include "btsc/btri.php";
                break;
            case 'listpttt':
                $dshddn = loadall_hddn();
                include "dnuoc/ttoandn.php";
                break;
            case 'thanhtoan':
                if(isset($_POST['MaHDdiennuoc'])&&($_POST['MaHDdiennuoc'])){
                    if(isset($_POST['dongythanhtoan'])&&($_POST['dongythanhtoan'])){
                        $MaHDdiennuoc = $_POST['MaHDdiennuoc'];
                        $pttt = $_POST['pttt'];
                        $NgayThanhToanDN = date('Y-m-d');
                        echo "MaHDdiennuoc: " . $MaHDdiennuoc . "<br>";
                        echo "pttt: " . $pttt . "<br>";
                        echo "NgayThanhToanDN: " . $NgayThanhToanDN . "<br>";
                        update_ttoanhddn($MaHDdiennuoc, $pttt, $NgayThanhToanDN);
                        echo 'Thanh toán thành công';
                        }
                    }
                    $dshddn = loadall_hddn();
                    include "dnuoc/ttoandn.php";
                    break;
            case 'ttlephi':
                if(isset($_POST['MaLePhi'])&&($_POST['MaLePhi'])){
                    if(isset($_POST['thanhtoanlephi'])&&($_POST['thanhtoanlephi'])){
                        $MaLePhi = $_POST['MaLePhi'];
                        $pttt = $_POST['pttt'];
                        
                        $sqlUpdate = "UPDATE hdlephi 
                            SET  
                                MaLePhi_status = 1, 
                                pttt = $pttt";
                            // In câu lệnh SQL để kiểm tra
                            $update_lephi = pdo_execute($sqlUpdate);
                            echo 'THANH TOÁN THÀNH CÔNG';
                            }
                        }
                    $dshddn = loadall_hddn();
                    include "dnuoc/ttoandn.php";
                    break;
            case 'momo':
               /*if(isset($_POST['MaHDdiennuoc'])&&($_POST['MaHDdiennuoc'])){
                    /*if(isset($_POST['momo'])&&($_POST['momo'])){
                                $MaHDdiennuoc = $_POST['MaHDdiennuoc'];*/
                                header('Content-type: text/html; charset=utf-8');
                                function execPostRequest($url, $data)
                                {
                                    $ch = curl_init($url);
                                    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                                    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                                    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                                            'Content-Type: application/json',
                                            'Content-Length: ' . strlen($data))
                                    );
                                    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
                                    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
                                    //execute post
                                    $result = curl_exec($ch);
                                    //close connection
                                    curl_close($ch);
                                    return $result;
                                }


                                $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";


                                $partnerCode = 'MOMOBKUN20180529';
                                $accessKey = 'klm05TvNBzhg7h7j';
                                $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
                                $orderInfo = "Thanh toán qua MoMo";
                                if (isset($_POST['MaHDdiennuoc']) && isset($_POST['tongtien'])) {
                                    $MaHDdiennuoc = $_POST['MaHDdiennuoc'];
                                    $amount = $_POST['tongtien'];
                                    $pttt = $_POST['pttt'];
                                } else {
                                    echo "Dữ liệu không hợp lệ.";
                                    exit();
                                }
                                $orderId = time() ."";
                                $redirectUrl = "http://localhost/qliktx/sinhvien/index.php?act=confirmtt.php";
                                $ipnUrl = "http://localhost/qliktx/sinhvien/index.php?act=confirmtt.php";
                                $extraData = "";


                                    $requestId = time() . "";
                                    $requestType = "captureWallet";
                                   $extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
                                    //before sign HMAC SHA256 signature
                                    $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
                                    $signature = hash_hmac("sha256", $rawHash, $secretKey);
                                    $data = array('partnerCode' => $partnerCode,
                                        'partnerName' => "Test",
                                        "storeId" => "MomoTestStore",
                                        'requestId' => $requestId,
                                        'amount' => $amount,
                                        'orderId' => $orderId,
                                        'orderInfo' => $orderInfo,
                                        'redirectUrl' => $redirectUrl,
                                        'ipnUrl' => $ipnUrl,
                                        'lang' => 'vi',
                                        'extraData' => $extraData,
                                        'requestType' => $requestType,
                                        'signature' => $signature);
                                        $result = execPostRequest($endpoint, json_encode($data));
                                        $jsonResult = json_decode($result, true);  // decode json
                                    //Just a example, please check more in there

                                    header('Location: ' . $jsonResult['payUrl']);
                            
            case 'atm':
              /* if(isset($_POST['MaHDdiennuoc'])&&($_POST['MaHDdiennuoc'])){*/
               /*     if(isset($_POST['atm'])&&($_POST['atm'])){ */
                        header('Content-type: text/html; charset=utf-8');
                        function execPostRequest($url, $data)
                        {
                            $ch = curl_init($url);
                            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                                    'Content-Type: application/json',
                                    'Content-Length: ' . strlen($data))
                            );
                            curl_setopt($ch, CURLOPT_TIMEOUT, 5);
                            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
                            //execute post
                            $result = curl_exec($ch);
                            //close connection
                            curl_close($ch);
                            return $result;
                        }


                        $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";


                        $partnerCode = 'MOMOBKUN20180529';
                        $accessKey = 'klm05TvNBzhg7h7j';
                        $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';

                        $orderInfo = "Thanh toán qua MoMo ATM";
                        
                        if (isset($_POST['MaHDdiennuoc'], $_POST['tongtien'], $_POST['pttt'])) {
                            $MaHDdiennuoc = $_POST['MaHDdiennuoc'];
                            $amount = $_POST['tongtien'];
                            $pttt = $_POST['pttt'];
                        } else {
                            echo "Dữ liệu không hợp lệ.";
                            exit();
                        }
                        $orderId = time() ."";
                        $redirectUrl = "http://localhost/qliktx/sinhvien/dnuoc/confirmtt.php";
                        $ipnUrl = "http://localhost/qliktx/sinhvien/dnuoc/confirmtt.php";
                        $extraData = "";

                            $requestId = time() . "";
                            $requestType = "payWithATM";
                            //$extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
                            //before sign HMAC SHA256 signature
                            $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
                            $signature = hash_hmac("sha256", $rawHash, $secretKey);
                            $data = array('partnerCode' => $partnerCode,
                                'partnerName' => "Test",
                                "storeId" => "MomoTestStore",
                                'requestId' => $requestId,
                                'amount' => $amount,
                                'orderId' => $orderId,
                                'orderInfo' => $orderInfo,
                                'redirectUrl' => $redirectUrl,
                                'ipnUrl' => $ipnUrl,
                                'lang' => 'vi',
                                'extraData' => $extraData,
                                'requestType' => $requestType,
                                'signature' => $signature);
    
                            
                            $result = execPostRequest($endpoint, json_encode($data));
                            $jsonResult = json_decode($result, true);  // decode json
                        
                            //Just a example, please check more in there

                            header('Location: ' . $jsonResult['payUrl']);
                                      
                    
            case 'hdlp':
                $hoaDonLePhi = loadall_lephi();
                include "lehi/listlephi.php";
                break;
        }
    }
        else{
            include "header.php";
        }
    