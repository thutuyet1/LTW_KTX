<div class = "row">
<div class = "row frmtitle">
        <h1>Danh sách hồ sơ</h1>
    </div>
    <div class = "row frmcontent">

        <div class = "row mb10 frmdsphong">
        <table class = "tabledn" border = 1>
                <tr>
                    <th>Phòng</th>
                    <th>Lớp</th>
                    <th>Hành Động</th>
                </tr>
                <?php
                foreach($listhoso as $dshoso){
                extract($dshoso);
                $xemhoso = "indexx.php?act=xemhoso&mssv=".$mssv;
                $duyethoso = "indexx.php?act=duyethoso&mssv=".$mssv;
                $tuchoihoso = "indexx.php?act=tuchoihoso&mssv=".$mssv;
                    echo '<tr>
                            <td>' . $dshoso['FK_maphong'] . '</td>
                            <td>' . $dshoso['lop'] . '</td>
                            <td><a href = "'.$xemhoso.'"><input type = "button" value = "Xem"></a>
                            <a href = "'.$duyethoso.'"><input type = "button" value = "Duyệt"></a>
                            <a href = "'.$tuchoihoso.'"><input type = "button" value = "Từ chối"></a>
                            </td>
                        </tr>';
                }
            
                ?>
                </table>
                