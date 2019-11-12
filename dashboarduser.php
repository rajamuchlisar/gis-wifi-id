<?php
session_start();
include 'proses.php';
	// cek apakah yang mengakses halaman ini sudah login
if(@$_SESSION['level']=="admin"){
 header("location:index.php");
}

?>
<html>
<head>
	<title>Halaman Pengguna</title>
	 <link rel="stylesheet" type="text/css" href="css/style.css">
	<script
      src="https://use.fontawesome.com/releases/v5.11.2/js/all.js"
      data-auto-a11y="true"
    ></script>
</head>
<body>
<div class="wrap">
		<div class="header">
			<div class="logo">
				<img src="img/idwifi.png"/>
			</div>
			
			<div class="title">
			Peta Lokasi Layanan @Wifi.id Kota Sigli
		</div>
		
		<div class="home">
		<p> <center>
			<button onclick="window.location.href='logout.php'">Log Out</button>
					</p>
		</div>
		
		
		</div>
		<div class="menu">
		<ul>
			<a href="dashboarduser.php"><li><i class="fa fa-home" aria-hidden="true"></i> Dashboard</li> </a>
			<a href="datalokasi.php"><li><i class="fas fa-map-marker"></i> Data Lokasi</li> </a>
			<a href="#"><li></li> </a>
			<a href="#"><li></li> </a>
			<a href="#"><li></li> </a>
			<a href="profiluser.php"><li><i class="fas fa-tools"></i> Profil</li> </a>
		</ul>
		</div>
			<div class="badanuser">			
			<center/> 
			<div class="contentuser">
					Selamat Datang, <br/> <b>
	<?php 
	
	echo $_SESSION['nama']; 
	?>
	</b><br>Akun anda sebagai <b>
	<?php 
	echo $_SESSION['level'];
	?>
	</b>
	
			</div>
		</div>
		<div class="clear"></div>
		<div class="footer">
			<center>© Raja Muchlisar </center>
		</div>
	</div>
	
 </div>
</body>
</html>