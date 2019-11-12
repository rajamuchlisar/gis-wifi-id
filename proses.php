<?php
	// ini proses login ya
	if(isset($_POST['login'])){
		include 'koneksi.php';
		$nameuser = $_POST['nameuser'];
		$pass = $_POST['pass'];
		$cek = mysqli_query($conn, "SELECT * FROM akun WHERE username = '".$nameuser."' AND password = '".$pass."'");
		$data = mysqli_fetch_array($cek);
		$nama_pelogin = $data['nama'];
		$level_pelogin = $data['level'];
		$username_pelogin = $data['username'];
		$email_pelogin =$data['email'];
		$statuspost =$data['status'];

		if(mysqli_num_rows($cek) > 0){
			session_start();
			$_SESSION['username'] = $username_pelogin;
			$_SESSION['email'] = $email_pelogin;
			$_SESSION['nama'] = $nama_pelogin;
			$_SESSION['level'] = $level_pelogin;
		$_SESSION['status'] = $statuspost;
			if($level_pelogin == "admin"){
				header('location:dashboardadmin.php');
			}elseif($level_pelogin == "user"){
				header('location:dashboarduser.php');
			}
	else{
			echo ' Login gagal, anda akan dialihkan ke halaman utama dalam <b>5</b> detik harap bersabar...';
			header("refresh: 5; url=index.php");
		}
	}	
	}
		
	
?>