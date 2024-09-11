<?php 
session_start();
include 'includes/koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];
$login = mysqli_query($koneksi, "SELECT * FROM user_library WHERE username='$username' and password='$password'");
$cek = mysqli_num_rows($login);

if($cek > 0){
	$data = mysqli_fetch_assoc($login);

	
	if($data['level']=="admin"){

		$_SESSION['username'] = $username;
		$_SESSION['level'] = "admin";
		
		header("location:admin.php");

	
	}else if($data['member']=="member"){
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "member";	
		header("location:halaman_member.php");
	}else{
		header("location:index.php?pesan=gagal");
	}	
}else{
	header("location:index.php?pesan=gagal");
}
?>