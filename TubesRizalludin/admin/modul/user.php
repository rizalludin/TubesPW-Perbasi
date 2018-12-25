<?php
include '../database/koneksi.php';
switch(@$_GET['act']){
//tampil user
	default:
	echo "
	<table class='table'>
	<tr>
	<th scope='col'>No</th>
	<th scope='col'>Username</th>
	<th scope='col'>Password</th>
	<th scope='col'>Opsi</th>
	</tr>";
	$tampil=mysqli_query($koneksi,"select * from admin order by id_admin asc");
	$no=1;
	while ($r=mysqli_fetch_array($tampil)) {
		echo "<tr>
		<td>$no</td>
		<td>$r[name_admin]</td>
		<td>$r[pass_admin]</td>
		<td><a class='btn btn-primary' href=?module=user&act=edituser&id=$r[id_admin]>Edit</a></td>
		<td><a class='btn btn-primary' href=?module=user&act=gantipwd&id=$r[id_admin]>Ganti Password</a></td>
		</tr>";
		$no++;
	}
	echo "</table>";
	break;
//edit user
	case "edituser":
	$edit=mysqli_query($koneksi,"select * from admin where
		id_admin='$_GET[id]'");
	$r=mysqli_fetch_array($edit);
	echo "<h2>Edit User</h2>
	<form method=post action='aksi.php?module=user&act=update'>
	<div class='col-md-5'>
	<div class='form-group'>
	<input type=hidden name=id value='$r[id_admin]'>
	<input class='form-control' name='name_admin' type='text' id='id_admin' value='$r[name_admin]'>
	</div>
	<input type='submit' class='btn btn-primary' name='submit' value='Update'>
	<input type=button class='btn btn-danger' value=Batal onclick=self.history.back()>
	</div>
	</form>";
	break;
//edit Password case "gantipwd":
	case"gantipwd":
	$edit=mysqli_query($koneksi, "select * from admin where id_admin='$_GET[id]'");
	$r=mysqli_fetch_array($edit); 
	echo "<h2>Ganti Password</h2>
	<form method=post 
	action='aksi.php?module=user&act=gantipwd'>
	<input type=hidden name=id value='$r[name_admin]'>
	<input type=hidden name=pwd_lama1 value='$r[pass_admin]'>
	<table>
	<tr><td>Password Lama</td>
	<td> : <input type=password name=pwd_lama2></td>
	</tr>
	<tr>
	<td>Password Baru</td>
	<td> : <input type=password name=pwd_baru1></td></tr>
	<tr>
	<td>Ulangi Password Baru</td>
	<td> : <input type=password name=pwd_baru2></td>
	</tr>
	<tr>
	<td colspan=2><input type=submit value='Ganti Password'>
	<input type=button value=Batal onclick=self.history.back()>
	</td>
	</tr>
	</table></form>"; 
	break;
}
?> 