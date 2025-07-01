<div class = "row">
<div class = "row frmtitle">
        <h1>Quản lý điện nước</h1>
    </div>
    <div class = "row frmcontent">

        <div class = "row mb10 frmdsphong">
        <table class = "tabledn" border = 1>
                <tr>
                    <th rowspan ="2"></th>
                    <th rowspan ="2">Phòng</th>
                    <th colspan="3">Điện</th>
                    <th colspan="3">Nước</th>
                    <th></th>
                </tr>
                <tr>
                    <th>Chỉ số đầu</th>
                    <th>Chỉ số cuối</th>
                    <th>Sử dụng</th>
                    <th>Chỉ số đầu</th>
                    <th>Chỉ số cuối</th>
                    <th>Sử dụng</th>
                    <th></th>
                </tr>
                <?php
                foreach($listdn as $dsdn){
                extract($dsdn);
                $suads = "indexx.php?act=suadn&MaDienNuoc=".$MaDienNuoc;
                
                    echo '<tr>
                            <td><input type="checkbox" name="MaDienNuoc[]" value="' . $dsdn['MaDienNuoc'] . '"
                        </td>
                            <td>' . $dsdn['FK_Phong'] . '</td>
                            <td>' . $dsdn['ChiSoDienDau'] . '</td>
                            <td>' . $dsdn['ChiSoDienCuoi'] . '</td>
                            <td>' . $dsdn['SuDungDien'] . '</td>
                            <td>' . $dsdn['ChiSoNuocDau'] . '</td>
                            <td>' . $dsdn['ChiSoNuocCuoi'] . '</td>
                            <td>' . $dsdn['SuDungNuoc'] . '</td>
                            <td><a href = "'.$suads.'"><input type = "button" value = "Sửa"></a></td>
                        </tr>';
                }
               
                ?>
                </table>
                <div class = "button">
                    <input type = "button" value = "Chọn tất cả"<?php echo 'id = "'.$dsdn['MaDienNuoc'].'"'?>>
                    
                </div>
                