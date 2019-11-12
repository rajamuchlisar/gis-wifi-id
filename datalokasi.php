<?php
include "koneksi.php";
?>
	<html>
<head>
	<title>Data Lokasi
	</title>
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
			<a href="dashboardadmin.php"><li><i class="fa fa-home" aria-hidden="true"></i> Dashboard</li> </a>
			<a href="#"><li><i class="fas fa-map-marker"></i> Data Lokasi</li> </a>
			<a href="#"><li><i class="fas fa-clipboard-check"></i> Persetujuan</li> </a>
			<a href="#"><li><i class="fas fa-male"></i> Kelola Admin</li> </a>
			<a href="#"><li></li> </a>
			<a href="profil.php"><li><i class="fas fa-tools"></i> Profil</li> </a>
		</ul>
		</div>
			<div class="profil">			
			
			<div class="content">
			<h3><center>Data Lokasi @wifi.id </center></h3>
	<button onclick="window.location.href='addcompany.php'">Tambah Data Baru</button>
 	<table border="1" class="table">
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>detail</th>
			<th>telephone</th>
			<th>Opsi</th>		
		</tr>
		<?php 
			$query = mysqli_query($conn, "SELECT * FROM companies");
			while($data = mysqli_fetch_array($query )){
		?>
		<tr>
			<td><?php echo $data['id']; ?></td>
			<td><?php echo $data['company']; ?></td>
			<td><?php echo $data['details']; ?></td>
			<td><?php echo $data['telephone']; ?></td>
			<td>
				<a class="edit" href="editcompany.php?id=<?php echo $data['id']; ?>">Edit</a> |
				<a class="hapus" href="deletecompany.php?id=<?php echo $data['id']; ?>">Hapus</a>					
			</td>
		</tr>
		<?php } ?>
	</table>
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