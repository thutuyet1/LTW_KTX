
<?php
    session_start();
    ob_start();
 include "model/pdo.php";
 include "model/taikhoan.php";
 include "model/loaiphong.php";
 include "model/phong.php";
 include "view/header.php";
 include "view/home.php";
 if((isset($_GET['act']))&&($act = $_GET['act']!="")){
    $act = $_GET['act'];
    switch($act)
    {
        case 'dangnhap':
            if(isset($_POST['login'])&&($_POST['login'])){
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $role = checkuser($user, $pass);
                
                /*$checkuser = checkuser($user, $pass, $role);
                if(is_array($checkuser)){*/
                $_SESSION['FK_role'] = $role;
                $_SESSION['username'] = $user;
                $_SESSION['password'] = $pass;
                var_dump($_SESSION); 
                
            //}else
            if($role == 1)
                header('location: admin/header.php');
            else    
                header('location: sinhvien/header.php');
            }
           
        case 'dangky':
            if(isset($_POST['register'])&&($_POST['register'])){
                header('location: view/dangky.php');
        }
       
        
    }
    }
    else{
 include "view/footer.php";
    }
 
?>

