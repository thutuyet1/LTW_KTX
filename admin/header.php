<?php
session_start();
ob_start();
if(isset($_SESSION['FK_role'])&&($_SESSION['FK_role']== 1)){

?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name = "viewport" content="width=device-width, initial-scale = 1.0">
    <title>Hệ Thống Quản Lý Phòng Ký Túc Xá</title>
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
            background-color: #004080;
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
            display: block;
            align-items: center;
            justify-content: flex-start;
            color: #004080;
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
            background-color: #004080 !important;
            color: white;
        }
       
        main {
            flex: 1;
            padding: 20px;
        }
       
        table {
        width: 100%;
        border-collapse: collapse;
        font-family: Arial, sans-serif;
}

    table th {
        background-color: #d9edf7;
        color: #31708f; 
        font-weight: bold;
        text-align: center;
        padding: 10px;
        border: 1px solid #ddd;
}

    table td {
        background-color: #f7f9fb;
        text-align: center;
        padding: 10px;
        border: 1px solid #ddd; 
}

    table tr:nth-child(even) td {
        background-color: #e9f3f7;
}

    table tr:hover td {
        background-color: #cbe2eb; 
}
.frmtitle h1 {
    color:rgb(7, 60, 117); 
    font-weight: bold;
    text-align: center;
    font-size: 30px; 
    margin: 20px 0;
}
.inputdn, select {
    width: 100%; /* Sửa để input/ select vừa với container */
    padding: 4px;
    border: none;
    border-radius: 4px;
    box-sizing: border-box;
}
.input.form-control {
    width: 30px;
}
    </style>
</head>

<body>
<header>
<div class="title">
    <img src="../images/logo1.jpg" alt="Logo">
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
               
                <span>Nhân viên hành chính</span>
                <i class="dropdown-icon">▼</i>
            </div>
        </div>
        </div>
    </div>
    <div class = "container">
        <nav>
            
                <ul>

                    <li><a class="menu-item" href="indexx.php?act=qldangky"><img src="../images/3.jpg">Quản Lý Đăng Ký</a></li>
                    <li><a class="menu-item" href="indexx.php?act=listphong"><img src="../images/2.jpg">Quản Lý Phòng</a></li>
                    <li><a class="menu-item" href="indexx.php?act=listdn"><img src="../images/5.jpg">Quản Lý Điện Nước</a></li>
                    <li><a class="menu-item" href="indexx.php?act=qlbaotri"> <img src="../images/6.jpg">Quản Lý Bảo Trì</a></li>
                    <li><a class="menu-item" href="http://localhost/qliktx/index.php"> Đăng Xuất</a></li>
                    </ul>
            
            </nav>
            
            
        
    <?php } ?>