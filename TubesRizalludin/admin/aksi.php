<?php
include "../database/koneksi.php";
$module=$_GET['module'];
$act=$_GET['act'];
//$id=$_GET['id'];

if ($module=='image' AND $act=='hapus') {
	mysqli_query($koneksi,"delete from table_image where
		id_image='$_GET[id]'");
	header('location:server.php?module=image');
}
elseif ($module=='image' and $act=='input')
{
	$set = true;
	$msg = "";
//tentukan variabel file yg diupload dan tipe file
	$tipe_file	= $_FILES['gambar']['type'];
	$lokasi_file = $_FILES['gambar']['tmp_name'];
	$nama_file	= $_FILES['gambar']['name'];
	$save_file =move_uploaded_file($lokasi_file,"image/$nama_file");

	if(empty($lokasi_file))
	{
		$set=false;
		$msg= $msg.'Upload gagal, Anda Lupa Mengambil Gambar..';
	}
	else
	{
//tentukan tipe file harus image 
		if ($tipe_file != "image/gif" and
			$tipe_file != "image/jpeg" and
			$tipe_file != "image/jpg" and
			$tipe_file != "image/pjpeg" and
			$tipe_file != "image/png")
		{
			$set=false;
			$msg= $msg. 'Upload gagal, tipe file harus image..';
		}
		else
		{
			isset($save_file);
		}
//replace di server 
		if($save_file)
		{
			chmod("image/$nama_file", 0777);
		}
		else
		{
			$msg = $msg.'Upload Image gagal..';
			$set =	false;
		}
	}
	if($set)
	{
		$ket=$_POST['ket'];
		$sql=mysqli_query($koneksi,"insert into table_image(gambar,ket)values('$nama_file','$ket')");
		$msg= $msg.'Upload Image Sukses..';
		print "<meta http-equiv=\"refresh\" content=\"1;URL=server.php?module=image\">";
	}
	echo "$msg";
}

//Update image
elseif ($module=='image' and $act=='update')
{
	$set = true;
	$msg = "";

//tentukan variabel file yg diupload dan tipe file
	$tipe_file	= $_FILES['gam_baru']['type'];
	$lokasi_file = $_FILES['gam_baru']['tmp_name'];
	$nama_file	= $_FILES['gam_baru']['name'];
	$save_file =move_uploaded_file($lokasi_file,"image/$nama_file");

	if(empty($lokasi_file))
	{
		isset($set);
	}
	else
	{
//tentukan tipe file harus image 
		if ($tipe_file != "image/gif" and
			$tipe_file != "image/jpeg" and
			$tipe_file != "image/jpg" and
			$tipe_file != "image/pjpeg" and
			$tipe_file != "image/png")
		{
			$set=false;
			$msg= $msg. 'Upload gagal, tipe file harus image..';
		}
		else
		{
			$unlink=mysqli_query($koneksi, "select * from table_image where id_image='$_POST[id]'");
			$CekLink=mysqli_fetch_array($unlink); 
			if(!empty($CekLink['gambar']));
			{
				unlink("image/$CekLink[gambar]");
			}
			isset($save_file);
		}

//replace di server 
		if($save_file)
		{
			chmod("image/$nama_file", 0777);
		}
		else
		{
			$msg = $msg.'Upload Image gagal..';
			$set =	false;
		}
	}
	if($set)
	{
		$id=$_POST['id'];
		$ket=$_POST['ket'];

		if(empty($lokasi_file))
		{
			mysqli_query($koneksi, "update table_image set ket='$ket'where id_image='$id'");}
			else{mysqli_query($koneksi, "update table_image set ket='$ket', gambar='$nama_file' where id_image='$id'");
		}
		$msg= $msg.'Update Image Sukses..'; print "<meta http-equiv=\"refresh\"
		content=\"1;URL=server.php?module=image\">";
	}
	echo "$msg";
}

elseif ($module == 'jadwal' AND $act == 'hapus' ) {
	mysqli_query($koneksi,"delete from jadwal where
		id_jadwal='$_GET[id]'");
	header('location:server.php?module=jadwal');
}
elseif ($module=='jadwal' and $act=='input')
{
	$set = true;
	$msg = "";{
		if($set)
		{
			$jadwal = $_POST['jadwal'];
			$team = $_POST['team'];
			$harga_tiket = $_POST['harga_tiket'];

			$sql=mysqli_query($koneksi,"insert into jadwal(jadwal,team,harga_tiket)values('$jadwal','$team','$harga_tiket')");
			$msg= $msg.'Tambah Jadwal Sukses..';
			print "<meta http-equiv=\"refresh\" content=\"1;URL=server.php?module=jadwal\">";
		}
		echo "$msg";
	}
}
elseif ($module=='jadwal' and $act=='update')
{
	$set = true;
	$msg = "";

	if($set)
	{
		$id=$_POST['id'];
		$jadwal = $_POST['jadwal'];
		$team = $_POST['team'];
		$harga_tiket = $_POST['harga_tiket'];
		mysqli_query($koneksi, "update jadwal set jadwal='$jadwal',team='$team',harga_tiket=$harga_tiket where id_jadwal='$id'");
		$msg= $msg.'Update Image Sukses..'; print "<meta http-equiv=\"refresh\"
		content=\"1;URL=server.php?module=jadwal\">";
	}
	echo "$msg";
}

elseif ($module=='user' and $act=='update')
{
	$set = true;
	$msg = "";

	if($set)
	{
		$id=$_POST['id'];
		$name_admin=$_POST['name_admin'];
		mysqli_query($koneksi, "update admin set name_admin='$name_admin' where id_admin='$id'");
		$msg= $msg.'Update Image Sukses..'; print "<meta http-equiv=\"refresh\"
		content=\"1;URL=server.php?module=user\">";
	}
	echo "$msg";
}

elseif ($module=='user' and $act=='gantipwd') {
	$set = true;
	$msg = "";

	$id=$_POST['id'];
	$lama=$_POST['pwd_lama1'];
	$lama2=$_POST['pwd_lama2'];
	$baru=$_POST['pwd_baru1'];
	$baru2=$_POST['pwd_baru2'];
	$baru_banget=$baru; 
	if ($lama == $lama2)
	{
		if ($baru == $baru2)
		{
			if($set)
			{
				mysqli_query($koneksi, "UPDATE admin SET pass_admin='$baru_banget' WHERE name_admin='$id'");
				$msg= $msg.'Ganti Password Sukses..'; print "<meta http-equiv=\"refresh\"
				content=\"1;URL=server.php?module=home\">";
			}
		}
		else
		{
			$set=false;
			$msg= $msg.'Password Baru tidak sama..!!';
		}
	}
	else
	{
		$set=false;
		$msg= $msg.'Password Lama tidak sama..!!';
	}
	echo "$msg";
	print "<br><br><a href = \"javascript:history.go(-1)\"> Back</a>";
}
?>

