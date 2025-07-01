<div class = "row">
    <div class = "row frmtitle">
        <h1> Hóa đơn điện nước </h1>
    </div>
    <div class = "row frmcontent">

        <div class = "row mb10 frmdsphong">
            <table class = "tabledn" border = 1>
                <tr>
                    <th>Mã Biên Lai</th>
                    <th>Ngày Chốt Sổ</th>
                    <th>Chỉ Số Điện</th>
                    <th>Chỉ Số Nước</th>
                    <th>Tổng cộng</th>
                    <th>Thông tin thanh toán</th>
                </tr>
                <?php
                foreach($dshddn as $lishddn)
                {
                    echo '<tr>
                            <td>' . $lishddn['MaHDdiennuoc'] . '</td>
                            <td>' . $lishddn['NgayChotSo'] . '</td> 
                            <td>' . $lishddn['ChiSoDien'] . '</td>
                            <td>' . $lishddn['ChiSoNuoc'] . '</td>
                            <td>' . $lishddn['TongCong'] . '</td>
                            <td>
                                <span style="color: ' . ($lishddn['HD_status'] == 0 ? 'red' : 'green') . ';">' . 
                                ($lishddn['HD_status'] == 0 ? 'CHƯA THANH TOÁN' : 'ĐÃ THANH TOÁN') . 
                                '</span>
                            </td>
                        </tr>';
                }
                ?>
            </table>
            <div class = "button" style="text-align: right">
            <a class = "tao" href="index.php?act=thanhtoan">
            <input type ="button" value = "Thanh Toán" style="background-color: #a81c29; margin-top: 5px; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; font-weight: bold;"></a>
      
            </div>
        
        </div>
        
    </div>
    