<?php 
include '../database/koneksi.php';
switch(@$_GET['act']){
	//tampil tiket
	default:
	echo "<h2>Jadwal</h2>
	<form method=post action='?module=jadwal&act=tambahjadwal'>
	<input class='btn btn-primary' type=submit value='Tambah Jadwal'>
	</form>
	<table class='table'>
	<tr>
	<th scope='col'>No</th>
	<th scope='col'>Jadwal Tanding</th>
	<th scope='col'>Team</th>
	<th scope='col'>Harga Tiket</th>
	</tr>";
	$tampil=mysqli_query($koneksi,"select * from jadwal order by id_jadwal asc");
	$no=1;
	while ($r=mysqli_fetch_array($tampil)) {
		echo "<tr>
		<td>$no</td>
		<td>$r[jadwal]</td>
		<td>$r[team]</td>
		<td>$r[harga_tiket]</td>
		<td><a class='btn btn-primary' href=?module=jadwal&act=editjadwal&id=$r[id_jadwal]>Edit</a>
		<a class='btn btn-danger' href=\"aksi.php?module=jadwal&act=hapus&id=$r[id_jadwal]\" onClick=\"return confirm('apakah anda benar akan menghapus tiket $r[id_jadwal]?')\">Hapus</a>
		</td></tr>";
		$no++;
	}
	echo "</table>";
	break;
//tambah jadwal
	case "tambahjadwal":
	echo "<h2>Tambah Tiket</h2>
	<form method=post action='aksi.php?module=jadwal&act=input'>
	<div class='col-md-3'>
	<div class='form-group'>
	<input class='form-control' name='jadwal' type='date' id='jadwal' placeholder='Jadwal Tanding'>
	</div>
	<div class='form-group'>
	<input type='text' class='form-control' name='team' id='team' placeholder='Team'>
	</div>
	<div class='form-group'>
	<input type='text' class='form-control' name='harga_tiket' id='harga_tiket' placeholder='Harga Tiket'>
	</div>
	<input type='submit' class='btn btn-primary' name='submit' value='simpan'>
	<input type=button class='btn btn-danger' value=Batal onclick=self.history.back()>
	</div>
	</form>";
	break;

//edit jadwal
	case "editjadwal":
	$edit=mysqli_query($koneksi,"select * from jadwal where
		id_jadwal='$_GET[id]'");
	$r=mysqli_fetch_array($edit);
	echo "<h2>Edit Jadwal</h2>
	<form method=post action='aksi.php?module=jadwal&act=update'>
	<div class='col-md-5'>
	<div class='form-group'>
	<input type=hidden name=id value='$r[id_jadwal]'>
	<input class='form-control' name='jadwal' type='text' id='jadwal_tanding' value='$r[jadwal]'>
	</div>
	<div class='form-group'>
	<input type='text' class='form-control' name='team' id='team' placeholder='Lawan Tanding'>
	</div>
	<div class='form-group'>
	<input type='text' class='form-control' name='harga_tiket' id='harga_tiket' placeholder='Harga Tiket'>
	</div>
	<input type='submit' class='btn btn-primary' name='submit' value='Update'>
	<input type=button class='btn btn-danger' value=Batal onclick=self.history.back()>
	</div>
	</form>";
	break;
}
?>