<?php
session_start();
ob_start();

if (isset($_SESSION['username'])) {
    $user = $_SESSION['username'];
}

if(isset($_SESSION['FK_role'])&&($_SESSION['FK_role']== 0)){
    

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name = "viewport" content="width=device-width, initial-scale = 1.0">
    <title>Quản Lý Phòng Ký Túc Xá</title>
    <link rel = "stylesheet" href = "../css/style.css">
   <style>
     body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url("../images/hinhnen.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        header {
            display: flex; 
            align-items: center; 
            padding: 20px;
            color: #004080;
            background-color: transparent;
        }

        header .title {
            display: flex; 
            flex: 1; 
            align-items: center;
            justify-content: center;
            position: relative; 
            font-family: 'Times New Roman'; 
        }
        header .title img {
            height: 100px; 
            margin-right: auto; 
        }

        header .title b {
            font-size: 35px; 
            line-height: 1.5;
            position: absolute; 
            left: 50%; 
            transform: translateX(-50%); 
            text-align: center; 
        }
        .top-menu {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #a81c29;
            color: white;
            padding: 10px 20px;
            height: 35px;
        }
        .menu-left a, .menu-right span {
            align-items: center;
            color: white;
            text-decoration: none;
            margin-right: 20px;
            font-size: 14px;
            line-height: 50px; 
            font-weight: bold;
        }
        .container {
            display: flex;
            width: 100%;
        }
        nav {
            width: 13%;
            background-color: white;
            padding: 20px;
            height: 100vh;
            flex-shrink: 0;
            box-shadow: 2px 0px 5px rgba(0, 0, 0, 0.1);
        }
        nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        nav ul li {
            margin-bottom: 15px;
        }
        nav ul li a {
            color: #a81c29 !important;
            display: block;
            align-items: center;
            justify-content: flex-start;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-weight: bold; 
            font-size: 16px !important;
        }
        nav ul li img {
        width: 30px !important;
        height: 30px !important;
       }
        nav ul li a:hover {
            background-color: #a81c29 !important;
            color: white!important;
        }
        main {
            flex: 1;
            padding: 20px;
        }
        
    </style>
</head>
<body>
    <header>
<div class="title">
    <img src="../images/logo1.jpg" alt="Logo" >
    <b>HỆ THỐNG KÝ TÚC XÁ<br>TRƯỜNG ĐẠI HỌC NGÂN HÀNG TP.HCM</b>

    </div>
    </header>
    <div class="top-menu">
        <div class="menu-left">
           
            <a href="#" class="nav-item">🏠TRANG CHỦ</a>
          
            <a href="#" class="nav-item">🔔THÔNG BÁO</a>
        </div>
            <div class="menu-right">
            <div class="user-info">
                <img src="../images/canhan2.jpg" style="width:30px; height:30px; margin-bottom: -10px;"> 
                <span>Xin Chào</span>
                <i class="dropdown-icon">▼</i>
            </div>
            </div>
    </div>
    <div class = "container">
            <nav>
                <ul>
                    
                    <li><a class="menu-item" href="index.php?act=hdlp"><img src="../images/hoadon.jpg">Hóa Đơn Lệ Phí</a></li>
                    <li><a class="menu-item" href="index.php?act=hddn"><img src="../images/hoadon.jpg">Hóa Đơn Điện Nước</a></li>
                    <li><a class="menu-item" href="index.php?act=baotri"><img src="../images/9.jpg">Bảo trì</a></li>
                    <li><a class="menu-item" href="http://localhost/qliktx/index.php"> Đăng Xuất</a></li>
                </ul>
            </nav>
        
<?php } ?>
    
