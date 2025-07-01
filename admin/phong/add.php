<html>
<style>
    .row{
        margin: 20px 200px;
        padding: 20px;
        background-color: white;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        height: 450px;
       
      
    }
    .form-group {
    margin-bottom: 15px;
}

.form-group label {
    display: block;
    font-weight: bold;
    color: #333;
    margin-bottom: 5px;
}
.form-group input, .form-group select {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 14px;
    box-sizing: border-box;
}
.form-actions {
    display: flex;
    gap: 10px;
    margin-top: 20px;
    justify-content: flex-end; //đẩy nút sang bên phải
}
.btn {
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    font-size: 14px;
    cursor: pointer;
}

.btn-primary {
    background-color: #004080;
    color: white;
}

.btn-secondary {
    background-color: #ddd;
    color: #333;
}

.btn:hover {
    opacity: 0.9;
}
</style>
<body>

<div class = "row">
<h1 style="text-align: center;" >Thêm Phòng</h1>

    <form method = "post">
        <div class="form-group">
            <label for="maphong">Mã Phòng</label>
            <input type = "text" name = "maphong">
        </div>
        <div class="form-group">
            <label for="tenphong">Tên Phòng</label>
            <input type = "text" name = "tenphong">
        </div>
        <div class="form-group">
            <label for="tang">Tầng</label>
            <input type = "text" name = "tang">
        </div>
        <div class="form-group">
        <label for="FK_LoaiPhong">Mã Loại Phòng</label>
            <select name = "FK_LoaiPhong">
                <?php
                    foreach ($listlp as $loaiphong){
                        extract($loaiphong);
                        echo '<option value = "'.$MaLoaiPhong.'">'.$TenLoaiPhong.'</option>';
                    }
                ?>
            </select>
        </div>
        <div class ="form-actions">
            <input type = "submit" name = "themmoi"  class="btn btn-primary" value = "Thêm Mới">
            <input type = "submit" name = "chinhsua" class="btn btn-secondary" value = "Chỉnh Sửa">
        </div>
        

        <?php
            if(isset($thongbao) &&($thongbao!="")) echo $thongbao;
        ?>
    </form>
</div>
</body>
</html>
      