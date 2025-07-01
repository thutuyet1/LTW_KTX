<?php
    if(is_array($dn)){
        extract($dn);
        
    }
    
?>
<div class = "row">
<div class = "row frmtitle">
<h1>Cập nhật điện nước</h1> 
</div>

    
        <div class = "row mb10 frmdsphong">
    <form action = "indexx.php?act=updatedn" method= "POST">
    
        <table class = "tabledn" border = 1>
                <tr>
                    <th rowspan ="2"></th>
                    <th rowspan ="2">Phòng</th>
                    <th rowspan ="2"> Ngày tháng </th>
                    <th colspan="3">Điện</th>
                    <th colspan="3">Nước</th>
                </tr>
                <tr>
                    
                    <th>Chỉ số đầu</th>
                    <th>Chỉ số cuối</th>
                    <th>Sử dụng</th>
                    <th>Chỉ số đầu</th>
                    <th>Chỉ số cuối</th>
                    <th>Sử dụng</th>
                </tr>

                    <tr>
                        <td><input class = "inputdn" type = "checkbox" name = "MaDienNuoc" value="<?php if(isset($MaDienNuoc)&&($MaDienNuoc!="")) echo $MaDienNuoc ;?>" readonly></td>
                        <td><input class = "inputdn" type="text" name="MaPhong" value="<?php  if(isset($FK_Phong)&&($FK_Phong!="")) echo $FK_Phong ;?>" readonly></td>
                        <td><input class = "inputdn" type="date" name="ngaythang" value="<?php  if(isset($NgayThang)&&($NgayThang!="")) echo $NgayThang ;?>" readonly></td>
                        <td><input class = "inputdn" type="number" name="ChiSoDienDau" value="<?php  if(isset($ChiSoDienDau )&&($ChiSoDienDau!="")) echo $ChiSoDienDau  ;?>" readonly></td>
                        <td><input class = "inputdn" type = "number" name = "ChiSoDienCuoi" value="<?= $ChiSoDienCuoi ?>"></td>
                        <td><input class = "inputdn" type="number" name="SuDungDien" value="<?php  if(isset($SuDungDien)&&($SuDungDien!="")) echo $SuDungDien ;?>" readonly></td>
                        <td><input class = "inputdn" type="number" name="ChiSoNuocDau" value="<?php if(isset($ChiSoNuocDau)&&($ChiSoNuocDau!="")) echo $ChiSoNuocDau ;?>"readonly></td>
                        <td><input class = "inputdn" type="number" name="ChiSoNuocCuoi" value="<?=  $ChiSoNuocCuoi ?>"></td>
                        <td><input class = "inputdn" type="number" name="SuDungNuoc" value="<?php  if(isset($SuDungNuoc)&&($SuDungNuoc!="")) echo $SuDungNuoc ;?>"readonly></td>
                        </tr>          
        </table>
        <input type = "hidden" name = "MaDienNuoc" value="<?php if(isset($MaDienNuoc)&&($MaDienNuoc>0)) echo $MaDienNuoc ;?>">
        <input type = "submit" name = "capnhat" value = "Cập Nhật">
        <a href="indexx.php?act=listdn"> <input type = "button" value = "Danh Sách"></a>
      