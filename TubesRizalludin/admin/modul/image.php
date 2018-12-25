<?php 
include '../database/koneksi.php';
switch(@$_GET['act']){
  default:
  echo "<h2>Dokumentasi</h2>
  <form method=post action='?module=image&act=tambahimage'>
  <input class='btn btn-primary' type=submit value='Tambah Dokumentasi'>
  </form>
  <table class='table'>
  <tr>
  <th scope='col'>No</th>
  <th scope='col'>Gambar</th>
  <th scope='col'>Keterangan</th>
  </tr>";
  $tampil=mysqli_query($koneksi, "select * from table_image order by id_image");
  $no=1;
  while 
   ($r=mysqli_fetch_array($tampil))
 {
  echo "<tr><td>$no</td>
  <td><img src='image/$r[gambar]' width='50'></td>
  <td>$r[ket]</td>
  <td><a class='btn btn-primary' href=?module=image&act=editimage&id=$r[id_image]>Edit</a>
  <a class='btn btn-danger' href=\"aksi.php?module=image&act=hapus&id=$r[id_image]\"onClick=\"return confirm('apakah anda benar akan menghapus galeri $r[id_image]?')\">Hapus</a>
  </td></tr>";
  $no++;
}
echo "</table>";
break;
//tambah galeri
case "tambahimage":
echo "<h2>Tambah Dokumentasi</h2>
<form name='form1' method='post' action='aksi.php?module=image&act=input' enctype='multipart/form-data'>
<div class='col-md-5'>
<div class='form-group'>
<input name='gambar' type=file >
</div>
<div class='form-group'>
<textarea id='mytextarea' name='ket'></textarea>
</div>
<input type='submit' class='btn btn-primary' name='submit' value='Simpan'>
<input type=button class='btn btn-danger' value=Batal onclick=self.history.back()>
</div>
</form>";
break;    
//edit galeri
case "editimage":
$edit=mysqli_query($koneksi, "select * from table_image where id_image='$_GET[id]'");
$r=mysqli_fetch_array($edit);
echo "<h2>Edit Image</h2>
<form name='form1' method='post' action='aksi.php?module=image&act=update' enctype='multipart/form-data'>
<div class='col-md-5'>
<div class='form-group'>
<input type=hidden name=id value='$r[id_image]'>
<div class='form-group'>
<img src='image/$r[gambar]' width='60'><br>
<input name='gam_baru' type=file size='50'>
</div>
<textarea id='mytextarea' class='form-control' name='ket' cols='35' rows='4' placeholder='Enter Keterangan'>$r[ket]</textarea>
</div>
<input type='submit' class='btn btn-primary' value='Update'>
<input type=button class='btn btn-danger' value=Batal onclick=self.history.back()>
</div>
</form>";
break;}
?>
<script type="text/javascript" src="../tinymce/tiny_mce.js"></script>
<script type="text/javascript">
  tinymce.init({
    selector: "#mytextarea"
  });
</script>