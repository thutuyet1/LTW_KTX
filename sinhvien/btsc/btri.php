<div class = "row">
    <div class = "row frmtitle">
        <h1> Bảo trì sửa chữa </h1>
    </div>
    <div class = "row frmcontent">

        <div class = "row mb10 frmdsphong">
            <table class = "tabledn" border = 1>
                <form method="POST" action="index.php?act=baotri" style="margin-bottom: 30px;">
                    <div class="form-group" style="margin-bottom: 20px;">
                        <label for="noi_dung" style="font-size: 16px; font-weight: bold; color: #333;">Nội dung bảo trì:</label>
                        <input type="text" name="noi_dung" class="noi_dung" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; margin-top: 5px;">
                    </div>
                    <input type="submit" name="gui" value = "Gửi" style="background-color: #a81c29; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; font-weight: bold;">
                </form>
            <h3 style=" font-size: 16px; font-weight: bold; margin-bottom: 0px; margin-top: 40px; ">Danh sách yêu cầu:</h3>
            <table class="tabledn" border="1" style="width: 100%; margin-top: 0px; border-collapse: collapse; background-color: white; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);">
                    <tr>
                        <th>Ngày gửi yêu cầu</th>
                        <th>Tên phòng</th>
                        <th>Nội dung sửa chữa</th>
                        <th>Trạng thái</th>
                    </tr>
                <?php
                if (empty($listbtrisc)) {
                    echo '<tr><td colspan="4">Không có yêu cầu sửa chữa</td></tr>';
                } else {
                foreach($listbtrisc as $listbtsc)
                {
                    echo '<tr>
                            <td>' . $listbtsc['NgayGuiYeuCau'] . '</td>
                            <td>' . $listbtsc['TenPhong'] . '</td>
                            <td>' . $listbtsc['NoiDung'] . '</td>
                            <td>  <span style="color: ' . ($listbtsc['TrangThai'] == 'CHƯA SỬA CHỮA' ? 'red' : 'green') . ';">
                                    ' . ($listbtsc['TrangThai'] == 1 ? 'ĐÃ SỬA CHỮA' : 'CHƯA SỬA CHỮA') . '
                                </span>
                            </td>
                        </tr>';
                    
                }
            }
                ?>
            </table>
            </div>
        
        </div>
        
    </div>