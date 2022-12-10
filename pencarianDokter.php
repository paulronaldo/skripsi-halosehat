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
    
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"> -->
    <!-- <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi"
      crossorigin="anonymous"
    /> -->
    <title>Dokter</title>
  </head>
  <body>
    <!-- header -->
    <?php include 'include/header.php';?>

    <section class="artikel">
      <span>
        <p>Pakar HaloSehat</p>
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
            placeholder="cari dokter di sini..."
            name="search"
          />
          <button type="submit">Cari</button>
        </form>
      </div>
    </section>

    <!-- Daftar dokter -->
   
      <?php
        include 'db_connection.php';
        if(isset($_GET['search'])){
          $search = $_GET['search'];
          $query = "SELECT * FROM dokter WHERE nama LIKE '%$search%'";
          $result = mysqli_query($conn, $query);
          $num_rows = mysqli_num_rows($result);
          if($num_rows == 0){
            echo "<div class='text-keyword'>";
            echo " <p>hasil pencarian \"".$_GET['search']."\" tidak ditemukan</p>";
            echo "</div>";
          }else{
            echo " <div class='dokter'>";
            while($row = mysqli_fetch_array($result)){
              echo "<div class='info-dokter'>";
              echo "<img src='" . $row['foto'] . "' alt='gambar' />";
              echo "<div class='detail-dokter'>";
                  echo "<h4>" . $row['nama'] . "</h4>";
                  echo "<p>". $row['spesialisasi'] . "</p>";
                  echo "<a href='profilDokter.php?id=". $row['id'] ."'><h5>lihat selengkapnya></h5></a>";
              echo "</div>";
              echo "</div>";
            }
          }
        }
        else{
          echo " <div class='dokter'>";
          $query = "SELECT * FROM dokter";
          $result = mysqli_query($conn, $query);
          while($row = mysqli_fetch_array($result)){
            echo "<div class='info-dokter'>";
            echo "<img src='" . $row['foto'] . "' alt='gambar' />";
            echo "<div class='detail-dokter'>";
                echo "<h4>" . $row['nama'] . "</h4>";
                echo "<p>". $row['spesialisasi'] . "</p>";
                echo "<a href='profilDokter.php?id=". $row['id'] ."'><h5>lihat selengkapnya></h5></a>";
            echo "</div>";
            echo "</div>";
          }
        }
        
      ?>
    </div>

    
    
    
    
    
    <!-- <div>
      <hr style="border: 300px; color:red;">  
    </div> -->


   

    
  </body>
</html>
