<?php
include "../database/koneksi.php";
//bagian home admin
if ($_GET['module']=='home') {
?>

	<h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3>
	<ol class="breadcrumb">
	<li><i class="fa fa-home"></i><a href="server.php?module=home">Home</a></li>
	<li><i class="fa fa-laptop"></i>Dashboard</li>
	</ol>
	<h2>Halaman Utama</h2>
	<p class="welcome">Selamat Datang <b> <?php $_SESSION['namauser']; ?></b>,
	Silakan klik menu pilihan disebelah kiri untuk mengelola konten
	website Admin PERBASI INDRAMAYU<br> Terima Kasih</p>
	<?php
}

elseif ($_GET['module']=='user') {
	include "modul/user.php";
}
//bagian galeri
elseif ($_GET['module']=='image') {
	include "modul/image.php";
}
//bagian jadwal
elseif ($_GET['module']=='jadwal') {
	include "modul/jadwal.php";
}
// Apabila modul tidak ditemukan
else{
	echo "<p><b>MODUL BELUM ADA</b></p>";
}
?>