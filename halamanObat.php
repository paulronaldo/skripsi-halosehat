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
    <title>Obat</title>
  </head>
  <body>
    <!-- header -->
    <?php include 'include/header.php';?>
    <?php
         include 'db_connection.php';
         $nama = $_GET['nama'];
         $query = "SELECT * FROM obat where nama = '$nama'";
         $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
    ?>

    <!-- breadcrumb -->
    <div class="breadcrumb-nav">
      <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb";>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Beranda</a></li>
          <li class="breadcrumb-item"><a href="pencarianObat.php">Obat</a></li>
          <li class="breadcrumb-item active" aria-current="page"><?php echo $nama?></li>
        </ol>
      </nav>
    </div>
    

    <div class="judul-artikel-obat">
      <h3><?php echo $nama?></h3>
    </div>
    <div class="container-artikel-obat">
      <div class="nav-artikel">
        <ul class="map-obat">
          <li>
            <a href="#penggunaan">Penggunaan</a>
          </li>
          <li>
            <a href="#dosis">Dosis</a>
          </li>
          <li>
            <a href="#peringatan">Peringatan</a>
          </li>
          <li>
            <a href="#efek-samping">Efek Samping</a>
          </li>
          <li>
            <a href="#interaksi-obat">Interaksi Obat</a>
          </li>
          <li>
            <a href="#overdosis">Overdosis</a>
          </li>
        </ul>
      </div>
      
      <?php
            echo $row['artikel_obat'];
      ?>

      <div class="penulis-artikel">
        <div>
          <p>
            Ditulis oleh Ajeng Pratiwi, diperbarui <span>3 November 2021</span>, ditinjau secara
            medis oleh dr. Tania Savitri
          </p>
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
