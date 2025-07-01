
<div class = "row">
    <div class = "row frmtitle">
        <h1> Thông tin thanh toán </h1>
    </div>
    <form method="POST" action="index.php?act=thanhtoan">
    <div class = "boxtitle"> PHƯƠNG THỨC THANH TOÁN </div>
    <div class = "row boxcontent">
    <?php foreach($hoaDonLePhi as $lishdlephi)
    { ?>
    <input type="hidden" name="MaLePhi" value="<?= $lishddn['MaLePhi']; ?>"> <?php } ?>
        <table>
            <tr>
                <form class="" method="POST" target="_blank" enctype="application/x-www-form-urlencoded"
                action="init_payment.php">
                <input type="hidden" name="pttt" value="0"> 
                <td> <input type = "submit" name = "tm" value = "THANH TOÁN TIỀN MẶT" style="background-color: #a81c29; margin-top: 5px; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; font-weight: bold;"> </td> </form>

                <form class="" method="POST" target="_blank" enctype="application/x-www-form-urlencoded"
                action="index.php?act=momo">
                <input type="hidden" name="MaLePhi" value="<?= $lishddn['MaLePhi']; ?>">
                <input type="hidden" name="pttt" value="1"> 
                <td> <input type = "submit" name = "momo" value = "THANH TOÁN QR Code" style="background-color: #a81c29; margin-top: 5px; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; font-weight: bold;" > </td></form>

                <form class="" method="POST" target="_blank" enctype="application/x-www-form-urlencoded"
                action="index.php?act=atm">
                <input type="hidden" name="MaLePhi" value="<?= $lishddn['MaLePhi']; ?>">
                <input type="hidden" name="pttt" value="2"> 
                <td> <input type = "submit" name = "atm" value = "THANH TOÁN CHUYỂN KHOẢN" style="background-color: #a81c29; margin-top: 5px; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; font-weight: bold;"> </td></form>
            </tr>
        </table>
        <div class = "button" style="text-align: right">
        <a href="index.php?act=ttlephi"><input type ="submit" name = "thanhtoanlephi" value = "Đồng ý thanh toán" style="background-color: #a81c29; margin-top: 5px; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; font-weight: bold;"></a>
        </div>
    </div>
    
</div>
