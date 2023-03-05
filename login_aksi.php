<?php 
session_start();
include 'koneksi.php';
$email = $_POST['email'];
$password = md5($_POST['password']);
$result = mysqli_query($koneksi,"select * from user where email='$email' and password='$password'");
$cek = mysqli_num_rows($result);
if($cek > 0){
	$data = mysqli_fetch_assoc($result);
	if($data['role']=="admin"){
 
		$_SESSION['email'] = $email;
        $_SESSION['status'] = "login";
		$_SESSION['role'] = "admin";
		header("location:admin");
 
	}else if($data['role']=="resepsionis"){

		$_SESSION['email'] = $email;
        $_SESSION['status'] = "login";
		$_SESSION['role'] = "resepsionis";

		header("location:resepsionis");
	}else if($data['role']=="tamu"){

		$_SESSION['email'] = $email;
        $_SESSION['status'] = "login";
		$_SESSION['role'] = "tamu";

		header("location:index.php");
	}else{

		header("location:index.php?pesan=gagal");
	}	
}else{
	header("location:index.php?pesan=gagal");
}

?>
