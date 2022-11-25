<?php
  if(!isset($_GET['search'])){
    // index('pencarianObat.php?search=A');
    header( "Location: pencarianObat.php?search=A" );
  }
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
    <title>Obat & Suplemen</title>
  </head>
  <body>
    <!-- header -->
    <?php include 'include/header.php';?>

    <section class="artikel">
      <span>
        <p>Obat dan Suplemen</p>
      </span>
      <!-- pencarian -->
      <div class="search">
        <form action="">
          <!-- <div ></div>
        <i class="fa fa-search"></i> -->
        <i class="fa fa-search search-icon"></i>
          <input
            type="text"
            class="search-bar"
            placeholder="cari obat di sini..."
            name="search"
          />
          <button type="submit">Cari</button>
        </form>
      </div>
    </section>

    <!-- kategori -->
    <!-- <div class="kategori">
      <p>Kategori</p>
    </div> -->

    <div class="abjad">
      <?php
        for($i=65; $i < 91; $i++){
          if($_GET['search'] == chr($i)){
            echo "<a href='pencarianObat.php?search=".chr($i)."' style='color: #fff;'><div style='background: #1A7AD9; border-radius: 6px;'>".chr($i)."</div></a>";
          }
          else{
            echo "<a href='pencarianObat.php?search=".chr($i)."'><div>".chr($i)."</div></a>";
          }}
      ?>
    </div>

    
    <div class="container text-center">
    <div class="row nama-obat">
    <?php
        include 'db_connection.php';
        $search = $_GET['search'];
        $query = "SELECT * FROM obat WHERE nama LIKE '$search%'";
        $result = mysqli_query($conn, $query);
        $num_rows = mysqli_num_rows($result);
        if($num_rows == 0){
          echo " <h5>hasil pencarian tidak ditemukan</h5>";
        }
        while ($row = mysqli_fetch_assoc($result)) {      
          $nama = $row['nama'];
          // echo "<div class='container text-center'>";
          // echo "<div class='row nama-obat'>";
            // echo "<a href='halamanObat.php?nama=". $nama ."'><p>" . $nama . "</p></a>";
            echo "<div class='col-3'><a href='halamanObat.php?nama=". $nama ."' class='fs-4'>" . $nama . "</a></div>";
          // echo "</div>";
          // echo "</div>";
        }
      ?>
    </div>
    </div>

    <!-- <div class="container text-center">
      <div class="row nama-obat">
        <div class="col-3"><a href="" class="fs-3">col</a></div>
        <div class="col-3"><a href="" class="fs-3">col</a></div>
        <div class="col-3"><a href="" class="fs-3">col</a></div>
        <div class="col-3"><a href="" class="fs-3">col</a></div>
      </div>
    </div> -->

    
  </body>
</html>
