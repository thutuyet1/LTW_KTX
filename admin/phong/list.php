<html>
    <style>
       
        </style>
        </html>

<div class = "row">
    <div class = "row frmtitle">
        <h1 style="text-align: center; margin-bottom: 20px;"> Danh sách phòng </h1>
    </div>
    <div class = "row frmcontent">

        <div class = "row mb10 frmdsphong">
            <table border = 1>
                <tr>
                    <th>Mã Phòng</th>
                    <th>Tên Loại Phòng</th>
                    <th>Trạng Thái</th>
                    <th>Số Người Ở</th>
                    <th>Giá Phòng</th>
                </tr>
                <?php
                foreach($dsphong as $lisphong)
                {
                    echo '<tr>
                            <td>' . $lisphong['MaPhong'] . '</td>
                            <td>' . $lisphong['LoaiPhong'] . '</td>
                            <td>' . $lisphong['TrangThai'] . '</td>
                            <td>' . $lisphong['SoNguoiO'] . '</td>
                            <td>' . $lisphong['TienPhong'] . '</td>
                        </tr>';
                }
                ?>
            </table>
        </div>
        
    </div>
    
</div>
<a class = "tao" href="indexx.php?act=addp"><input type ="button" value = "Tạo" style="background-color: #004080; margin-top: 5px; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; font-weight: bold;"></a>