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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <!-- <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi"
      crossorigin="anonymous"
    /> -->
    <title>Artikel</title>
  </head>
  <body>
    <!-- header -->
    <?php include 'include/header.php';?>
    <?php
        include 'db_connection.php';
        $id = $_GET['id'];
        $query = "SELECT * FROM artikel where id = '$id'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
    ?>

    <!-- breadcrumb -->
    <div class="breadcrumb-nav">
      <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb";>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Beranda</a></li>
          <li class="breadcrumb-item"><a href="artikel.php">Artikel</a></li>
          <li class="breadcrumb-item active" aria-current="page"><?php echo $row['judul']?></li>
        </ol>
      </nav>
    </div>

   <?php
        echo "<div class='judul-artikel'>";
        echo "<h3>" . $row['judul'] . "</h3>";
        echo "</div>";
        echo "<div class='container-artikel'>";
       // while ($) {
          echo $row['isi_artikel'];
        // }
      ?>
      <!-- <div class="nav-artikel">
        <ul class="map-obat">
            <li>
                <a href="">Penggunaan</a>
              </li>
              <li>
                <a href="">Dosis</a>
              </li>
            <li>
              <a href="">Peringatan</a>
            </li>
            <li>
              <a href="">Efek Samping</a>
            </li>
            <li>
              <a href="">Interaksi Obat</a>
            </li>
            <li>
              <a href="">Overdosis</a>
            </li>
          </ul>
      </div> -->

      


    <div class="kategori">
        <p>Artikel Terkait</p>
        <!-- <a href="" id="other">
        <p>Lihat lainnya ></p>
        </a> -->
      </div>
      
      <div class="hasil-pencarian container">
      <div class="row">
    <?php
        include 'db_connection.php';
        // $search = $_GET['search'];
        $artikel_terkait = "SELECT * FROM artikel WHERE kategori_id = " . $row['kategori_id']. "  LIMIT 3 ";
        $resultArtikel = mysqli_query($conn, $artikel_terkait);
        while ($artikel = mysqli_fetch_assoc($resultArtikel)) {
          // $hariini = new DateTime("now");
          // $waktuartikel =  new DateTime($artikel['waktu']);
          // $interval = $hariini->diff($waktuartikel);
          $hariini = date_create("now");
          $waktuartikel =  date_create($row['waktu']);
          $interval = date_diff($hariini, $waktuartikel);

          $query2 = "SELECT * FROM kategori WHERE id = ". $artikel['kategori_id'] ."";
          $result2 = mysqli_query($conn, $query2);
          $row2 = $result2->fetch_assoc();
          
          echo "<div class='col-4'>";
          echo "<div class='hasil-artikel'>";
          echo "<a href='halamanArtikel.php?id=".$artikel['id']."'>";
        echo "<img src='" . $artikel['foto'] . "' alt='Avatar'>";
        echo "<h3>" . $artikel['judul'] . "</h3>";
        echo "</a>";
        // <h3>12 Gejala Kanker yang Perlu Anda Waspadai Sedini Mungkin</h3>
        echo "<div class='grup-detail'>";
          echo "<p>" . $row2['nama'] . "</p>";
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

    <!-- <div class="hasil-pencarian">
        <div class="hasil-artikel">
          <img src="img/artikel/flu.jpg" alt="Avatar">
          <h3>12 Gejala Kanker yang Perlu Anda Waspadai Sedini Mungkin</h3>
          <div class="grup-detail">
            <p>Kesehatan Jantung</p>
            <p>&#9679;</p>
            <p>1 hari yang lalu</p>
          </div>
        </div>
  
        <div class="hasil-artikel">
          <img src="img/artikel/flu.jpg" alt="Avatar">
          <h3>12 Gejala Kanker yang Perlu Anda Waspadai Sedini Mungkin</h3>
          <div class="grup-detail">
            <p>Kesehatan Jantung</p>
            <p>&#9679;</p>
            <p>1 hari yang lalu</p>
          </div>
        </div>
  
        <div class="hasil-artikel">
          <img src="img/artikel/flu.jpg" alt="Avatar">
          <h3>12 Gejala Kanker yang Perlu Anda Waspadai Sedini Mungkin</h3>
          <div class="grup-detail">
            <p>Kesehatan Jantung</p>
            <p>&#9679;</p>
            <p>1 hari yang lalu</p>
          </div>
        </div> -->

    <!-- footer -->
    
    <!-- <div>
      <hr style="border: 300px; color:red;">  
    </div> -->
  </body>
</html>
