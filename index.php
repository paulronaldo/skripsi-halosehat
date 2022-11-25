<?php
    
?>
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
    <title>HaloSehat</title>
  </head>
  <body>
    <!-- header -->
    <?php include 'include/header.php';?>

    <!-- <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
      <div class="carousel-inner"> -->
        <!-- <div class="carousel-item active">
        <div class="slider d-block w-100">
          <div class="slider-text">
            <h1>Temukan Dokter Terbaikmu</h1>
            <p>
              Temukan dokter terbaikmu dengan mudah dan cepat. Temukan juga berbagai
              informasi kesehatan lainnya.
            </p>
          </div>
            <img src="img/dokter/home.webp" alt="gambar">
        </div> -->
          <!-- <img src="img/komunitas/Banner - berat  bedan ideal.webp" class="d-block w-100" alt="..."> -->
        <!-- </div>
        <div class="carousel-item active">
          <img src="img/komunitas/Banner - berat  bedan ideal.webp" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="img/komunitas/Banner - berat  bedan ideal.webp" class="d-block w-100" alt="...">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div> -->


    <div class="slider">
      <div class="slider-text">
        <h1>Temukan Dokter Terbaikmu</h1>
        <p>
          Temukan dokter terbaikmu dengan mudah dan cepat. Temukan juga berbagai
          informasi kesehatan lainnya.
        </p>
      </div>
        <img src="img/dokter/home.webp" alt="gambar">
    </div>
    
    <!-- berita terbaru -->
    <div class="kategori">
      <p>Berita Terbaru</p>
      <a href="pencarianArtikel.php?new=true" id="other">
      <p>Lihat lainnya ></p>
      </a>
    </div>
    <div class="hasil-pencarian container">
    <div class="row">
    <?php
        include 'db_connection.php';
        // $search = $_GET['search'];
        $query = "SELECT * FROM artikel ORDER BY artikel.waktu DESC LIMIT 3 ";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
          $hariini = date_create("now");
          $waktuartikel =  date_create($row['waktu']);
          $interval = date_diff($hariini, $waktuartikel);
          $query2 = "SELECT * FROM kategori WHERE id = ". $row['kategori_id'] ."";
          $result2 = mysqli_query($conn, $query2);
          $row2 = $result2->fetch_assoc();
          
          echo "<div class='col-4'>";
          echo "<div class='hasil-artikel'>";
          echo "<a href='halamanArtikel.php?id=".$row['id']."'>";
        echo "<img src='" . $row['foto'] . "' alt='Avatar'>";
        echo "<h3>" . $row['judul'] . "</h3>";
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

    <!-- kategori -->
    <div class="kategori">
      <p>Kategori</p>
      <a href="artikel.php" id="other">
      <p>Lihat lainnya ></p>
      </a>
    </div>

    <!-- card kategori -->
    <div class="container card-kategori">
      <div class="row cards">
        <!-- <div class="col-2"> -->
    <?php
      include 'db_connection.php';
      $query = "SELECT * FROM kategori ORDER BY `kategori`.`nama` ASC LIMIT 6";
      $result = mysqli_query($conn, $query);
      //  $counter = 0;
      $num_rows = mysqli_num_rows($result);
      while ($row = mysqli_fetch_assoc($result)) {
      //  if($counter%6 == 0){
          //echo "<div class='card-kategori'>";
          // echo "<div class='container card-kategori'>";
          // echo "<div class='row cards'>";
        // }

        // if((floor($counter/6) == floor($num_rows/6)) && $counter%6 == 0){
        //   echo "<div class='card-kategori-test'>";
        // }else if($counter%6 == 0){
        //   echo "<div class='card-kategori'>";
        // }
        // echo "<div class='container card-kategori'>";
        //echo "<div class='container card-kategori'>";
        
        echo "<div class='col-2'>";

        echo "<div class='card'>";
        echo "<a href='halamanKategori.php?cari=". $row['nama'] ."'>";        
        echo "<img src='" . $row['gambar'] . "' alt='Avatar'>";
        echo "<div class='container-text'>";
        echo "<p>" . $row['nama'] . "</p>";
        echo "</div>";
        echo "</a>";
      echo "</div>";
      echo "</div>";
     // echo "</div>";
     
      // echo "</div>";
      // if($counter%6 == 5 || $counter == $num_rows-1){
      //    echo "</div>";
      //     echo "</div>";
      // }
      // $counter++;
      }

    ?>
    </div>    
    </div>    
    <!-- <div class="card-kategori">
      <div class="card">
        <img src="img/kategori/alergi.webp" alt="Avatar" />
        <div class="container">
          <p>Alergi</p>
        </div>
      </div>

      <div class="card">
        <img src="img/kategori/jantung.webp" alt="Avatar" />
        <div class="container">
          <p>Kesehatan Jantung</p>
        </div>
      </div>

      <div class="card">
        <img src="img/kategori/paru.webp" alt="Avatar" />
        <div class="container">
          <p>Kesehatan Pernapasan</p>
        </div>
      </div>

      <div class="card">
        <img src="img/kategori/p kanker.webp" alt="Avatar" />
        <div class="container">
          <p>Penyakit Kanker</p>
        </div>
      </div>

      <div class="card">
        <img src="img/kategori/urologi.webp" alt="Avatar" />
        <div class="container">
          <p>Kesehatan Urologi</p>
        </div>
      </div>

      <div class="card">
        <img src="img/kategori/kulit.webp" alt="Avatar" />
        <div class="container">
          <p>Kesehatan Kulit</p>
        </div>
      </div>
    </div> -->

    <!-- Cek Kesehatan -->
    <div class="banner-title">
      <p>Hello Sehat memberi Anda informasi yang paling dibutuhkan</p>
    </div>
    <!-- Memberi yang terbaik -->
    <div class="banner">
      <div class="banner-point">
        <img src="img/poin hello sehat/monitored.webp" alt="Gambar" />
        <div class="banner-text">
          <h4>SUMBER BERBASIS RISET</h4>
          <p>
            Semua artikel di Hello Sehat telah melalui proses riset dan ditulis
            berdasarkan studi terbaru serta ditinjau oleh pakar terkemuka dari
            berbagai institusi medis.
          </p>
        </div>
      </div>

      <div class="banner-point">
        <img src="img/poin hello sehat/reviewed.webp" alt="Gambar" />
        <div class="banner-text">
          <h4>DITINJAU PAKAR</h4>
          <p>
            Tim editor medis kami adalah dokter dan pakar yang datang dari
            berbagai latar belakang keilmuan medis. Mereka meninjau setiap
            konten kami secara profesional.
          </p>
        </div>
      </div>

      <div class="banner-point">
        <img src="img/poin hello sehat/monitored.webp" alt="Gambar" />
        <div class="banner-text">
          <h4>DIPERBARUI SECARA BERKALA</h4>
          <p>
            Bersama para editor medis dan pakar profesional, kami selalu
            memantau artikel kami secara berkala guna memastikan tingkat akurasi
            dan relevansi dengan pembaca.
          </p>
        </div>
      </div>

      <div class="banner-point">
        <img src="img/poin hello sehat/trustworthy.webp" alt="Gambar" />
        <div class="banner-text">
          <h4>TERPERCAYA</h4>
          <p>
            Hello Sehat, sebagai platform kesehatan terdepan di Indonesia
            berkomitmen untuk menulis artikel yang akurat, relevan dan terbaru
            untuk membantu Anda para pembaca dalam membuat keputusan penting
            terkait kesehatan.
          </p>
        </div>
      </div>
    </div>

    <!-- Cek Kesehatan -->
    <div class="kategori">
      <p>Cek Kesehatan</p>
    </div>

    <!-- card cek kesehatan -->
    <div class="container card-kategori">
      <div class="row cards">
        <div class="col-2">
        <div class="card">
          <img src="img/cek-kesehatan/kal bmi.webp" alt="Avatar" />
          <div class="container">
            <p>Kalkulator BMI</p>
          </div>
      </div>
      </div>
      <!-- </div> -->
      
      <!-- <div class="row"> -->
        <div class="col-2">
      <div class="card">
        <img src="img/cek-kesehatan/bmr-calculator.webp" alt="Avatar" />
        <div class="container">
          <p>Kebutuhan Kalori</p>
        </div>
      </div>
        </div>
      <!-- </div> -->

      <!-- <div class="row"> -->
        <div class="col-2">
      <div class="card">
        <img src="img/cek-kesehatan/masa subur.webp" alt="Avatar" />
        <div class="container">
          <p>Masa Subur</p>
        </div>
      </div>
        </div>
      <!-- </div> -->

      <!-- <div class="row"> -->
        <div class="col-2">
      <div class="card">
        <img src="img/cek-kesehatan/due-date-calculator.webp" alt="Avatar" />
        <div class="container">
          <p>Perkiraan Lahir</p>
        </div>
      </div>
        </div>
      <!-- </div> -->

      <!-- <div class="row"> -->
        <div class="col-2">
      <div class="card">
        <img src="img/cek-kesehatan/detak jantung.webp" alt="Avatar" />
        <div class="container">
          <p>Kalkulator Detak Jantung</p>
        </div>
      </div>
        </div>
      <!-- </div> -->

      <!-- <div class="row"> -->
        <div class="col-2">
      <div class="card">
        <img src="img/cek-kesehatan/berat hamil.webp" alt="Avatar" />
        <div class="container">
          <p>Berat Ideal Ibu Hamil</p>
        </div>
      </div>
    <!-- </div> -->
      </div>
    </div>
    </div>

    <!-- footer -->
    <?php include 'include/footer.php';?>
    <!-- <div>
      <hr style="border: 300px; color:red;">  
    </div> -->

  </body>
</html>
