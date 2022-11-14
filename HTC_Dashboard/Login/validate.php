<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);

	if (empty($uname)) {
		header("Location: login.php?error=User Name is required");
	    exit();
	}else if(empty($pass)){
        header("Location: login.php?error=Password is required");
	    exit();
	}else{
		$sql = "SELECT * FROM nguoidung WHERE TaiKhoan='$uname' AND MatKhau='$pass'";

		$result = mysqli_query($links, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['TaiKhoan'] === $uname && $row['MatKhau'] === $pass) {
            	$_SESSION['TaiKhoan'] = $row['TaiKhoan'];
            	$_SESSION['TenNguoiDung'] = $row['TenNguoiDung'];
            	$_SESSION['Id'] = $row['Id'];
            	header("Location: ../index.php");
		        exit();
            }else{
				header("Location: login.php?error=Sai tài khoản hoặc mật khẩu");
		        exit();
			}
		}else{
			header("Location: login.php?error=Sai tài khoản hoặc mật khẩu");
	        exit();
		}
	}
	
}else{
	header("Location: login.php");
	exit();
}
