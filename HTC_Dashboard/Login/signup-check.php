<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['uname']) && isset($_POST['password'])
    && isset($_POST['name']) && isset($_POST['re_password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);

	$re_pass = validate($_POST['re_password']);
	$name = validate($_POST['name']);

	$user_data = 'uname='. $uname. '&name='. $name;


	if (empty($uname)) {
		header("Location: login.php?error=User Name is required&$user_data");
	    exit();
	}else if(empty($pass)){
        header("Location: login.php?error=Password is required&$user_data");
	    exit();
	}
	else if(empty($re_pass)){
        header("Location: login.php?error=Re Password is required&$user_data");
	    exit();
	}

	else if(empty($name)){
        header("Location: login.php?error=Name is required&$user_data");
	    exit();
	}

	else if($pass !== $re_pass){
        header("Location: login.php?error=Mật khẩu xác nhận ko đúng&$user_data");
	    exit();
	}

	else{

		// hashing the password
        // $pass = md5($pass);

	    $sql = "SELECT * FROM nguoidung WHERE TaiKhoan='$uname' ";
		$result = mysqli_query($links, $sql);

		if (mysqli_num_rows($result) > 0) {
			header("Location: login.php?error=Tài khoản đã được sử dụng, hãy thử một tên khác&$user_data");
	        exit();
		}else {
           $sql2 = "INSERT INTO nguoidung(TaiKhoan, MatKhau, TenNguoiDung) VALUES('$uname', '$pass', '$name')";
           $result2 = mysqli_query($links, $sql2);
           if ($result2) {
           	 header("Location: login.php?success=Đăng ký thành công");
	         exit();
           }else {
	           	header("Location: login.php?error=Xảy ra lỗi không xác định được&$user_data");
		        exit();
           }
		}
	}
	
}else{
	header("Location: login.php");
	exit();
}