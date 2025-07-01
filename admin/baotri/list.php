<div class = "row">
    <div class = "row frmtitle">
        <h1> Bảo trì sửa chữa </h1>
    </div>
    <div class = "row frmcontent">

        <div class = "row mb10 frmdsphong">
            <table class = "tabledn" border = 1>
            <h3 style="margin-bottom: 0">Danh sách yêu cầu:</h3>
            <table border="1" style="margin-top:0">
                    <tr>
                        <th>Ngày gửi yêu cầu</th>
                        <th>Tên phòng</th>
                        <th>Nội dung sửa chữa</th>
                        <th>Trạng thái</th>
                        <th></th>
                    </tr>
                <?php
                if (empty($listbtrisc)) {
                    echo '<tr><td colspan="4">Không có yêu cầu sửa chữa</td></tr>';
                } else {
                foreach($listbtrisc as $listbtsc)
                {
                    extract($listbtsc);
                    $dsduyetbt = "indexx.php?act=duyetbt&MaSuaChua=".$MaSuaChua;
                    echo '<tr>
                            <td>' . $listbtsc['NgayGuiYeuCau'] . '</td>
                            <td>' . $listbtsc['TenPhong'] . '</td>
                            <td>' . $listbtsc['NoiDung'] . '</td>
                            <td> <span style="color: ' . ($listbtsc['TrangThai'] == 'CHƯA SỬA CHỮA' ? 'red' : 'green') . ';"> ' . $listbtsc['TrangThai'] .  '</span>
                            <td><a href = "'.$dsduyetbt.'"><input type = "button" value = "Duyệt"></a></td>
                        </tr>';
                    
                }
            }
                ?>
            </table>
            </div>
        
        </div>
        
    </div>