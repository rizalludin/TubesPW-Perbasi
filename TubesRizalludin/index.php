<!DOCTYPE html>
<html lang="en">
<title>PERBASI CUP INDRAMAYU</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Lato", sans-serif}
.w3-bar,h1,button {font-family: "Montserrat", sans-serif}
.fa-anchor,.fa-coffee {font-size:200px}
</style>
<body>

  <!-- Navbar -->
  <div class="w3-top">
    <div class="w3-bar w3-red w3-card w3-left-align w3-large">
      <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
      <a href="#home" class="w3-bar-item w3-button w3-padding-large w3-white">Home</a>
      <a href="#jadwal" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Jadwal Pertandingan</a>
      <a href="#galeri" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Galeri</a>
      <a href="#contact" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Contact</a>

    </div>

    <!-- Navbar on small screens -->
    <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium w3-large">
      <a href="#jadwal" class="w3-bar-item w3-button w3-padding-large">Jadwal Pertandingan</a>
      <a href="#galeri" class="w3-bar-item w3-button w3-padding-large">Galeri</a>
      <a href="#contact" class="w3-bar-item w3-button w3-padding-large">Contact</a>

    </div>
  </div>

  <!-- Header -->
  <header class="w3-container w3-red w3-center" style="padding:128px 16px">
    <h1 class="w3-margin w3-jumbo">WELCOME TO</h1>
    <p class="w3-xlarge">PERBASI CUP KABUPATEN INDRAMAYU</p>
    <!-- <button class="w3-button w3-black w3-padding-large w3-large w3-margin-top">Get Started</button> -->
  </header>

  <!-- First Grid -->
  <div class="w3-row-padding w3-padding-64 w3-container" id="home">
    <div class="w3-content">
      <div class="w3-twothird">
        <h1>PERBASI CUP</h1>
        <h5 class="w3-padding-32" align="justify">Perbasi didirikan pada tahun 1951, di mana Tony Wen dan Wim Latumeten diminta oleh Maladi yang saat itu menjabat sebagai Sekretaris Komite Olimpiade Indonesia (KOI) untuk menyusun organisasi olahraga bola basket Indonesia. Atas prakarsa kedua tokoh ini, pada tanggal 23 Oktober 1951 dibentuklah organisasi bola basket Indonesia dengan nama Persatuan Basketball Seluruh Indonesia disingkat Perbasi. Tony Wen menduduki jabatan ketua serta Wim Latumeten sebagai sekretaris. Tahun 1955 namanya diubah dan disesuaikan dengan perbendaharaan bahasa Indonesia, menjadi Persatuan Bola Basket Seluruh Indonesia dan tetap disingkat Perbasi.</h5>
      </div>

      <div class="w3-third w3-center">
        <img src="admin/image/1.png" style="width:80%">
      </div>
    </div>
  </div>

  <div class="w3-row-padding w3-light-grey w3-padding-64 w3-container" id="jadwal">
    <div class="w3-content">
      <h2>Perbasi Cup</h2>
      <p>Jadwal Tournament Perbasi Cup</p>
      <div class="w3-container w3-responsive">
        <table class="w3-table">
          <tr>
            <th scope="col">No</th>
            <th scope="col">Waktu</th>
            <th scope="col">Lawan Main</th>
            <th scope="col">Harga Tiket</th>
          </tr>
          <?php
          include 'database/koneksi.php';
          $tampil=mysqli_query($koneksi,"select * from jadwal order by id_jadwal asc");
          $no=1;
          while ($r=mysqli_fetch_array($tampil)) {

            echo "<tr>
            <td>$no</td>
            <td>$r[jadwal]</td>
            <td>$r[team]</td>
            <td>$r[harga_tiket]</td>";

            $no++;
          }
          echo "</table>";
          ?>
        </table>
      </div>
    </div>
  </div>



  <!-- Second Grid -->
  <div class="w3-row-padding w3-light-grey w3-padding-64 w3-container" id="contact">
    <div class="w3-content">
      <div class="w3-third w3-center">
        <img src="admin/image/2.png" style="width:80%">
      </div>
      <div class="w3-twothird">
        <h1>Contact Me</h1>
        <h5 class="w3-padding-32"></h5>
        <p>Pengurus Perbasi Cup Indramayu</p>
        <p>Karanganyar, Indramayu</p>
        <p>+628 8989800</p>
        <p>Perbasi.indramayu@gmail.com</p>
        <p class="w3-text-grey" align="justify">Perbasi menganut sistem vertikal berjenjang, yang dimulai dari tingkat perkumpulan, pengurus cabang (pengcab) Perbasi, pengurus daerah (pengda) Perbasi, sampai kepada pengurus besar (PB) Perbasi. Dalam perjalanannya PB Perbasi telah beberapa kali berganti kepengurusan. Tercatat pengusaha muda Noviantika Nasution pernah menjabat sebagai Ketua Umum PB Perbasi masa jabatan 2006-2010, setelah sebelumnya jabatan Ketua Umum dipegang oleh Gubernur DKI, Sutiyoso.</p>
      </div>
    </div>
  </div>


  <div class="w3-row-padding w3-light-white w3-padding-64 w3-container" id="galeri">
    <div class="w3-content">
      <h2>Dokumentasi Perbasi</h2>
      <p>Beberapa Dokumentasi Tournament PERBASI Kab. Indramayu </p>
    </div>
    <?php 

    $tampil=mysqli_query($koneksi, "select * from table_image order by id_image");
    $no=1;
    while 
     ($r=mysqli_fetch_array($tampil))
   {
    ?>
    <div class="w3-row">
      <center><img src="<?php echo 'admin/image/'.$r['gambar'] ?>" style="width:50%;height:25% ">
      <h3><?php echo $r['ket'] ?></h3></center>
    </div>
  </div>
  <?php
}
?>




  <div class="w3-container w3-black w3-center w3-opacity w3-padding-64">
    <h1 class="w3-margin w3-xlarge">Jalin Silaturahmi Dengan Bertanding yang Sportif</h1>
  </div>

  <!-- Footer -->
  <footer class="w3-container w3-padding-64 w3-center w3-opacity">  
    <p>Thanks by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">We.css</a></p>
  </footer>

  <script>
// Used to toggle the menu on small screens when clicking on the menu button
function myFunction() {
  var x = document.getElementById("navDemo");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}
</script>

</body>
</html>
