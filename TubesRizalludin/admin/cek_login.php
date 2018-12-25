<?php
include "../database/koneksi.php";
$login=mysqli_query($koneksi, "select * from admin where name_admin='$_POST[username]' and pass_admin='$_POST[password]'");
if (mysqli_num_rows($login)) {
	$data=mysqli_fetch_array($login);
	session_start();
	if(isset($_POST["captcha"])&&$_POST["captcha"]!=""&&$_SESSION["code"]==$_POST["captcha"])
	{
		$_SESSION['namauser']=$data['name_admin'];
		$_SESSION['passuser']=$data['pass_admin'];
		header("location:server.php?module=home");
//Place other codes here to execute when captcha is passed
	}
	else
	{
		header("location:index.php");
	}

}

else
{
	print "<script>
	alert ('Periksa Pengisian Form'); 
	location.href = 'index.php';
	</script>";
}
?>