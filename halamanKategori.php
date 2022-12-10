<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/style.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
    />
    <!-- <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi"
      crossorigin="anonymous"
    /> -->
    <title>Kategori</title>
  </head>
  <body>
    <!-- header -->
    <?php include 'include/header.php';?>

    <!-- breadcrumb -->
    <div class="breadcrumb-nav">
      <nav
        style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb";
        aria-label="breadcrumb"
      >
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Beranda</a></li>
          <li class="breadcrumb-item"><a href="artikel.php">Artikel</a></li>
          <li class="breadcrumb-item active" aria-current="page"><?php echo $_GET["cari"];?></li>
        </ol>
      </nav>
    </div>

    <?php
      include 'db_connection.php';
      $cari = $_GET["cari"];
      $queryKategori = "SELECT * FROM kategori WHERE nama = '$cari'";
      $resultKategori = mysqli_query($conn, $queryKategori);
      $rowKategori = $resultKategori->fetch_assoc();
    ?>
    <!-- banner -->
    <div class="header-kategori">
    <!-- <div class="container"> -->

            <!-- <img
            src="img/komunitas/Banner - berat  bedan ideal.webp"
            id="header-kategori"
            alt="banner"
            /> -->
            <img
            src="<?php echo $rowKategori["gambar"];?>"
            id="avatar"
            alt="Avatar"
            />
            <!-- <img
            src="img/kategori/alergi.webp"
            id="avatar"
            alt="Avatar"
            /> -->
            <h3><?php echo $_GET["cari"];?></h3>
            <!-- <p>Alergi bisa terjadi akibat apa saja, dari makanan, debu, hingga hewan. Gejalanya pun bermacam-macam. Ketahui apa saja jenis alergi, gejala, serta cara mengatasinya di artikel berikut ini.</p> -->
            <p><?php echo $rowKategori["deskripsi"];?></p>
    </div>

    <div class="kategori">
      <p>Artikel Tentang <span><?php echo $_GET["cari"];?></span></p>
    </div>

    <div class="hasil-pencarian container">
    <div class="row">
    <?php
        
        // $search = $_GET['search'];
        $query = "SELECT * FROM artikel WHERE kategori_id = ".$rowKategori['id']." ORDER BY artikel.kategori_id";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
          $hariini = date_create("now");
          $waktuartikel =  date_create($row['waktu']);
          $interval = date_diff($hariini, $waktuartikel);
          
          
          echo "<div class='col-4'>";
          echo "<div class='hasil-artikel'>";
          echo "<a href='halamanArtikel.php?id=".$row['id']."'>";
        echo "<img src='" . $row['foto'] . "' alt='Avatar'>";
        echo "<h3>" . $row['judul'] . "</h3>";
        echo "</a>";
        // <h3>12 Gejala Kanker yang Perlu Anda Waspadai Sedini Mungkin</h3>
        echo "<div class='grup-detail'>";
          echo "<p>" . $rowKategori['nama'] . "</p>";
          echo "<p>&#9679;</p>";
          // <p>1 hari yang lalu</p>
          if($interval->format("%a") == 0){
            echo "<p>baru saja</p>";  
          }else if($interval->format("%a") >= 30){
            $bulan = floor($interval->format("%a") / 30);
            echo "<p>" . $bulan  . " bulan yang lalu</p>";
          }else{
            echo "<p>" . $interval->format("%a")  . " hari yang lalu</p>";
          }
        echo "</div>";
        echo "</div>";
        echo "</div>";
        }
        
        
      ?>

    </div>
    </div>

    </body>
    </html>
