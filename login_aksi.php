<?php 
session_start();
include 'koneksi.php';
$username = $_POST['username'];
$password = md5($_POST['password']);
$result = mysqli_query($koneksi,"select * from users where username='$username' and password='$password'");
$cek = mysqli_num_rows($result);
if($cek > 0){
	$data = mysqli_fetch_assoc($result);
	if($data['role']=="admin"){
 
		$_SESSION['username'] = $username;
        $_SESSION['status'] = "login";
		$_SESSION['role'] = "admin";
		header("location:admin");
 
	}else if($data['role']=="resepsionis"){

		$_SESSION['username'] = $username;
        $_SESSION['status'] = "login";
		$_SESSION['role'] = "resepsionis";

		header("location:resepsionis");
	}else if($data['role']=="tamu"){

		$_SESSION['username'] = $username;
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
