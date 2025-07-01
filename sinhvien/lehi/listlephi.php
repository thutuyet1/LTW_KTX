<div class = "row">
    <div class = "row frmtitle">
        <h1> Hóa đơn lệ phí </h1>
    </div>
    <div class = "row frmcontent">

        <div class = "row mb10 frmdsphong">
            <table class = "tabledn" border = 1>
                <tr>
                    <th>Mã Biên Lai</th>
                    <th>Tên Phòng</th>
                    <th>Thời gian đăng ký (Tháng)</th>
                    <th>Tổng Cộng</th>
                    <th>Thông tin thanh toán</th>
                </tr>
                <?php
                foreach($hoaDonLePhi as $lishdlephi){
                extract($lishdlephi);
                
                    echo '<tr>
                            <td>' . $lishdlephi['MaLePhi'] . '</td>
                            <td>' . $lishdlephi['TenLoaiPhong'] . '</td> 
                            <td>' . $lishdlephi['thoigiandk'] . '</td>
                            <td>' . $lishdlephi['TongTien'] . '</td>
                            <td>
                                <span style="color: ' . ($lishdlephi['MaLePhi_status'] == 0 ? 'red' : 'green') . ';">' . 
                                ($lishdlephi['MaLePhi_status'] == 0 ? 'CHƯA THANH TOÁN' : 'ĐÃ THANH TOÁN') . 
                                '</span>
                            </td>
                        </tr>';
                }
                ?>
            </table>
            <div class = "button" style="text-align: right">
            <a class = "tao" href="index.php?act=ttlephi">
            <input type ="button" value = "Thanh Toán"style="background-color: #a81c29; margin-top: 5px; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; font-weight: bold;"></a>
            
            </div>
        
        </div>
        
    </div>
    