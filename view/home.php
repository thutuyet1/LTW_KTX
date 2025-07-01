<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <style>  
            body{
                margin: 0;
                font-family: Arial, sans-serif;
                background: url("./images/mhchinh.jpg") no-repeat center center fixed;
                background-size: cover;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                }

            .container {
                width: 100%;
                max-width: 500px;
                background-color: rgba(255, 255, 255, 0.9);
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
                border-radius: 10px;
                padding: 20px;
                text-align: center;
            }

            .logo {
                width: 80px;
                margin-bottom: 10px;
            }

            .header h1 {
                font-size: 23px;
                
                color: #2b3d63;
                margin: 5px 0;
                font-weight: bold;
            }

            .form-control {
                padding: 10px;
                border: 1px solid #ccc;
                border-radius: 10px;
                font-size: 18px;
                margin-top: 10px;
            }

            .forgot-password {
                font-size: 18px;
                color: #0066cc;
                text-align: right;
                text-decoration: none;
            }

            .forgot-password:hover {
                text-decoration: underline;
            }

            .btn {
                width: 48%;
                margin: 5px 1%;
                padding: 10px;
                font-size: 18px;
                font-weight: bold;
                border: none;
                border-radius: 5px;
                cursor: pointer;
            }

            .btn-login {
                background-color: #d32f2f;
                color: white;
            }

            .btn-register {
                background-color: #1976d2;
                color: white;
            }

            .btn-login:hover {
                background-color: #b71c1c;
            }

            .btn-register:hover {
                background-color: #1565c0;
            }

            .role-toggle {
                margin-top: 18px;
                text-align: left;
                font-size: 18px;
                color: #2b3d63;
            }

            .role-toggle label {
                margin-right: 15px;
                cursor: pointer;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <!-- Logo and Title -->
            <div class="header">
                <img src="./images/logo1.jpg" alt="HUB Logo" class="logo">
                <h1>KÝ TÚC XÁ</h1>
                <h1>TRƯỜNG ĐẠI HỌC NGÂN HÀNG TP.HCM</h1>
            </div>
            <br>
            <form action="index.php?act=dangnhap" method="POST">
                <div class="role-toggle">
                    <label>
                        <input type="radio" name="role" value="0" required> Sinh viên
                    </label>
                    <label>
                        <input type="radio" name="role" value="1" required> Ban quản lý
                    </label>
                </div>

                    <input type="text" name="user" placeholder="Tên đăng nhập" class ="form-control" required>
                    <input type="password" name="pass" placeholder="Mật khẩu" class="form-control" required>
                    <hr>  

                    <a  href="index.php?act=dangnhap"><input type = "submit" name = "login" value = "Đăng nhập" class ="btn btn-login"></a>
            </form>

            <form action="index.php?act=dangky" method="POST">
                <a href="index.php?act=dangky"><input type = "submit" name = "register"  value = "Đăng ký" class="btn btn-register"></a>
            </form>
        </div>
    </body>
</html>